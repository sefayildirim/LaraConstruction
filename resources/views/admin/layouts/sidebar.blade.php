<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item active">
            <a class="nav-link collapsed" href="{{ route('admin.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed active" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-home-2-line"></i><span>Home</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('slider.index') }}" >
                        <i class="bi bi-circle"></i><span>Home Slider</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('homeabout.index') }}">
                        <i class="bi bi-circle"></i><span>Home About</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('homeservices.index') }}">
                        <i class="bi bi-circle"></i><span>Home Service</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('homefeatures.index') }}">
                        <i class="bi bi-circle"></i><span>Home Features </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('hometestimonials.index') }}">
                        <i class="bi bi-circle"></i><span>Home Testimonials</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-about" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>About</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-about" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('about.index') }}">
                        <i class="bi bi-circle"></i><span>About</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('aboutservices.index') }}">
                        <i class="bi bi-circle"></i><span>About Service</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('aboutteam.index') }}">
                        <i class="bi bi-circle"></i><span>About Team</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('services.index') }}">
                <i class="ri-dashboard-2-line"></i>
                <span>Services </span>
            </a>
        </li><!-- End Profile Page Nav -->



    </ul>

</aside><!-- End Sidebar-->
