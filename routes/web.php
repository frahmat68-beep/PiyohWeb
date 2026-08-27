<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');

Route::get('/outlet', [PublicController::class, 'outletIndex'])->name('outlet.index');
Route::get('/outlet/{slug}', [PublicController::class, 'outletShow'])->name('outlet.show');

Route::get('/menu', [PublicController::class, 'menu'])->name('menu');

Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/{career}/apply', [PublicController::class, 'careerApply'])->middleware('throttle:5,1')->name('careers.apply');

Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'contactStore'])->middleware('throttle:10,1')->name('contact.store');
