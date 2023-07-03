<div>
    @push('title')
        Courses
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our Courses</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Courses</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="as-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-lg-8">

                    <div class="row">
                        @foreach ($courses as $course)
                            <div class="col-md-6 col-xl-6">
                                <div class="blog-card">
                                    <div class="blog-img">
                                        <img src="{{ asset('storage') }}/{{ $course->thumb }}" alt="blog image">
                                    </div>

                                    <div class="blog-content">

                                        <h3 class="box-title">
                                            <a href="{{ route('facility.course.detail', ['course_slug' => $course->slug]) }}">
                                                {{ $course->title }}
                                            </a>
                                        </h3>

                                        <div class="blog-bottom">
                                            <a class="author"
                                                href="{{ route('facility.course.by.category', ['coursecat_slug' => $course->courseCategory->slug]) }}">
                                                {{ $course->courseCategory->name }}
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

                    <div class="d-flex justify-content-center mt-4">
                        {{ $courses->links() }}
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <form class="search-form">
                                <input type="text" placeholder="Enter Keyword" wire:model="searchTerm">
                                <button type="submit">
                                    <i class="far fa-search"></i>
                                </button>
                            </form>
                        </div>

                        <div class="widget widget_categories">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a
                                            href="{{ route('facility.course.by.category', ['coursecat_slug' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget">
                            <h3 class="widget_title">Popular Services</h3>
                            <div class="recent-post-wrap">
                                @foreach ($services as $service)
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="{{ route('service.detail', ['service_slug' => $service->slug]) }}">
                                                <img src="{{ asset('storage') }}/{{$service->thumb}}" alt="Blog Image">
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <h4 class="post-title">
                                                <a class="text-inherit" href="{{ route('service.detail', ['service_slug' => $service->slug]) }}">{{$service->title}}</a>
                                            </h4>

                                            <div class="recent-post-meta">
                                                <a href="{{ route('service.by.category', ['servicecat_slug' => $service->serviceCategory->slug]) }}">
                                                    <i class="fal fa-calendar-days"></i>
                                                    {{$service->serviceCategory->name}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="widget">
                            <h3 class="widget_title">Popular Institutes</h3>
                            <div class="recent-post-wrap">
                                @foreach ($institutions as $institution)
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="{{ route('facility.institution.detail', ['institution_slug' => $institution->slug]) }}">
                                                <img src="{{ asset('storage') }}/{{$institution->thumb}}" alt="Blog Image">
                                            </a>
                                        </div>

                                        <div class="media-body">
                                            <h4 class="post-title">
                                                <a class="text-inherit" href="{{ route('facility.institution.detail', ['institution_slug' => $institution->slug]) }}">{{$institution->name}}</a>
                                            </h4>

                                            <div class="recent-post-meta">
                                                <span>
                                                    <i class="fal fa-calendar-days"></i>
                                                    {{$institution->location}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>
</div>
