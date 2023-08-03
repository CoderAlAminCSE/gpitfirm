<?php

use App\Http\Controllers\Backend\GeneralSettingController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the user related routes
*/

Route::group(['prefix' => 'dashboard/general', 'middleware' => ['auth']], function () {

  // General settings routes
  Route::get('/setting', [GeneralSettingController::class, 'index'])->name('general.setting.index');
  Route::post('/setting/store', [GeneralSettingController::class, 'store'])->name('general.setting');
});
