<?php

use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;



// Order related routes
Route::group(['prefix' => 'dashboard/order/', 'middleware' => ['auth', 'admin']], function () {
  Route::get('index', [OrderController::class, 'orderIndex'])->name('order.index');
  Route::get('show/{id}', [OrderController::class, 'orderShow'])->name('order.show');
  Route::get('cancel/{id}', [OrderController::class, 'orderCancel'])->name('order.cancel');
});


// Invoice related routes
Route::group(['prefix' => 'dashboard/invoice/', 'middleware' => ['auth', 'admin']], function () {
  Route::get('index', [OrderController::class, 'invoiceIndex'])->name('invoice.index');
  Route::get('show/{id}', [OrderController::class, 'invoiceShow'])->name('invoice.show');
  Route::get('edit/{id}', [OrderController::class, 'invoiceEdit'])->name('invoice.edit');
  Route::post('update/{id}', [OrderController::class, 'invoiceUpdate'])->name('invoice.update');
  Route::get('generate', [OrderController::class, 'invoiceGenerate'])->name('invoice.generate');
  Route::post('store', [OrderController::class, 'invoiceStore'])->name('invoice.store');
  Route::get('reminder/{id}', [OrderController::class, 'invoiceReminder'])->name('invoice.reminder');
});


// invoice details page for customers 
Route::get('invoice/{encryptedInvoice}', [OrderController::class, 'invoiceShowForCustomer'])->name('customer.invoice.show');
Route::post('invoice/payment/confirm', [OrderController::class, 'invoicePaymentConfirm'])->name('invoice.payment.confirm');


//paypal payment routes
Route::get('/invoice/pay/processPaypal', [OrderController::class, 'processPaypal'])->name('invoice.processPaypal');
Route::get('/invoice/pay/processCancel', [OrderController::class, 'processCancel'])->name('invoice.processCancel');
Route::get('/invoice/pay/processSuccess', [OrderController::class, 'processSuccess'])->name('invoice.processSuccess');



// Delete this route
Route::get('/invoice-email', function () {
  return view('backend.emails.invoice_reminder_mail');
});
