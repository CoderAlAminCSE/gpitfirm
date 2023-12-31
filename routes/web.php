<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\ServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// our routes

Route::get('/', function () {
    return view('frontend/index');
})->name('frontenc.index');

Route::get('/faq', function () {
    return view('frontend/faq');
});

Route::get('/cart', function () {
    return view('frontend/cart');
})->name('frontend.cart.page');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('removeFromCart');


// order place route
Route::post('/cart/order/place', [CartController::class, 'cartOrderPlace'])->name('cart.order.place');
Route::post('/checkout/confirm/', [CartController::class, 'orderCheckoutConfirm'])->name('frontend.checkout.confirm');

//paypal payment routes
Route::get('/processPaypal', [CartController::class, 'processPaypal'])->name('processPaypal');
Route::get('/processCancel', [CartController::class, 'processCancel'])->name('processCancel');
Route::get('/processSuccess', [CartController::class, 'processSuccess'])->name('processSuccess');

Route::get('/guest-post', function () {
    return view('frontend/guest_post');
});

Route::get('/link-building', function () {
    return view('frontend/link_building');
});

Route::get('/lost-password', function () {
    return view('frontend/lost_password');
});


Route::middleware('auth')->group(function () {
    Route::get('/my-account', [AccountController::class, 'myAccount'])->name('customer.account');
    Route::get('/my-account/orders', [AccountController::class, 'orderIndex'])->name('customer.account.order.list');
    Route::get('/my-account/orders/details/{order_number}', [AccountController::class, 'orderDetails'])->name('customer.account.order.details');
    Route::get('/my-account/orer/cancel/{id}', [AccountController::class, 'orderCancel'])->name('customer.account.order.cancel');
    Route::get('/my-account/downloads', [AccountController::class, 'downloadIndex'])->name('customer.account.download.list');
    Route::get('/my-account/details', [AccountController::class, 'accountDetails'])->name('customer.account.details');
    Route::post('/my-account/update/{id}', [AccountController::class, 'accountUpdate'])->name('customer.account.update');
});



Route::get('/refund', function () {
    return view('frontend/refund');
});

Route::get('/reseller-rules', function () {
    return view('frontend/reseller_rules');
});

Route::get('/services', function () {
    return view('frontend/services');
})->name('frontend.services');

Route::get('/service/{category}', [ServicesController::class, 'categoryWiseServiceShow'])->name('category.service.show');

Route::get('/service/{service}/show', [ServicesController::class, 'singleServiceShow'])->name('single.service.show');

Route::get('/contact', function () {
    return view('frontend/contact');
});

Route::get('/sites', function () {
    return view('frontend/sites');
});

Route::get('/terms-condition', function () {
    return view('frontend/terms_condition');
});

Route::get('/privacy-policy', function () {
    return view('frontend/privacy_policy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// forget password related routes
Route::get('/forgot/password/email/verification', [AccountController::class, 'forgotPassEmailVerificationPage'])->name('forgotpass.email.verifypage');
Route::post('/forgot/password/verification', [AccountController::class, 'forgotPassVerificationPage'])->name('forgotpass.verifypage');
Route::post('/verifiy/verification/code', [AccountController::class, 'verifiyVerificationCode'])->name('verifiy.verification.code');
Route::post('/forgotpass/newpass/store', [AccountController::class, 'forgotPassNewPassStore'])->name('forgotpass.newpass.store');
