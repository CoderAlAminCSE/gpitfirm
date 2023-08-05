<?php

use App\Http\Controllers\Backend\PagesController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the pages related routes
*/

Route::group(['prefix' => 'dashboard/page/home', 'middleware' => ['auth']], function () {
  // Home page hero section routes
  Route::get('/hero/index', [PagesController::class, 'homeIndex'])->name('pages.home.hero.index');
  Route::post('/hero/update', [PagesController::class, 'homeUpdate'])->name('pages.home.hero.update');


  // Home page promo section routes
  Route::get('/promo/index', [PagesController::class, 'promoIndex'])->name('pages.home.promo.index');
  Route::post('/promo/create', [PagesController::class, 'promoCreate'])->name('pages.home.promo.crete');
  Route::get('/promo/update/{id}', [PagesController::class, 'promoUpdate'])->name('pages.home.promo.update');
  Route::post('/promo/update/store/{id}', [PagesController::class, 'promoUpdateStore'])->name('pages.home.promo.update.store');
  Route::get('/promo/delete/{id}', [PagesController::class, 'promoDelete'])->name('pages.home.promo.delete');
});
