<?php

use App\Http\Controllers\Backend\NewsletterController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the newsletter routes
*/

Route::group(['prefix' => 'dashboard/newsletter', 'middleware' => ['auth']], function () {

  Route::get('/index', [NewsletterController::class, 'index'])->name('newsletter.index');
  Route::get('/delete/{id}', [NewsletterController::class, 'delete'])->name('newsletter.delete');
});
