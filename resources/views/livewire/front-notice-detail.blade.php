<div>
    @push('title')
        {{ $notice->title }}
    @endpush

    <!-- beardcrumb -->
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $notice->title }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Notice</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single">
                        <div class="page-content">
                            <p class="">{!! $notice->desc !!}</p>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">

                        <div class="widget widget_download">
                            <h4 class="widget_title">Download Document</h4>
                            <div class="download-widget-wrap">
                                <span class="as-btn" role='button' wire:click.prevent="export">
                                    <i class="fa-light fa-file-pdf me-2"></i>DOWNLOAD PDF
                                </span>
                            </div>
                        </div>

                        <div class="widget widget_banner" data-bg-src="{{ asset('assets/img/bg/widget_banner.jpg') }}">
                            <div class="widget-banner">
                                <h2 class="title">Need Help?</h2>
                                <a class="as-btn style3" href="{{route('contact')}}">Send Us Your Query<i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</div>
