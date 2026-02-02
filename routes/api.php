<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;

Route::get('/user', function (Request $request) {
    return ['user' => $request->user()];
})->middleware('cors-custom','throttle:20,1');

// API resource routes for application models (excluding Admin and User)
Route::middleware('auth:sanctum','throttle:20,1')->group(function () {  
Route::apiResource('products', ProductController::class);
Route::apiResource('carts', CartController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('transactions', PaymentController::class);
});