<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::get('/', [LinkController::class, 'index'])->name('home');
Route::post('/shorten', [LinkController::class, 'store'])->name('shorten');
Route::get('/{shortened_url}', [LinkController::class, 'redirect'])->name('redirect');


