<?php

use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the user related routes
*/

Route::group(['prefix' => 'dashboard/user', 'middleware' => ['auth', 'admin']], function () {

  // Admin user routes
  Route::get('/index', [UserController::class, 'index'])->name('user.index');
  Route::post('/update', [UserController::class, 'update'])->name('user.update');
  Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
  Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
  Route::post('/profile/update', [UserController::class, 'profileUpdate'])->name('user.profile.update');
});
