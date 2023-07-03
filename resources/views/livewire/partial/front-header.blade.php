<div>
    <!-- mobile menu -->
    <div class="as-menu-wrapper">
        <div class="as-menu-area text-center">
            <button class="as-menu-toggle">
                <i class="fal fa-times"></i>
            </button>

            <div class="mobile-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('storage') }}/{{ $header->mlogo }}" alt="Logo">
                </a>
            </div>

            <div class="as-mobile-menu">
                <ul>
                    <li>
                        <a class="{{ Route::is('home') ? 'text-primary' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>

                    <li>
                        <a class="{{ Route::is('about') ? 'text-primary' : '' }}" href="{{ route('about') }}">About Us</a>
                    </li>

                    <li>
                        <a class="{{ Route::is('service*') ? 'text-primary' : '' }}" href="{{ route('service.category') }}">Services</a>
                    </li>

                    <li class="menu-item-has-children">
                        <a class="{{ Route::is('facility*') ? 'text-primary' : '' }}" href="#">Facilities</a>
                        <ul class="sub-menu">
                            <li>
                                <a class="{{ Route::is('facility.course*') ? 'text-primary' : '' }}"
                                    href="{{ route('facility.course') }}">Courses</a>
                            </li>

                            <li>
                                <a class="{{ Route::is('facility.institution*') ? 'text-primary' : '' }}"
                                    href="{{ route('facility.institution') }}">Institutions</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="{{ Route::is('contact') ? 'text-primary' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                    </li>

                    <li>
                        <a class="{{ Route::is('admission') ? 'text-primary' : 'text-info' }}" href="{{ route('admission') }}">Take Admission</a>
                    </li>

                    <li class="menu-item-has-children my-4">
                        <a href="#">My Account</a>
                        <ul class="sub-menu">
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->roleuser === 'EDITOR')
                                        <li><a href="{{ route('dashboard') }}">Editor Panel</a></li>
                                        <li><a href="{{ route('profile.show') }}">Profile</a></li>
                                        <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    @else
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('profile.show') }}">Profile</a></li>
                                        <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    @endif
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endauth
                            @endif
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(Tawk_API.toggle())">Chat With Us</a>
                    </li>

                    <li>
                        <a href="https://api.whatsapp.com/send?phone=917872289842" ."="">Whatsapp Us</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <!-- main menu -->
    <header class="as-header header-layout2">
        <!-- header top -->
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="d-none {{ Route::is('admission') ? '' : 'd-lg-block' }} col-auto">
                        <div class="header-links">
                            <ul>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <a href="tel:{{ $header->phone }}">+91-{{ $header->phone }}</a>
                                </li>

                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="{{ $header->email }}">{{ $header->email }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="header-notice col-auto">
                        @livewire('partial.front-notice')
                    </div>
                </div>
            </div>
        </div>

        <!-- header main -->
        <div>
            <!-- class="sticky-wrapper" -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('storage') }}/{{ $header->logo }}" alt="Logo">
                                </a>
                            </div>
                        </div>

                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li><a class="{{ Route::is('home') ? 'text-primary' : '' }}" href="{{ route('home') }}">Home</a></li>

                                    <li><a class="{{ Route::is('about') ? 'text-primary' : '' }}" href="{{ route('about') }}">About Us</a></li>

                                    <li><a class="{{ Route::is('service*') ? 'text-primary' : '' }}"
                                            href="{{ route('service.category') }}">Services</a></li>

                                    <li class="menu-item-has-children">
                                        <a class="{{ Route::is('facility*') ? 'text-primary' : '' }}" href="#">Facilities</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a class="{{ Route::is('facility.course*') ? 'text-primary' : '' }}"
                                                    href="{{ route('facility.course') }}">Courses</a>
                                            </li>
                                            <li>
                                                <a class="{{ Route::is('facility.institution*') ? 'text-primary' : '' }}"
                                                    href="{{ route('facility.institution') }}">Institutions</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a class="{{ Route::is('contact') ? 'text-primary' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                                    </li>

                                    <li class="menu-item-has-children">
                                        <a href="#">My Account</a>
                                        <ul class="sub-menu">
                                            @if (Route::has('login'))
                                                @auth
                                                    @if (Auth::user()->roleuser === 'EDITOR')
                                                        <li><a href="{{ route('dashboard') }}">Editor Panel</a></li>
                                                        <li><a href="{{ route('profile.show') }}">Profile</a></li>
                                                        <li><a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                        </li>
                                                    @else
                                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                                        <li><a href="{{ route('profile.show') }}">Profile</a></li>
                                                        <li><a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                        </li>
                                                    @endif
                                                @else
                                                    <li><a href="{{ route('login') }}">Login</a></li>
                                                    <li><a href="{{ route('register') }}">Register</a></li>
                                                @endauth
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>

                            <button class="as-menu-toggle d-inline-block d-lg-none" type="button">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>

                        @if (Route::is('admission'))
                            <div class="d-none d-lg-block col-auto">
                                <div class="header-button">
                                    @if ($plugin->is_whatsapp)
                                        <a class="icon-btn" href="https://api.whatsapp.com/send?phone=91{{$plugin->wh_number}}" ."="" target="_blank">
                                            <i class="fab fa-whatsapp fa-2x text-success" style="position: relative; top: 5px;"></i>
                                        </a>
                                    @endif

                                    @if ($plugin->is_tawk)
                                        <a class="icon-btn" href="javascript:void(Tawk_API.toggle())">
                                            <i class="fab fa-facebook-messenger fa-2x text-primary" style="position: relative; top: 5px;"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="d-none d-lg-block col-auto">
                                <div class="header-button">

                                    @if ($plugin->is_whatsapp)
                                        <a class="icon-btn" href="https://api.whatsapp.com/send?phone=91{{$plugin->wh_number}}" ."="" target="_blank">
                                            <i class="fab fa-whatsapp fa-2x text-success" style="position: relative; top: 5px;"></i>
                                        </a>
                                    @endif

                                    @if ($plugin->is_tawk)
                                        <a class="icon-btn" href="javascript:void(Tawk_API.toggle())">
                                            <i class="fab fa-facebook-messenger fa-2x text-primary" style="position: relative; top: 5px;"></i>
                                        </a>
                                    @endif

                                    <a class="as-btn shadow-none" href="{{ route('admission') }}">
                                        Take Admission
                                        <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
