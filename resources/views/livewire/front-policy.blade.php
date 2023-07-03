<div>
    @push('title')
        Privacy Policy
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Privacy Policy</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-lg-12">
                    <div class="page-single">
                        <div class="page-content">
                            <h2 class="h3 page-title text-center">{{ $privacy->title }}</h2>
                            <p>{!! $privacy->desc !!}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
