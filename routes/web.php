<?php

use Livewire\Cart;
use Livewire\Livewire;
use Illuminate\Http\Request;
use App\Livewire\CartComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Oauth\GoogleController;
use App\Http\Controllers\Oauth\FacebookController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.login')->name('admin.home');
    Route::view('/login', 'admin.login')->name('admin.login');
    Route::view('/register', 'admin.register')->name('admin.register');

    Route::view('/dashboard', 'admin.dashboard')
    ->middleware('auth:admin')
    ->name('admin.dashboard');

    Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    Route::post('/create', [AdminController::class, 'create'])->name('admin.create');
    
    Route::view('/add', 'admin.add-product')
    ->middleware('auth:admin')
    ->name('products.form');

    Route::post('/store-product', [ProductsController::class, 'store'])
    ->middleware('auth:admin')
    ->name('products.store');
});

// Payment Routes (protected)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout-success');
    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout-cancel');
});