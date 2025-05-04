<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

        <a href="{{route('index')}}" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Company</h1><span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{route('index')}}"
                       @php
                           $active = route('index') == request()->url() ? 'active' : '';
                       @endphp
                       class="{{ $active }}"
                    >Home</a></li>
                <li class="dropdown">
                    <a href="{{route('about')}}"
                       @php
                           $active = route('about') == request()->url() ? 'active' : '';
                       @endphp
                       class="{{ $active }}"
                    ><span>About</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{route('team')}}"
                               @php
                                   $active = route('team') == request()->url() ? 'active' : '';
                               @endphp
                               class="{{ $active }}"
                            >Team</a></li>
                        <li><a href="{{route('testimonials')}}"
                               @php
                                   $active = route('testimonials') == request()->url() ? 'active' : '';
                               @endphp
                               class="{{ $active }}"
                            >Testimonials</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('services') }}"
                    @php
                        $active = route('services') == request()->url() ? 'active' : '';
                    @endphp
                    class="{{ $active }}"
                    >Services</a></li>
                <li><a href="{{route('portfolio')}}"
                       @php
                           $active = route('portfolio') == request()->url() ? 'active' : '';
                       @endphp
                       class="{{ $active }}"
                    >Portfolio</a></li>
                <li><a href="{{route('pricing')}}"
                       @php
                           $active = route('pricing') == request()->url() ? 'active' : '';
                       @endphp
                       class="{{ $active }}"
                    >Pricing</a></li>
                <li><a href="{{route('blog')}}"
                       @php
                           $active = route('blog') == request()->url() ? 'active' : '';
                       @endphp
                       class="{{ $active }}"
                    >Blog</a></li>
                <li><a href="{{route('contact')}}"
                       @php
                           $active = route('contact') == request()->url() ? 'active' : '';
                       @endphp
                       class="{{ $active }}"
                    >Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


        <div class="header-social-links">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

    </div>
</header>
