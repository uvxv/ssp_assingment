<?php

use Livewire\Cart;
use Livewire\Livewire;
use App\Livewire\CartComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Oauth\GoogleController;
use App\Http\Controllers\Oauth\FacebookController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\EmailVerificationController;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');


// Mail verification routes (controller-backed)
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [EmailVerificationController::class, 'show'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');
});

Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

// OAuth routes
Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google/redirect', 'redirect')->name('auth.google');
    Route::get('auth/google/callback', 'callback');
});

Route::controller(FacebookController::class)->group(function () {
    Route::get('auth/facebook/redirect', 'redirect')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'callback');
});

// Protected User routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session')
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/cart', function () {
        return view('cart');
    })->name('cart.index');
    
    Route::get('/payments', function () {
        return;
    })->name('payments.index')->middleware('verified');
});

// Admin routes
Route::view('/admin', 'admin.dashboard');

// Payment Routes (protected)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/checkout/{price}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout-success');
    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout-cancel');
});