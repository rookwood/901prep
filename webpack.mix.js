const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts([
    'resources/assets/js/jquery-1.11.0.js',
    'resources/assets/js/boostrap.js',
    'resources/assets/js/app.js',
    'resources/assets/js/jquery.easing.min.js',
    'resources/assets/js/classie.js',
    'resources/assets/js/cbpAnimatedHeader.js',
    'resources/assets/js/jqBootstrapValidation.js',
    'resources/assets/js/contact_me.js',
    'resources/assets/js/agency.js',
], 'public/js/901prep.js').styles([
    'resources/assets/css/bootstrap.css',
    'resources/assets/css/agency.css',
    // 'resources/assets/css/app.css',
], 'public/css/901prep.css');
