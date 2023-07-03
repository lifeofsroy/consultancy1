<x-app-layout>
    @push('title')
        Register
    @endpush

    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">REGISTER</h1>
            </div>
        </div>
    </div>

    <div class="as-checkout-wrapper space-top space-extra-bottom" style="padding-top: 30px;">
        <div class="container">

            <x-validation-errors class="text-danger mb-4 text-center" />

            <div class="row">
                <div class="col-12">
                    <form class="woocommerce-form-login" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label>Name *</label>
                            <input class="form-control" name="name" type="text" value="{{ old('name') }}" placeholder="Enter Name" required
                                autofocus autocomplete="name">
                        </div>

                        <div class="form-group">
                            <label>Emaill *</label>
                            <input class="form-control" name="email" type="email" value="{{ old('email') }}" placeholder="Enter Email" required
                                autofocus>
                        </div>

                        <div class="form-group">
                            <label>New Password *</label>
                            <input class="form-control" name="password" type="password" placeholder="Enter New Password" required
                                autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password *</label>
                            <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm New Password" required
                                autocomplete="new-password">
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="form-group">
                                <div class="custom-checkbox">
                                    <input id="terms" name="terms" type="checkbox">
                                    <label for="terms">&ensp; I read and accept <a class="text-primary" href="{{ route('terms.show') }}"
                                        target="_blank">Terms</a> and <a class="text-primary" href="{{ route('policy.show') }}"
                                        target="_blank">Policy</a></label>
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <button class="as-btn" type="submit">Register</button>
                        </div>

                    </form>
                </div>
            </div>

            <div>
                <div class="woocommerce-info">
                    Already Have an Account ? &ensp;
                    <a class="showlogin" href="{{ route('login') }}">Click here to Login</a>
                </div>
            </div>

            <div>
                <div class="googlelogin-info">
                    <a class="showlogin" href="{{ route('google.login') }}">Register with <span class="text-warning"><i class="fab fa-google"></i>oogle</span></a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
