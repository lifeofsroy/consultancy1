<x-app-layout>
    @push('title')
        Reset Password
    @endpush

    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">RESET PASSWORD</h1>
            </div>
        </div>
    </div>

    <div class="as-checkout-wrapper space-top space-extra-bottom" style="padding-top: 30px;">
        <div class="container">

            <x-validation-errors class="text-danger mb-4 text-center" />

            <div class="row">
                <div class="col-12">
                    <form class="woocommerce-form-login" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group">
                            <label>Emaill</label>
                            <input class="form-control" name="email" type="email" value="{{ old('email', $request->email) }}" placeholder="Enter Email"
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

                        <div class="form-group">
                            <button class="as-btn" type="submit">Update Password</button>
                        </div>

                    </form>
                </div>
            </div>

            <div>
                <div class="woocommerce-info">
                    Remember Your Password ? &ensp;
                    <a class="showlogin" href="{{ route('login') }}">Click here to Login</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
