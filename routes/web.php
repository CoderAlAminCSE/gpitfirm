<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// our routes

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/faq', function () {
    return view('frontend/faq');
});

Route::get('/cart', function () {
    return view('frontend/cart');
});

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('removeFromCart');


Route::get('/guest-post', function () {
    return view('frontend/guest_post');
});

Route::get('/link-building', function () {
    return view('frontend/link_building');
});

Route::get('/lost-password', function () {
    return view('frontend/lost_password');
});

Route::get('/my-account', function () {
    return view('frontend/my_account');
});

Route::get('/refund', function () {
    return view('frontend/refund');
});

Route::get('/reseller-rules', function () {
    return view('frontend/reseller_rules');
});

Route::get('/services', function () {
    return view('frontend/services');
});

Route::get('/service/{category}', [ServicesController::class, 'categoryWiseServiceShow'])->name('category.service.show');


Route::get('/service/{service}/show', [ServicesController::class, 'singleServiceShow'])->name('single.service.show');

// Route::get('/single-product', function () {
//     return view('frontend/single_product');
// });

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
