<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->route('dashboard');
            } else {
                $addUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt('userpassword'),
                    'provider' => 'Google',
                    'google_id' => $user->id,
                    'email_verified_at' => Carbon::now(),
                    'profile_photo_path' => $user->avatar,
                ]);

                Auth::login($addUser);
                return redirect()->route('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
