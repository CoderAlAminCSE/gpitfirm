<?php

use App\Http\Controllers\PaymentGatewayController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the user related routes
*/

Route::group(['prefix' => 'dashboard/payment/settings', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/paddle', [PaymentGatewayController::class, 'paddleIndex'])->name('payment.paddle.index');
    Route::post('/update', [PaymentGatewayController::class, 'paddleUpdate'])->name('payment.paddle.update');
});
