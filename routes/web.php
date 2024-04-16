<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/', [UrlController::class, 'index'])->name('home');
Route::get('/{shortened}', [UrlController::class, 'redirect']);
Route::post('/shorten', [UrlController::class, 'shortUrl'])->name('short_url');
