<x-app-layout>
    @push('title')
        Login
    @endpush

    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">LOGIN</h1>
            </div>
        </div>
    </div>

    <div class="as-checkout-wrapper space-top space-extra-bottom" style="padding-top: 30px;">
        <div class="container">

            <x-validation-errors class="text-center text-danger mb-4" />

            @if (session('status'))
                <div class="text-success mb-4 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <form class="woocommerce-form-login" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label>Emaill *</label>
                            <input class="form-control" name="email" type="email" value="{{ old('email') }}" placeholder="Enter Email" required
                                autofocus>
                        </div>

                        <div class="form-group">
                            <label>Password *</label>
                            <input class="form-control" name="password" type="password" placeholder="Enter Password" required
                                autocomplete="current-password">
                        </div>

                        <div class="form-group">
                            <div class="custom-checkbox">
                                <input id="remember_me" name="remember" type="checkbox">
                                <label for="remember_me">Keep me logged in</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="as-btn" type="submit">Login</button>
                            @if (Route::has('password.request'))
                                <p class="fs-xs mt-2 mb-0">
                                    <a class="text-reset" href="{{ route('password.request') }}">Lost your password?</a>
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="">
                <div class="woocommerce-info">
                    No Account Found ? &ensp;
                    <a class="showlogin" href="{{ route('register') }}">Click here to Register</a>
                </div>
            </div>

            <div class="">
                <div class="googlelogin-info">
                    <a class="showlogin" href="{{ route('google.login') }}">Login with <span class="text-warning"><i class="fab fa-google"></i>oogle</span></a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
