<x-app-layout>
    @push('title')
        Page Not Found
    @endpush

    <section class="space">
        <div class="container">
            <div class="error-img">
                <img src="{{ asset('assets/img/theme-img/error.svg') }}" width="50%" alt="404 image">
            </div>

            <div class="error-content">
                <h2 class="error-title">
                    <span class="text-theme">OooPs!</span> Page Not Found
                </h2>
                <p class="error-text">
                    Oops! The page you are looking for does not exist. It might have been moved or
                    deleted.
                </p>
                <a class="as-btn" href="{{route('home')}}">
                    <i class="fal fa-home me-2"></i>Back To Home
                </a>
            </div>
        </div>
    </section>

</x-app-layout>
