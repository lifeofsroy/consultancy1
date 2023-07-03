<div>
    @push('title')
        Guidance & Educational Services
    @endpush

    <!-- slider -->
    <div class="as-hero-wrapper hero-2" id="hero" wire:ignore>
        <div class="hero-slider-2 as-carousel" data-fade="true" data-slide-show="1" data-md-slide-show="1" data-arrows="true">
            @foreach ($sliders as $slider)
                <div class="as-hero-slide">
                    <div class="as-hero-bg" data-bg-src="{{ asset('storage') }}/{{ $slider->image }}"></div>
                    <div class="container">
                        <div class="hero-style2">
                            <div class="ripple-shape">
                                <span class="ripple-1"></span>
                                <span class="ripple-2"></span>
                                <span class="ripple-3"></span>
                                <span class="ripple-4"></span>
                                <span class="ripple-5"></span>
                                <span class="ripple-6"></span>
                            </div>

                            <span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s">
                                {{ $slider->subtitle }}
                            </span>

                            <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.3s" style="font-size: 65px;">
                                {{ $slider->title }}
                            </h1>

                            <p class="hero-text" data-ani="slideinleft" data-ani-delay="0.7s">
                                {{ $slider->desc }}
                            </p>

                            {{-- <div class="btn-group" data-ani="slideinleft" data-ani-delay="0.9s">
                                <a class="as-btn style3" href="{{ $slider->url }}">
                                    DISCOBER MORE
                                    <i class="fa-regular fa-arrow-right ms-2"></i>
                                </a>

                                <a class="as-btn style2" href="{{ route('contact') }}">
                                    CONTACT US
                                    <i class="fa-regular fa-arrow-right ms-2"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="hero-shape1">
            <img src="{{ asset('assets/img/hero/hero_shape_2_1.png') }}" alt="shape">
        </div>

        <div class="hero-shape2">
            <img src="{{ asset('assets/img/hero/hero_shape_2_2.png') }}" alt="shape">
        </div>

        <div class="hero-shape3">
            <img src="{{ asset('assets/img/hero/hero_shape_2_3.png') }}" alt="shape">
        </div>
    </div>

    <!-- welcome -->
    <div class="space" id="about-sec" wire:ignore>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="img-box1">
                        <div class="img1">
                            <img src="{{ asset('storage') }}/{{ $welcome->image }}" alt="About">
                        </div>

                        <div class="shape1">
                            <img src="{{ asset('assets/img/normal/about_shape_1.png') }}" alt="shape">
                        </div>

                        <div class="year-counter">
                            <h3 class="year-counter_number">
                                <span class="counter-number">{{ $welcome->experience }}</span>
                            </h3>

                            <p class="year-counter_text">Years Experience</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="ps-xxl-4 ms-xl-3">
                        <div class="title-area mb-35">
                            <span class="sub-title">
                                <img src="{{ asset('assets/img/theme-img/title_shape_1.svg') }}" alt="shape">
                                {{ $welcome->subtitle }}
                            </span>
                            <h2 class="sec-title">
                                {{ $welcome->title }}
                            </h2>
                        </div>

                        <p class="mt-n2 mb-25">
                            {{ $welcome->desc }}
                        </p>

                        <div class="btn-group">
                            <a class="as-btn" href="{{ route('about') }}">
                                DISCOVER MORE
                                <i class="fa-regular fa-arrow-right ms-2"></i>
                            </a>

                            <div class="call-btn">
                                <div class="play-btn">
                                    <i class="fas fa-phone"></i>
                                </div>

                                <div class="media-body">
                                    <span class="btn-text">Call Us On:</span>
                                    <a class="btn-title" href="tel:{{ $welcome->phone }}">
                                        +91-{{ $welcome->phone }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notice -->
    <section class="space bg-auto" wire:ignore>
        <div class="container" style="border: 10px solid transparent; padding-top: 30px; border: 4mm solid #152e4f; box-shadow: 10px 10px 5px rgb(116, 114, 114);">
            <div class="title-area text-center" style="margin-bottom: 25px; display: inline-block; display: flex; justify-content: center;">
                <h2 class="sec-title" style="border: 5px solid #086e5c; box-shadow: 10px 5px 5px rgb(116, 114, 114);">
                    <span style="margin: 0 10px;">
                        <span class="text-theme fw-normal">Notice</span> Board
                    </span>
                </h2>
            </div>
            <div class="row slider-shadow as-carousel" data-slide-show="2" data-lg-slide-show="1" data-md-slide-show="1" data-arrows="true">
                @foreach ($notices as $notice)
                    <div class="col-lg-6">
                        <div class="testi-box" style="padding: 20px;">
                            <div class="testi-box_content">
                                <a href="{{ route('notice.detail', ['notice_slug' => $notice->slug]) }}">
                                    <h3 class="box-title mb-3">{{ $notice->title }}</h3>
                                    <p class="testi-box_text">{{ $notice->short }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- services -->
    <section class="space" id="service-sec" wire:ignore>
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6 col-sm-9 pe-xl-5">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">Our Services</span>
                        <h2 class="sec-title">We Provide Exclusive Service</h2>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <a class="as-btn" href="{{ route('service.category') }}">
                            VIEW ALL SERVICES<i class="fa-regular fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row slider-shadow as-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2"
                data-xs-slide-show="1">
                @foreach ($services as $service)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="service-box">
                            <div class="service-box_img">
                                <img src="{{ asset('storage') }}/{{ $service->thumb }}" alt="Icon">
                            </div>

                            <div class="service-box_content">
                                <div class="service-box_icon">
                                    <x-icon name="{{ $service->serviceCategory->icon }}" width="50" class="text-primary" />
                                </div>

                                <h3 class="box-title">
                                    <a href="{{ route('service.detail', ['service_slug' => $service->slug]) }}">{{ $service->title }}</a>
                                </h3>

                                <p class="service-box_text" style="text-align: left;">{{ $service->short }}</p>

                                <a class="link-btn" href="{{ route('service.detail', ['service_slug' => $service->slug]) }}">
                                    Read More<i class="fas fa-arrow-right ms-2"></i>
                                </a>

                                <div class="bg-shape">
                                    <img src="{{ asset('assets/img/bg/service_box_bg.png') }}" alt="bg">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- call to action -->
    <section class="position-relative space" wire:ignore>
        <div class="as-bg-img" data-bg-src="{{ asset('storage') }}/{{ $callaction->image }}">
            <img src="{{ asset('assets/img/bg/bg_overlay_1.png') }}" alt="overlay">
        </div>
        <div class="z-index-common container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 text-center">
                    <div class="title-area mb-35">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">
                            {{ $callaction->subtitle }}
                        </span>
                        <h2 class="sec-title text-white">{{ $callaction->title }}</h2>
                    </div><a class="as-btn style3" href="{{ $callaction->btnurl }}">{{ $callaction->button }}</a>
                </div>
            </div>
        </div>
    </section>

    <!-- course -->
    <section class="bg-top-right space overflow-hidden" id="blog-sec" data-bg-src="{{ asset('assets/img/bg/blog_bg_1.png') }}"
        style="padding-bottom: 20px;" wire:ignore>
        <div class="space-bottom container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6 col-sm-9 pe-xl-5">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">Our Courses</span>
                        <h2 class="sec-title">Get Every Single Course</h2>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="sec-btn">
                        <a class="as-btn" href="{{ route('facility.course') }}">
                            VIEW ALL COURSES<i class="fa-regular fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row slider-shadow as-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1"
                data-arrows="true">
                @foreach ($courses as $course)
                    <div class="col-md-6 col-xl-4">
                        <div class="blog-card">
                            <div class="blog-img">
                                <img src="{{ asset('storage') }}/{{ $course->thumb }}" alt="blog image">
                            </div>

                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="{{ route('facility.course.by.category', ['coursecat_slug' => $course->courseCategory->slug]) }}">
                                        <i class="fal fa-calendar-days"></i>{{ $course->courseCategory->name }}</a>

                                    <a href="#">
                                        <i class="fal fa-comments"></i>2 Comments
                                    </a>
                                </div>

                                <h3 class="box-title">
                                    <a href="{{ route('facility.course.detail', ['course_slug' => $course->slug]) }}">{{ $course->title }}</a>
                                </h3>

                                <div class="blog-bottom">
                                    <a class="author" href="#">

                                    </a>

                                    <a class="line-btn" href="{{ route('facility.course.detail', ['course_slug' => $course->slug]) }}">
                                        Read More
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="shape-mockup" data-bottom="0" data-left="0">
            <div class="particle-2 small" id="particle-4"></div>
        </div>
    </section>

    <!-- testimonial -->
    <section class="space bg-auto" data-bg-src="{{ asset('assets/img/bg/testi_bg_2.png') }}" wire:ignore>
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title">
                    <img src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">CUSTOMER FEEDBACK</span>
                <h2 class="sec-title">What Our Clients Says</h2>
            </div>

            <div class="row slider-shadow as-carousel" data-slide-show="2" data-lg-slide-show="1" data-md-slide-show="1" data-arrows="true">
                @foreach ($testis as $testi)
                    <div class="col-lg-6">
                        <div class="testi-box">
                            <div class="testi-box_img">
                                <img src="{{ asset('storage') }}/{{ $testi->image }}" alt="Avater">
                                <div class="testi-box_quote">
                                    <img src="{{ asset('assets/img/icon/quote_left_2.svg') }}" alt="quote">
                                </div>
                            </div>

                            <div class="testi-box_content">
                                <p class="testi-box_text">{{ $testi->desc }}</p>

                                <div class="testi-box_review">
                                    @for ($i = 1; $i <= $testi->rating; $i++)
                                        <i class="fa-solid fa-star-sharp"></i>
                                    @endfor
                                </div>

                                <h3 class="box-title">{{ $testi->name }}</h3>
                                <p class="testi-box_desig">{{ $testi->designation }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="shape-mockup moving d-none d-xl-block" data-bottom="0%" data-left="10%"><img src="{{ asset('assets/img/shape/line_1.png') }}"
                alt="shape"></div>
        <div class="shape-mockup jump d-none d-xl-block" data-top="20%" data-right="2%"><img src="{{ asset('assets/img/shape/line_2.png') }}"
                alt="shape"></div>
    </section>

    <!-- institution -->
    <section class="space" wire:ignore>
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-5 mb-n2 mb-lg-0">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/theme-img/title_shape_1.svg') }}" alt="shape">
                            Our Institutions
                        </span>

                        <h2 class="sec-title">
                            Best Institutions Provided
                        </h2>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="sec-btn">
                        <a class="as-btn" href="{{ route('facility.institution') }}">
                            VIEW ALL INSTITUTIONS
                            <i class="fa-regular fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row slider-shadow as-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-sm-slide-show="1"
                data-infinite="false" data-arrows="true" data-focuson-select="false">
                @foreach ($institutions as $institution)
                    <div class="col-md-6 col-xl-4">
                        <div class="project-card">
                            <div class="project-img">
                                <img src="{{ asset('storage') }}/{{ $institution->thumb }}" alt="project image">
                            </div>

                            <div class="project-content-wrap">
                                <div class="project-content">
                                    <div class="box-particle" id="project-p1"></div>

                                    <h3 class="box-title">
                                        <a
                                            href="{{ route('facility.institution.detail', ['institution_slug' => $institution->slug]) }}">{{ $institution->name }}</a>
                                    </h3>

                                    <p class="project-subtitle">{{ $institution->location }}</p>

                                    <a class="icon-btn"
                                        href="{{ route('facility.institution.detail', ['institution_slug' => $institution->slug]) }}">
                                        <i class="far fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="shape-mockup" data-top="0%" data-right="0%">
            <img src="{{ asset('assets/img/shape/tech_shape_1.png') }}" alt="shape">
        </div>

        <div class="shape-mockup" data-bottom="0%" data-left="0%">
            <img src="{{ asset('assets/img/shape/tech_shape_2.png') }}" alt="shape">
        </div>
    </section>

    <!-- faq -->
    <div class="bg-smoke space overflow-hidden" id="faq-sec" wire:ignore>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-9">
                    <div class="title-area text-xl-start text-center"><span class="sub-title"><img
                                src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">{{ $homefaq->subtitle }}</span>
                        <h2 class="sec-title">{{ $homefaq->title }}</h2>
                        <a href="{{ route('faq') }}">
                            <h2 class="sec-title text-success">Find All <span class="text-theme fw-normal">FAQ</span> Here</h2>
                        </a>
                    </div>
                    <div class="accordion-area accordion" id="faqAccordion">
                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-card {{ $index == 1 ? 'active' : '' }}">
                                <div class="accordion-header" id="collapse-item-{{ $faq->id }}">
                                    <button class="accordion-button {{ $index == 1 ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $faq->id }}" type="button"
                                        aria-expanded="{{ $index == 1 ? 'true' : '' }}"
                                        aria-controls="collapse-{{ $faq->id }}">{{ $faq->question }}</button>
                                </div>

                                <div class="accordion-collapse {{ $index == 1 ? 'show' : '' }} collapse" id="collapse-{{ $faq->id }}"
                                    data-bs-parent="#faqAccordion" aria-labelledby="collapse-item-{{ $faq->id }}">
                                    <div class="accordion-body">
                                        <p class="faq-text">{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-xl-6 mt-35 mt-xl-0">
                    <div class="faq-img tilt-active">
                        <img src="{{ asset('storage') }}/{{ $homefaq->image }}" alt="Faq">
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup jump" data-bottom="0%" data-left="0%"><img src="{{ asset('assets/img/shape/tech_shape_5.png') }}"
                alt="shape"></div>
    </div>

    <!-- partner -->
    <div class="brand-sec1" data-pos-for="#process-sec" wire:ignore>
        <div class="container py-5">
            <div class="row as-carousel" id="brandSlide1" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3"
                data-sm-slide-show="3" data-xs-slide-show="2" data-arrows="true">
                @foreach ($partners as $partner)
                    <div class="col-auto">
                        <div class="brand-box py-20">
                            <img src="{{ asset('storage') }}/{{ $partner->image }}" alt="{{ $partner->name }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- appointment -->
    <div class="space" id="contact-sec" data-bg-src="{{ asset('assets/img/bg/appointment_bg_1.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 pe-xxl-5 mb-xl-0 mb-40">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/theme-img/title_shape_1.svg') }}" alt="shape">
                            {{ $appoint->subtitle }}
                        </span>
                        <h2 class="sec-title">
                            {{ $appoint->title }}
                        </h2>
                    </div>

                    <p class="mt-n2 mb-30 text-xl-start text-center">{{ $appoint->desc }}</p>

                    <div class="contact-feature-wrap">
                        <div class="contact-feature">
                            <div class="icon-btn">
                                <i class="fa-solid fa-phone"></i>
                            </div>

                            <div class="media-body">
                                <p class="contact-feature_label">Call Us On:</p>
                                <a class="contact-feature_link" href="tel:{{ $appoint->phone }}">{{ $appoint->phone }}</a>
                            </div>
                        </div>

                        <div class="contact-feature">
                            <div class="icon-btn">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div class="media-body">
                                <p class="contact-feature_label">Quick Mail Us:</p>
                                <a class="contact-feature_link" href="mailto:{{ $appoint->email }}">{{ $appoint->email }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 ps-xl-4" style="padding-left: 3.5rem!important">
                    <h3 class="h4 mt-n2 mb-30 text-center">Make An Appointment</h3>
                    <form class="appoitment-form" wire:submit.prevent="appointment">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input class="form-control {{ $errors->first('name') ? ' is-invalid' : '' }}" id="name" name="name"
                                    type="text" placeholder="Enter Your Name" wire:model.lazy="name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <input class="form-control {{ $errors->first('email') ? ' is-invalid' : '' }}" id="email" name="email"
                                    type="email" placeholder="Enter Your Email" wire:model.lazy="email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <input class="form-control {{ $errors->first('phone') ? ' is-invalid' : '' }}" id="phone" name="phone"
                                    type="tel" placeholder="Phone Number" wire:model.lazy="phone">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <input class="form-control {{ $errors->first('datetime') ? ' is-invalid' : '' }}" id="datetime" name="datetime"
                                    type="datetime-local" placeholder="Appointment Time" wire:model.lazy="datetime">
                                @error('datetime')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <select class="{{ $errors->first('purpose') ? ' is-invalid' : '' }} form-select" id="purpose" name="purpose"
                                    wire:model.lazy="purpose">
                                    <option value="" selected="selected" hidden>Select Purpose</option>
                                    <option value="Service">Service</option>
                                    <option value="Course">Course</option>
                                    <option value="Institution">Institution</option>
                                </select>
                                @error('purpose')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @if ($purpose == 'Service')
                                <div class="form-group col-sm-6">
                                    <select class="{{ $errors->first('app_service') ? ' is-invalid' : '' }} form-select" id="app_service"
                                        name="app_service" wire:model.lazy="app_service">
                                        <option value="" selected="selected" hidden>Select Service</option>
                                        @foreach ($services as $aservice)
                                            <option value="{{ $aservice->id }}">{{ $aservice->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('app_service')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            @if ($purpose == 'Course')
                                <div class="form-group col-sm-6">
                                    <select class="{{ $errors->first('app_course') ? ' is-invalid' : '' }} form-select" id="app_course"
                                        name="app_course" wire:model.lazy="app_course">
                                        <option value="" selected="selected" hidden>Select Course</option>
                                        @foreach ($courses as $acourse)
                                            <option value="{{ $acourse->id }}">{{ $acourse->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('app_course')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            @if ($purpose == 'Institution')
                                <div class="form-group col-sm-6">
                                    <select class="{{ $errors->first('app_institution') ? ' is-invalid' : '' }} form-select" id="app_institution"
                                        name="app_institution" wire:model.lazy="app_institution">
                                        <option value="" selected="selected" hidden>Select Institution</option>
                                        @foreach ($institutions as $ainstitution)
                                            <option value="{{ $ainstitution->id }}">{{ $ainstitution->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('app_institution')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            <div class="form-group col-12">
                                <textarea class="form-control {{ $errors->first('desc') ? ' is-invalid' : '' }}" id="desc" name="desc" cols="30" rows="3"
                                    placeholder="Write Your Message (optional)" wire:model.lazy="desc">
                                </textarea>
                                @error('desc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-btn col-12">
                                <button class="as-btn w-100" type="submit">BOOK MY APPOINTMENT</button>
                            </div>
                        </div>

                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <x-addedalert />
    @endpush
</div>
