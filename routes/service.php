<?php

use App\Http\Controllers\Backend\ServiceManagementController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the service routes
*/

Route::group(['prefix' => 'dashboard/service/', 'middleware' => ['auth']], function () {
  Route::get('category/index', [ServiceManagementController::class, 'categoryIndex'])->name('service.category.index');
  Route::post('category/index', [ServiceManagementController::class, 'categoryStore'])->name('service.category.store');
  Route::get('category/edit/{id}', [ServiceManagementController::class, 'categoryEdit'])->name('service.category.edit');
  Route::post('category/update/{id}', [ServiceManagementController::class, 'categoryUpdate'])->name('service.category.update');
  Route::get('category/delete/{id}', [ServiceManagementController::class, 'categoryDelete'])->name('service.category.delete');
});
