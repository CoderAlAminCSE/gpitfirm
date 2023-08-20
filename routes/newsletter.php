<?php

use App\Http\Controllers\Backend\NewsletterController;
use Illuminate\Support\Facades\Route;

/*
| In this route we will configure the newsletter routes
*/

Route::group(['prefix' => 'dashboard/newsletter', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/index', [NewsletterController::class, 'index'])->name('newsletter.index');
  Route::get('/delete/{id}', [NewsletterController::class, 'delete'])->name('newsletter.delete');
  Route::post('/form/submit', [NewsletterController::class, 'newsletterFormSubmit'])->name('newsletter.form.submit');
  Route::post('/send/email', [NewsletterController::class, 'newsletterSendEmaiToAllSubscribers'])->name('newsletter.all.email.send');
});



Route::group(['prefix' => 'dashboard/contact/messages', 'middleware' => ['auth', 'admin']], function () {
  Route::get('/index', [NewsletterController::class, 'ContactMessageIndex'])->name('contact.message.index');
  Route::post('/submit', [NewsletterController::class, 'contactFormSubmit'])->name('contact.form.submit');
  Route::get('/delete/{id}', [NewsletterController::class, 'contactMessageDelete'])->name('contact.message.delete');
});
