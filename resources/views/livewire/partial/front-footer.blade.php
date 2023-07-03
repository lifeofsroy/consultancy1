<footer class="footer-wrapper footer-layout3" data-bg-src="{{ asset('assets/img/bg/footer_bg_2.jpg') }}">
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <div class="footer-logo"><a href="{{ route('home') }}">
                            <img src="{{ asset('storage') }}/{{ $footer->logo }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="newsletter-wrap">
                        <div class="newsletter-content">
                            <h3 class="newsletter-title">News Subscription</h3>
                            <p class="newsletter-text">Get Latest Deals from Waker’s Inbox & Subscribe Now</p>
                        </div>

                        <form class="newsletter-form" wire:submit.prevent="newsForm">
                            <div class="form-group">
                                <input class="form-control {{ $errors->first('email') ? ' is-invalid' : '' }}" type="email"
                                    placeholder="Email Address" wire:model="email" required="">
                                <i class="fal fa-envelope"></i>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="as-btn style3" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xxl-3 col-xl-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">{{ config('app.name') }}</h3>
                        <div class="as-widget-about">
                            <p class="about-text">{{ $footer->desc }}</p>

                            <div class="as-social">
                                @foreach ($socials as $social)
                                    <a href="{{ $social->url }}" target="_blank">
                                        <i class="{{ $social->icon }}"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Quick Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a class="{{ Route::is('about') ? 'text-primary' : '' }}" href="{{ route('about') }}">About Us</a></li>
                                <li><a class="{{ Route::is('service.category') ? 'text-primary' : '' }}"
                                        href="{{ route('service.category') }}">Services</a></li>
                                <li><a class="{{ Route::is('facility.course') ? 'text-primary' : '' }}"
                                        href="{{ route('facility.course') }}">Courses</a></li>
                                <li><a class="{{ Route::is('facility.institution') ? 'text-primary' : '' }}"
                                        href="{{ route('facility.institution') }}">Institutions</a></li>
                                <li><a class="{{ Route::is('gallery') ? 'text-primary' : '' }}" href="{{ route('gallery') }}">Gallery</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">IMPORTANT</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a class="{{ Route::is('terms.show') ? 'text-primary' : '' }}" href="{{ route('terms.show') }}">Terms &
                                        Conditions</a></li>
                                <li><a class="{{ Route::is('policy.show') ? 'text-primary' : '' }}" href="{{ route('policy.show') }}">Privacy
                                        Policy</a></li>
                                <li><a class="{{ Route::is('policy.cookie') ? 'text-primary' : '' }}" href="{{ route('policy.cookie') }}">Cookie
                                        Policy</a></li>
                                <li><a class="{{ Route::is('faq') ? 'text-primary' : '' }}" href="{{ route('faq') }}">Help & FAQs</a></li>
                                <li><a class="{{ Route::is('contact') ? 'text-primary' : '' }}" href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Recent Update</h3>
                        <div class="recent-post-wrap">
                            @foreach ($courses as $course)
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{ route('facility.course.detail', ['course_slug' => $course->slug]) }}">
                                            <img src="{{ asset('storage') }}/{{ $course->thumb }}" alt="Blog Image">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <h4 class="post-title">
                                            <a class="text-inherit"
                                                href="{{ route('facility.course.detail', ['course_slug' => $course->slug]) }}">{{ $course->title }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <p class="copyright-text"><i class="fal fa-copyright"></i> {{ $footer->copyright }}</p>
                </div>
                <div class="col-lg-6 d-none d-lg-block text-end">
                    <div class="footer-links">
                        <ul>
                            <li><a href="{{ route('terms.show') }}">Terms & Condition</a></li>
                            <li><a href="{{ route('policy.cookie') }}">Cookie Policy</a></li>
                            <li><a href="{{ route('policy.show') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
