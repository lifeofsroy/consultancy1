<x-app-layout>
    @push('title')
        Forbidden
    @endpush

    <section class="space">
        <div class="container">
            <div class="error-img">
                <img src="{{ asset('assets/img/theme-img/error.svg') }}" width="50%" alt="403 image">
            </div>

            <div class="error-content">
                <h2 class="error-title">
                    <span class="text-theme">OooPs!</span> You are Not Authorized
                </h2>
                <p class="error-text">
                    You have no access to visit this page.
                </p>
                <a class="as-btn" href="{{ route('home') }}">
                    <i class="fal fa-home me-2"></i>Back To Home
                </a>
            </div>
        </div>
    </section>

</x-app-layout>
