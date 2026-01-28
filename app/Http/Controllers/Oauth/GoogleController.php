<?php

namespace App\Http\Controllers\Oauth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleuser = Socialite::driver('google')->user();
        $user = User::updateorcreate(
            ['email' => $googleuser->getEmail()],
            [
                'first_name' => $googleuser->user['name'],
                'last_name' => $googleuser->user['given_name'],
                'password' => bcrypt(Str::random(16)),
                'profile_photo_path' => $googleuser->getAvatar(),
            ]
        );

        $token =  $user->createToken('api_token')->plainTextToken;
        Session::put('user_token', Crypt::encrypt($token));
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
