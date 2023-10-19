<?php

use App\Http\Controllers\PaymentGatewayController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the user related routes
*/

Route::group(['prefix' => 'dashboard/payment/settings', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/paddle', [PaymentGatewayController::class, 'paddleIndex'])->name('payment.paddle.index');
    Route::post('/stripe/update', [PaymentGatewayController::class, 'paddleUpdate'])->name('payment.paddle.update');

    Route::get('/stripe', [PaymentGatewayController::class, 'stripeIndex'])->name('payment.stripe.index');
    Route::post('/paddle/update', [PaymentGatewayController::class, 'stripeUpdate'])->name('payment.stripe.update');

    Route::get('/paypal', [PaymentGatewayController::class, 'paypalIndex'])->name('payment.paypal.index');
    Route::post('/paypal/update', [PaymentGatewayController::class, 'paypalUpdate'])->name('payment.paypal.update');

    Route::post('/paypal/mood/update', [PaymentGatewayController::class, 'paypalMoodUpdate'])->name('payment.paypal.mood.update');
});
