<?php

use App\Http\Controllers\Backend\FaqPageController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\PrivacyPolicyPageController;
use App\Http\Controllers\Backend\RefundPageController;
use App\Http\Controllers\Backend\ResellerRulesPageController;
use App\Http\Controllers\Backend\TermsConditionPageConrtoller;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the pages related routes
*/

// Home page routes
Route::group(['prefix' => 'dashboard/page/home', 'middleware' => ['auth', 'admin']], function () {
  // Home page hero section routes
  Route::get('/hero/index', [PagesController::class, 'homeIndex'])->name('pages.home.hero.index');
  Route::post('/hero/update', [PagesController::class, 'homeUpdate'])->name('pages.home.hero.update');


  // Home page promo section routes
  Route::get('/promo/index', [PagesController::class, 'promoIndex'])->name('pages.home.promo.index');
  Route::post('/promo/create', [PagesController::class, 'promoCreate'])->name('pages.home.promo.crete');
  Route::get('/promo/update/{id}', [PagesController::class, 'promoUpdate'])->name('pages.home.promo.update');
  Route::post('/promo/update/store/{id}', [PagesController::class, 'promoUpdateStore'])->name('pages.home.promo.update.store');
  Route::get('/promo/delete/{id}', [PagesController::class, 'promoDelete'])->name('pages.home.promo.delete');


  // Home page about section routes
  Route::get('/about/index', [PagesController::class, 'aboutIndex'])->name('pages.home.about.index');
  Route::post('/about/update', [PagesController::class, 'aboutUpdate'])->name('pages.home.about.update');


  // Home page services section routes
  Route::get('/service/index', [PagesController::class, 'servicesIndex'])->name('pages.home.service.index');
  Route::post('/service/create', [PagesController::class, 'servicesCreate'])->name('pages.home.service.crete');
  Route::get('/service/edit/{id}', [PagesController::class, 'servicesEdit'])->name('pages.home.service.edit');
  Route::post('/service/update/{id}', [PagesController::class, 'servicesUpdate'])->name('pages.home.service.update');
  Route::get('/service/delete/{id}', [PagesController::class, 'serviceDelete'])->name('pages.home.service.delete');


  // Home page testimonial section routes
  Route::get('/testimonial/index', [PagesController::class, 'testimonialIndex'])->name('pages.home.testimonial.index');
  Route::post('/testimonial/create', [PagesController::class, 'testimonialCreate'])->name('pages.home.testimonial.crete');
  Route::get('/testimonial/edit/{id}', [PagesController::class, 'testimonialEdit'])->name('pages.home.testimonial.edit');
  Route::post('/testimonial/update/{id}', [PagesController::class, 'testimonialUpdate'])->name('pages.home.testimonial.update');
  Route::get('/testimonial/delete/{id}', [PagesController::class, 'testimonialDelete'])->name('pages.home.testimonial.delete');


  // Home page contact section routes
  Route::get('/contact/index', [PagesController::class, 'contactIndex'])->name('pages.home.contact.index');
  Route::post('/contact/update', [PagesController::class, 'contactUpdate'])->name('pages.home.contact.update');
});



// FAQ page routes
Route::group(['prefix' => 'dashboard/page/faq', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/index', [FaqPageController::class, 'index'])->name('pages.faq.index');
  Route::post('/create', [FaqPageController::class, 'create'])->name('pages.faq.crete');
  Route::get('/edit/{id}', [FaqPageController::class, 'edit'])->name('pages.faq.edit');
  Route::post('/update/{id}', [FaqPageController::class, 'update'])->name('pages.faq.update');
  Route::get('/delete/{id}', [FaqPageController::class, 'delete'])->name('pages.faq.delete');
});


// Refund page routes
Route::group(['prefix' => 'dashboard/page/refund', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/index', [RefundPageController::class, 'index'])->name('pages.refund.index');
  Route::post('/update', [RefundPageController::class, 'update'])->name('pages.refund.update');
});


// privacy policy page routes
Route::group(['prefix' => 'dashboard/page/privacy-policy', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/index', [PrivacyPolicyPageController::class, 'index'])->name('pages.privacy-policy.index');
  Route::post('/update', [PrivacyPolicyPageController::class, 'update'])->name('pages.privacy-policy.update');
});


// reseller rules page routes
Route::group(['prefix' => 'dashboard/page/reseller-rules', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/index', [ResellerRulesPageController::class, 'index'])->name('pages.reseller-rules.index');
  Route::post('/update', [ResellerRulesPageController::class, 'update'])->name('pages.reseller-rules.update');
});


// turms and condition  page routes
Route::group(['prefix' => 'dashboard/page/terms-condition', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/index', [TermsConditionPageConrtoller::class, 'index'])->name('pages.terms-condition.index');
  Route::post('/update', [TermsConditionPageConrtoller::class, 'update'])->name('pages.terms-condition.update');
});
