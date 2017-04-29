    <!-- Team Section -->
    <section id="tutors" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">The people pushing for your success.</h3>
                </div>
            </div>
            @foreach ($tutors->chunk(3) as $chunk)
                <div class="row">
                    @foreach ($chunk as $tutor)
                        <a href="#portfolioModal-{{ $tutor['short'] }}" class="portfolio-link" data-toggle="modal">
                            <div class="col-sm-4">
                                <div class="team-member">
                                    <img src="{{ $tutor['previewImage'] }}" class="img-responsive img-circle" alt="" width="{{$tutor['customWidth'] or '' }}">
                                    <h4>{{ $tutor['name'] }}</h4>
                                    <p class="text-muted">{{ $tutor['subjects'] }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endforeach
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">With a combined 0.2e<sup>2</sup> centuries of experience, our team has a very broad knowledge base and extensive teaching experience. With their help, you or your child will be well-prepared for any academic challenge.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tutor Modals -->
    @foreach ($tutors as $tutor)
        <div class="portfolio-modal modal fade" id="portfolioModal-{{ $tutor['short'] }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>{{ $tutor['name'] }}</h2>
                                <p class="item-intro text-muted">{{ $tutor['subjects'] }}</p>
                                <img class="img-responsive" src="{{ $tutor['mainImage'] }}" style="margin: 0 auto;" alt="">
                                <p>{{ $tutor['bio'] }}</p>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    <i class="fa fa-times"></i> Back
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
