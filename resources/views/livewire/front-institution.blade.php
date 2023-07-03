<div>
    @push('title')
        Institutions
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our Institutions</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Institutions</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space">
        <div class="container">
            <div class="row gy-4">
                @foreach ($institutions as $institution)
                    <div class="col-md-6 col-xl-4">
                        <div class="project-card">
                            <div class="project-img">
                                <img src="{{ asset('storage') }}/{{ $institution->thumb }}" alt="{{ $institution->name }}">
                            </div>
                            <div class="project-content-wrap">
                                <div class="project-content">
                                    <div class="box-particle" id="project-p1"></div>
                                    <h3 class="box-title">
                                        <a
                                            href="{{ route('facility.institution.detail', ['institution_slug' => $institution->slug]) }}">{{ $institution->name }}</a>
                                    </h3>
                                    <p class="project-subtitle">{{ $institution->location }}</p>
                                    <a class="icon-btn" href="{{ route('facility.institution.detail', ['institution_slug' => $institution->slug]) }}">
                                        <i class="far fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="shape-mockup" data-top="0%" data-right="0%"><img src="{{ asset('assets/img/shape/tech_shape_1.png') }}" alt="shape"></div>
        <div class="shape-mockup" data-bottom="0%" data-left="0%"><img src="{{ asset('assets/img/shape/tech_shape_2.png') }}" alt="shape"></div>
    </section>
</div>
