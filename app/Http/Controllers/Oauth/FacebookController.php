<?php

namespace App\Http\Controllers\Oauth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $facebookuser = Socialite::driver('facebook')->user();
        $user = User::updateorcreate(
            ['email' => $facebookuser->getEmail()],
            [
                'first_name' => $facebookuser->user['name'],
                'last_name' => ' ',
                'password' => bcrypt(Str::random(16)),
                'profile_photo_path' => $facebookuser->getAvatar(),
            ]
        );

        Auth::login($user);
        return redirect()->route('dashboard');

    }
}
