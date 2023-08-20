<?php

use App\Http\Controllers\Backend\SitesController;
use App\Http\Controllers\Backend\SmtpController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the SMTP routes
*/

Route::group(['prefix' => 'dashboard/settings', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/smtp/index', [SmtpController::class, 'index'])->name('smtp.index');
  Route::post('/smtp/update', [SmtpController::class, 'update'])->name('smtp.update');
  Route::post('/smtp/test', [SmtpController::class, 'test'])->name('smtp.test');
});
