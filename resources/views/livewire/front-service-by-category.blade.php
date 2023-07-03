<div>
    @push('title')
        {{ $category->name }}
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $category->name }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('service.category') }}">Services</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="as-blog-wrapper space-top space-extra-bottom">
        <div class="container">

            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-6 col-sm-9 pe-xl-5">
                    <div class="title-area text-lg-start text-center">
                        <span class="sub-title">
                            <img src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">
                            Our Services
                        </span>

                        <h2 class="sec-title">
                            We Provide Exclusive Services For
                            <span class="text-theme fw-normal">{{ $category->name }}</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-9 col-lg-8">
                    <div class="row">

                        @foreach ($category->services as $service)
                            <div class="col-md-6 col-xl-6">
                                <div class="project-grid">
                                    <div class="project-grid_img">
                                        <img src="{{ asset('storage') }}/{{ $service->thumb }}" alt="project image">
                                        <a class="play-btn style3" href="{{ route('service.detail', ['service_slug' => $service->slug]) }}">
                                            <i class="far fa-plus"></i>
                                        </a>
                                    </div>

                                    <div class="project-grid_content">
                                        <h3 class="box-title">
                                            <a href="{{ route('service.detail', ['service_slug' => $service->slug]) }}">{{ $service->title }}</a>
                                        </h3>
                                        <p class="project-grid_text">{{ $service->short }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4">
                    <aside class="sidebar-area">

                        <div class="widget widget_categories">
                            <h3 class="widget_title">Service Categories</h3>
                            <ul>
                                @foreach ($servicecats as $servicecat)
                                    <li>
                                        <a class="{{ $servicecat->name == $category->name ? 'text-danger' : '' }}"
                                            href="{{ route('service.by.category', ['servicecat_slug' => $servicecat->slug]) }}">
                                            {{ $servicecat->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>
</div>
