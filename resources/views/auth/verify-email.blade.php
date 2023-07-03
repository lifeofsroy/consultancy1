<x-app-layout>
    @push('title')
        Verify Email
    @endpush

    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Verify Your Email</h1>
            </div>
        </div>
    </div>

    <div class="as-checkout-wrapper space-top space-extra-bottom" style="padding-top: 30px;">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <form class="woocommerce-form-login" method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        @if (session('status') == 'verification-link-sent')
                            <div class="payment_box payment_method_bacs">
                                <p style="color: #00b309; font-weight: 500;">You are welcome. A new verification link has been sent to the email address you provided. Please click on that link to verify your email.</p>
                            </div>
                        @else
                            <div class="payment_box payment_method_bacs">
                                <p>We have sent you an email with a verification link. Click on that to verify your email. If you are unable to verify your email, please contact us.</p>
                            </div>
                        @endif

                        <div class="form-group">
                            <button class="as-btn" type="submit">Resend Verification Email</button>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <div class="woocommerce-info">
                    Wanna Try with another Email ? &ensp;
                    <a class="showlogin" href="{{ route('profile.show') }}">Change Email Here</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
