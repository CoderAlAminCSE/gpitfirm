<?php

use App\Http\Controllers\Backend\PagesController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the pages related routes
*/

Route::group(['prefix' => 'dashboard/page/home', 'middleware' => ['auth']], function () {
  Route::get('/hero/index', [PagesController::class, 'homeIndex'])->name('pages.home.hero.index');
  Route::post('/hero/update', [PagesController::class, 'homeUpdate'])->name('pages.home.hero.update');
});
