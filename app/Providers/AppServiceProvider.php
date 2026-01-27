<?php

namespace App\Providers;

use App\Models\User;
use Laravel\Fortify\Fortify;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use App\Http\Responses\LogoutResponse;
use App\Listeners\DeleteSanctumTokens;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\LogoutMechanism;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Support\Facades\Crypt;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Your Email Address')
                ->view('mailable.verify-email', ['url' => $url, 'user' => $notifiable]);
        });

        Fortify::authenticateUsing(function ($request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }
        });

        ResetPassword::toMailUsing(function ($notifiable, $token) {
            return (new MailMessage)
                ->subject('Reset Your Password')
                ->view('mailable.reset-password-mail', ['token' => $token, 'user' => $notifiable]);
        });

        Event::listen(Login::class, function ($event) {
            if ($event->guard === 'web') { 
                $token = $event->user->createToken('api_token')->plainTextToken;
                Session::put('user_token', Crypt::encryptString($token));
            }

            if ($event->guard === 'admin') {
                $token = $event->user->createToken('admin_token')->plainTextToken;
                Session::put('admin_token', Crypt::encryptString($token));
            }
        });
    }
}
