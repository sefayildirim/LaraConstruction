<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1><img src="backend/img/laravel.png" alt=""> LaraConstruction</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ Route::is('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('services') }}" class="{{ Route::is('services') ? 'active' : '' }}">Services</a></li>
                <li><a href="{{ route('contact') }}" class="{{ Route::is('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->
