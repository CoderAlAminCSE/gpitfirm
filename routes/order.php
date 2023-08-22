<?php

use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the order routes
*/

Route::group(['prefix' => 'dashboard/order/', 'middleware' => ['auth', 'admin']], function () {
  Route::get('index', [OrderController::class, 'orderIndex'])->name('order.index');
  Route::get('cancel/{id}', [OrderController::class, 'orderCancel'])->name('order.cancel');
});


// Invoice related routes
Route::group(['prefix' => 'dashboard/invoice/', 'middleware' => ['auth', 'admin']], function () {
  Route::get('index', [OrderController::class, 'invoiceIndex'])->name('invoice.index');
  Route::get('show/{id}', [OrderController::class, 'invoiceShow'])->name('invoice.show');
  Route::get('generate', [OrderController::class, 'invoiceGenerate'])->name('invoice.generate');
  Route::post('store', [OrderController::class, 'invoiceStore'])->name('invoice.store');
});
