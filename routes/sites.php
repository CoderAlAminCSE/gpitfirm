<?php

use App\Http\Controllers\Backend\SitesController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the sites routes
*/

Route::group(['prefix' => 'dashboard/sites', 'middleware' => ['auth', 'admin']], function () {

  Route::get('/index', [SitesController::class, 'index'])->name('sites.index');
  Route::post('/create', [SitesController::class, 'create'])->name('site.crete');
  Route::get('/edit/{id}', [SitesController::class, 'edit'])->name('site.edit');
  Route::post('/update/{id}', [SitesController::class, 'update'])->name('site.update');
  Route::get('/delete/{id}', [SitesController::class, 'delete'])->name('site.delete');
});
