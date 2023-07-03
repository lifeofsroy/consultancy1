<div>
    @push('title')
        About Us
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- welcome -->
    <div class="space overflow-hidden">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="img-box4 tilt-active">
                        <img src="{{ asset('storage') }}/{{ $welcome->image }}" alt="About">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <div class="shadow-title">ABOUT US</div><span class="sub-title"><img
                                src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">{{ $welcome->subtitle }}</span>
                        <h2 class="sec-title">{{ $welcome->title }}</h2>
                    </div>
                    <p class="mt-n2 mb-30 text-xl-start text-center">{{ $welcome->desc }}</p>

                    <div class="achivement-tab filter-menu-active indicator-active">
                        @foreach ($missions as $index => $mission)
                            <button class="{{ $index == 0 ? 'active' : '' }}" data-filter=".cat{{ $mission->id }}"
                                type="button">{{ $mission->title }}</button>
                        @endforeach
                    </div>

                    <div class="achivement-box-area filter-active-cat1">
                        @foreach ($missions as $mission)
                            <div class="filter-item w-100 cat{{ $mission->id }}">
                                <div class="achivement-box">
                                    <div class="achivement-box_img">
                                        <img src="{{ asset('storage') }}/{{ $mission->image }}" alt="About">
                                    </div>

                                    <div class="media-body">
                                        <p class="achivement-box_text">{{ $mission->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-smoke" id="process-sec" data-bg-src="{{ asset('assets/img/bg/process_bg_1.png') }}">
        <div class="space container">
            <div class="title-area text-center">
                <div class="shadow-title">PROCESS</div>
                <span class="sub-title">
                    <img src="{{ asset('assets/img/theme-img/title_shape_2.svg') }}" alt="shape">WORK PROCESS</span>
                <h2 class="sec-title">How to work <span class="text-theme">it!</span></h2>
            </div>

            <div class="process-card-area">
                <div class="process-line">
                    <img src="{{ asset('assets/img/bg/process_line.svg') }}" alt="line">
                </div>

                <div class="row gy-40">
                    @foreach ($works as $index => $work)
                        <div class="col-sm-6 col-xl-3 process-card-wrap">
                            <div class="process-card">
                                <div class="process-card_number">0{{$index + 1}}</div>
                                <div class="process-card_icon">
                                    <img src="{{ asset('assets/img/icon/process_card_1.svg') }}" alt="icon">
                                </div>
                                <h2 class="box-title">{{$work->name}}</h2>
                                <p class="process-card_text">{{$work->desc}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</div>
