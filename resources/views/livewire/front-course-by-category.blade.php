<div>
    @push('title')
        {{ $coursecat->name }}
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $coursecat->name }}</h1>
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
                        @foreach ($coursecat->courses as $course)
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

                </div>

                <div class="col-xxl-3 col-lg-4">
                    <aside class="sidebar-area">

                        <div class="widget widget_categories">
                            <h3 class="widget_title">Course Categories</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a class="{{ $category->name == $coursecat->name ? 'text-danger' : '' }}"
                                            href="{{ route('facility.course.by.category', ['coursecat_slug' => $category->slug]) }}">{{ $category->name }}</a>
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
