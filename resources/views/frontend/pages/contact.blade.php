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
                <h2>Contact</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Contact</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-map"></i>
                            <h3>Our Address</h3>
                            <p>A108 Adam Street
                                NY 535022, USA</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@example.com</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="row gy-4 mt-1">


                    <div class="col-lg-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12030.987580764267!2d29.0137607!3d41.0745249!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x870db3e0dbf7eb01!2zWmluY2lybGlrdXl1IE1lemFybMSxxJ_EsQ!5e0!3m2!1str!2str!4v1665167958392!5m2!1str!2str" width="100%" height="384px" style="border:0;" allowfullscreen></iframe>

                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection()

@section('js')
@endsection()
