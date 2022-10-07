@extends('frontend.layouts.frontend')

@section('title')
    Home
@endsection()

@section('css')
@endsection()

@section('content')
    <!-- Main -->
    <main id="main">

        <!-- ======= Home Services Section ======= -->
        <section id="alt-services" class="alt-services">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-around gy-4">
                    <!-- ======= Home About Section ======= -->
                    <div class="col-lg-6 img-bg" style="background-image: url(frontend/img/{{ $homeabout->photo }});" data-aos="zoom-in" data-aos-delay="100"></div>
                    <div class="col-lg-5 d-flex flex-column justify-content-center">
                        <h3>{{ $homeabout->title }}</h3>
                        <p>{{ $homeabout->description }}</p>
                    <!-- ======= Home About Section ======= -->
                    <!-- ======= Home Services Section ======= -->
                    @foreach($homeservice as $service)
                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                            <i class="{{ $service->icon }} flex-shrink-0"></i>
                            <div>
                                <h4><span class="stretched-link">{{ $service->title }}</span></h4>
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    @endforeach
                    <!-- ======= Home Services Section ======= -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Alt Services Section -->

        <!-- ======= Home Features Section ======= -->
        <section id="features" class="features section-bg">
            <div class="container" data-aos="fade-up">
                <ul class="nav nav-tabs row  g-2 d-flex">
                    <!-- Start tab nav item -->
                    @foreach($homefeatures as $features)
                    <li class="nav-item col-3">
                        <a class="nav-link {{ $features->id == 1 ? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $features->id }}">
                            <h4>{{ $features->title }}</h4>
                        </a>
                    </li>
                    <!-- End tab nav item -->
                    @endforeach
                </ul>
                <!-- Start tab content item -->
                <div class="tab-content">
                    @foreach($homefeatures as $features)
                    <div class="tab-pane {{ $features->id == 1 ? 'active show' : '' }}" id="tab-{{ $features->id }}">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                                <h3>{{ $features->title }}</h3>
                                {{ $features->description }}
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="frontend/img/{{ $features->photo }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <!-- End tab content item -->
                    @endforeach



                </div>
                <!-- End tab content item -->
            </div>
        </section>
        <!-- End Features Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Testimonials</h2>
                    <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia reprehenderit sunt deleniti</p>
                </div>

                <div class="slides-2 swiper">
                    <div class="swiper-wrapper">

                        @foreach($hometestimonials as $testimonials)
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="frontend/img/{{ $testimonials->photo }}" class="testimonial-img" alt="">
                                    <h3>{{ $testimonials->name }}</h3>
                                    <h4>{{ $testimonials->authority }}</h4>
                                    <div class="stars">
                                        @for ($i=1;$i<=$testimonials->point; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        {{ $testimonials->description }}
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End testimonial item -->
                        @endforeach


                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
        <!-- End Testimonials Section -->

    </main>
    <!-- End #main -->
@endsection()

@section('js')
@endsection()
