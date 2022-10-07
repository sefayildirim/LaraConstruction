@extends('frontend.layouts.frontend')

@section('title')
    About
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('frontend/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>About</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>About</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row position-relative">
                    <div class="col-lg-7 about-img" style="background-image: url(frontend/img/about.jpg);"></div>
                    <div class="col-lg-7">
                        <h2>{{ $about->title }}</h2>
                        <div class="our-story">
                            <p>{{ $about->description }}</p>
                            <div class="watch-video d-flex align-items-center position-relative">
                                <i class="bi bi-play-circle"></i>
                                <a href="{{ $about->video_link }}" class="glightbox stretched-link">Watch Video</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Stats Counter Section ======= -->
        <section id="stats-counter" class="stats-counter section-bg">
            <div class="container">
                <div class="row gy-4">
                    @foreach($aboutservices as $services)
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="{{ $services->icon }} flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $services->number }}" data-purecounter-duration="3" class="purecounter"></span>
                                <p>{{ $services->title }}</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->
                    @endforeach

                </div>

            </div>
        </section><!-- End Stats Counter Section -->




        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Our Team</h2>
                    <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
                </div>
                <div class="row gy-5">
                    @foreach($aboutteam as $team)
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="frontend/img/{{ $team->photo }}" class="img-fluid" alt="">
                            <div class="social">
                                <a target="_blank" href="{{ $team->twitter_link }}"><i class="bi bi-twitter"></i></a>
                                <a target="_blank" href="{{ $team->facebook_link }}"><i class="bi bi-facebook"></i></a>
                                <a target="_blank" href="{{ $team->instagram_link }}"><i class="bi bi-instagram"></i></a>
                                <a target="_blank" href="{{ $team->linkedin_link }}"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>{{ $team->name }}</h4>
                            <span>{{ $team->authority }}</span>
                            <p>{{ $team->description }}</p>
                        </div>
                    </div><!-- End Team Member -->
                    @endforeach
                </div>
            </div>
        </section><!-- End Our Team Section -->


    </main><!-- End #main -->
@endsection()

@section('js')
@endsection()
