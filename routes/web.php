<?php

use App\Livewire\CartComponent;
use Livewire\Cart;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/cart', function () {
        return view('cart');
    })->name('cart.index');
    Route::get('/payments', function () {
        return;
    })->name('payments.index');
});
