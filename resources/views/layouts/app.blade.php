<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }} |@stack('title')</title>

    <!-- meta tags -->
    <meta name="author" content="Adhyayan Career">
    <meta name="description"
        content="Adhyayan Career Guidance and Educational Services is the Best Education Consultancy in WEST BENGAL Providing Free of Cost Career Counselling, Financial Association and Admission to Top Indian Universities and Colleges.">
    <meta name="keywords" content="adhyayan,adhyayancareer,consultancy,adhyayan career,career guidance">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <!-- favicon -->
    <link href="{{ asset('assets/img/favicons/apple-icon-57x57.png') }}" rel="apple-touch-icon" sizes="57x57">
    <link href="{{ asset('assets/img/favicons/apple-icon-60x60.png') }}" rel="apple-touch-icon" sizes="60x60">
    <link href="{{ asset('assets/img/favicons/apple-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ asset('assets/img/favicons/apple-icon-76x76.png') }}" rel="apple-touch-icon" sizes="76x76">
    <link href="{{ asset('assets/img/favicons/apple-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ asset('assets/img/favicons/apple-icon-120x120.png') }}" rel="apple-touch-icon" sizes="120x120">
    <link href="{{ asset('assets/img/favicons/apple-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">
    <link href="{{ asset('assets/img/favicons/apple-icon-152x152.png') }}" rel="apple-touch-icon" sizes="152x152">
    <link href="{{ asset('assets/img/favicons/apple-icon-180x180.png') }}" rel="apple-touch-icon" sizes="180x180">
    <link type="image/png" href="{{ asset('assets/img/favicons/android-icon-192x192.png') }}" rel="icon" sizes="192x192">
    <link type="image/png" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}" rel="icon" sizes="32x32">
    <link type="image/png" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}" rel="icon" sizes="96x96">
    <link type="image/png" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}" rel="icon" sizes="16x16">
    <link href="{{ asset('assets/img/favicons/manifest.json') }}" rel="manifest">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/" rel="preconnect">
    <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&amp;family=Roboto:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">

    <!-- styles -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    @livewire('partial.front-plugin')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-225404965-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-225404965-1');
    </script>

    @stack('style')
    @livewireStyles
</head>

<body>
    <!-- preloader -->
    @livewire('partial.front-preloader')

    <!-- search box -->
    @livewire('partial.front-search')

    <!-- header -->
    @livewire('partial.front-header')

    <!-- main -->
    {{ $slot }}

    <!-- footer -->
    @livewire('partial.front-footer')

    <!-- scroll to top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"
                d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98">
            </path>
        </svg>
    </div>

    <!-- scripts -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/particles-config.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    @stack('script')
    @livewireScripts
</body>

</html>
