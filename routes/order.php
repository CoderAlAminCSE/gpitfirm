<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use App\Mail\InvoiceReminderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\OrderController;

// Order related routes
Route::group(['prefix' => 'dashboard/order/', 'middleware' => ['auth', 'admin']], function () {
  Route::get('index', [OrderController::class, 'orderIndex'])->name('order.index');
  Route::get('show/{id}', [OrderController::class, 'orderShow'])->name('order.show');
  Route::get('cancel/{id}', [OrderController::class, 'orderCancel'])->name('order.cancel');
});


// Order report routes
Route::group(['prefix' => 'dashboard/report', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/order', [OrderController::class, 'orderReport'])->name('order.report');
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
Route::get('invoice/download/{id}', [OrderController::class, 'invoiceDownloadForCustomer'])->name('customer.invoice.download');
Route::post('invoice/payment/confirm', [OrderController::class, 'invoicePaymentConfirm'])->name('invoice.payment.confirm');


//paypal payment routes
Route::get('/invoice/pay/processPaypal', [OrderController::class, 'processPaypal'])->name('invoice.processPaypal');
Route::get('/invoice/pay/processCancel', [OrderController::class, 'processCancel'])->name('invoice.processCancel');
Route::get('/invoice/pay/processSuccess', [OrderController::class, 'processSuccess'])->name('invoice.processSuccess');



// Delete this route (it was created for testing the invoice auto reminder)
Route::get('/reminder', function () {

  $orders  = Order::where('created_at', '<=', Carbon::now()->subHours(24))->where('payment_status', 0)
    ->whereNull('canceled_at')->get();

  foreach ($orders as $order) {
    $invoice  = Invoice::with('order', 'user', 'order.items')->where('order_id', $order->id)->first();
    $details = [
      'from' => env('MAIL_FROM_ADDRESS'),
      'subject' => siteSetting('company_name') . ' - Complete your order',
      'company_phone' => siteSetting('company_phone'),
      'company_website' => siteSetting('company_website'),
      'company_name' => siteSetting('company_name'),
    ];

    $receiver = User::where('id', $invoice->user->id)->first();
    if ($receiver) {
      Mail::to($receiver->email)->send(new InvoiceReminderMail($details, $invoice));
    }
  }
});
