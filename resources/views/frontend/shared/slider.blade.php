
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        @foreach($homeslider as $slide)
        <div class="carousel-item {{ $slide->id == 1 ? 'active' : '' }}" style="background-image: url(frontend/img/{{ $slide->photo }})">
            <div class="info d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2 data-aos="fade-down">{{ $slide->title }}</span></h2>
                            <p data-aos="fade-up">{{ $slide->description }}</p>
                            <a data-aos="fade-up" data-aos-delay="200" href="{{ $slide->link }}" class="btn-get-started">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>

</section>
<!-- End Hero Section -->


