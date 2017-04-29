@servers(['apophis' => 'deployer@apophis'])

@setup
	$repo        = "git\@gitpi:901prep.git";
	$base_dir    = '~/901prep';
	$storage_dir = $base_dir . '/storage';
	$branch      = isset($branch) ? $branch : 'develop';
	$release_dir = $base_dir . '/releases';
	$current_dir = $base_dir . '/current';
	$release     = 'release_' . date('YmdHis');
	$env         = isset($env) ? $env : 'production';
@endsetup

@macro('deploy', ['on' => 'apophis'])
	fetch_repo
	run_composer
	update_symlinks
	update_permissions
	restart_php
	down
	up
	clean_old_releases
@endmacro

@task('fetch_repo')
	[ -d {{ $release_dir }} ] || mkdir -p {{ $release_dir }};
	cd {{ $release_dir }};

	# Make the release dir
	mkdir {{ $release }};

	# Clone the repository
	echo 'Cloning the repo';
	git clone {{ $repo }} {{ $release }}
@endtask

@task('run_composer')
	echo 'Installing composer dependencies';
	cd {{ $release_dir }}/{{ $release }};
	composer install --prefer-dist --no-scripts -q -o;
@endtask

@task('update_symlinks')
	echo 'Verifying permanent storage directory'
	[ -d {{ $base_dir }}/storage ] || mkdir -p {{ $base_dir }}/storage
	[ -d {{ $storage_dir }}/logs ] || mkdir -p {{ $storage_dir }}/logs
	[ -d {{ $storage_dir }}/app ]  || mkdir -p {{ $storage_dir }}/app
	[ -d {{$storage_dir}}/framework/cache ] || mkdir -p {{$storage_dir}}/framework/{cache,sessions,views}

	echo 'Updating symlinks';

	# Remove the storage directory and replace with persistent data
	echo 'Linking storage directory';
	rm -rf {{ $release_dir }}/{{ $release }}/storage;
	cd {{ $release_dir }}/{{ $release }};
	ln -nfs {{ $base_dir }}/storage storage;

	# Optimise installation
	echo 'Optimising installation';
	php artisan clear-compiled --env={{ $env }};
	php artisan optimize --env={{ $env }};

	# Import the environment config
	echo 'Linking .env file';
	cd {{ $release_dir }}/{{ $release }};
	ln -nfs {{ $base_dir }}/.env .env;

	# Symlink the latest release to the current directory
	echo 'Linking current release';
	ln -nfs {{ $release_dir }}/{{ $release }} {{ $current_dir }};
@endtask

@task('update_permissions')
	cd {{ $release_dir }}/{{ $release }};

	echo 'Updating directory permissions';
	find . -type d -exec chmod 775 {} \;

	echo 'Updating file permissions';
	find . -type f -exec chmod 664 {} \;

	echo 'Setting release group to www-data';
	chgrp -R www-data {{ $release_dir }}/{{ $release }}
@endtask

@task('migrate')
	echo 'Running migrations';
	cd {{ $release_dir }}/{{ $release }};
	php artisan migrate --env={{ $env }} --force;
@endtask

@task('restart_php')
	echo 'Restarting php-fpm';
	sudo service php7.0-fpm reload
@endtask

@task('down')
	cd {{ $release_dir }}/{{ $release }};
	php artisan down;
@endtask

@task('up')
	cd {{ $current_dir }};
	php artisan up;
@endtask

@task('clean_old_releases')
	echo 'Purging old releases';
	# This will list our releases by modification time and delete all but the 5 most recent.
	ls -dt {{ $release_dir }}/* | tail -n +6 | xargs -d '\n' rm -rf;
@endtask

