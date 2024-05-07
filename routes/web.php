<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;


Route::get('/',[PaymentController::class, 'index'])->name('payment');
Route::post('/payment', [PaymentController::class, 'payment'])->name('payment-store');