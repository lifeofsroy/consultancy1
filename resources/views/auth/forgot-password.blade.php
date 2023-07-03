<x-app-layout>
    @push('title')
        Forgot Password
    @endpush

    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Forgot Password ?</h1>
            </div>
        </div>
    </div>

    <div class="as-checkout-wrapper space-top space-extra-bottom" style="padding-top: 30px;">
        <div class="container">

            <x-validation-errors class="text-center text-danger mb-4" />

            <div class="row">
                <div class="col-12">
                    <form class="woocommerce-form-login" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        @if (session('status'))
                            <div class="payment_box payment_method_bacs">
                                <p style="color: #00b309; font-weight: 500;">{{ session('status') }}</p>
                            </div>
                        @else
                            <div class="payment_box payment_method_bacs">
                                <p>No problem. Just let us know your email address and we will email you a password reset link. We're happy to help you.</p>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Emaill *</label>
                            <input class="form-control" name="email" type="email" placeholder="Enter Email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <button class="as-btn" type="submit">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <div class="woocommerce-info">
                    Email Not Found ? &ensp;
                    <a class="showlogin" href="{{ route('register') }}">Click here to Register</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
