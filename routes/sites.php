<?php

use App\Http\Controllers\Backend\SitesController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the sites routes
*/

Route::group(['prefix' => 'dashboard/sites', 'middleware' => ['auth']], function () {

  Route::get('/index', [SitesController::class, 'index'])->name('sites.index');
  Route::post('/index', [SitesController::class, 'create'])->name('site.crete');
});
