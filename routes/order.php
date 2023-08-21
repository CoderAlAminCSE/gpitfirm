<?php

use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the order routes
*/

Route::group(['prefix' => 'dashboard/order/', 'middleware' => ['auth', 'admin']], function () {
  Route::get('index', [OrderController::class, 'orderIndex'])->name('order.index');
});


// Invoice related routes
Route::group(['prefix' => 'dashboard/invoice/', 'middleware' => ['auth', 'admin']], function () {
  Route::get('index', [OrderController::class, 'invoiceIndex'])->name('invoice.index');
});
