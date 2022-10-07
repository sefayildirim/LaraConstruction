@extends('frontend.layouts.frontend')

@section('title')
@endsection()

@section('css')
@endsection()

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('frontend/img/breadcrumbs-bg.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Services</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Services</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    @foreach($services as $service)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item  position-relative">
                            <div class="icon">
                                <i class="fa-solid {{ $service->icon }}"></i>
                            </div>
                            <h3>{{ $service->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($service->description,120,'...') }}</p>
                            <a href="{{ route('services.detail',$service->slug) }}" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div><!-- End Service Item -->
                    @endforeach

                    <div class="text-center">
                        {{ $services->links() }}
                    </div>

                </div>

            </div>

        </section><!-- End Services Section -->



    </main><!-- End #main -->
@endsection()

@section('js')
@endsection()
