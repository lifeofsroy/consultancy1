<div>
    @push('title')
        Services
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our Services</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space" id="service-sec">
        <div class="container">
            <div class="row gy-4">

                @foreach ($categories as $index => $category)
                    <div class="col-md-6 col-xl-4">
                        <div class="service-card">
                            <div class="service-card_number">{{ $index + 1 }}</div>
                            <h3 class="box-title">
                                <a href="{{ route('service.by.category', ['servicecat_slug' => $category->slug]) }}">{{ $category->name }}</a>
                            </h3>
                            <p class="service-card_text">{{ $category->short }}</p>
                            <a class="as-btn" href="{{ route('service.by.category', ['servicecat_slug' => $category->slug]) }}">Read More
                                <i class="fa-regular fa-arrow-right ms-2"></i>
                            </a>
                            <div class="bg-shape">
                                <img src="{{ asset('storage') }}/{{$category->image}}" style="filter: blur(2px);
                                -webkit-filter: blur(1px);" alt="bg">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</div>
