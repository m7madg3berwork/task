<?php

use App\Http\Controllers\DecryptController;
use App\Http\Controllers\EncryptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(EncryptController::class)->group(function () {
    Route::get('/encrypt', 'show')->name('encrypt.show');
    Route::post('/encrypt', 'store')->name('encrypt.store');
});

Route::controller(DecryptController::class)->group(function () {
    Route::get('/decrypt', 'show')->name('decrypt.show');
    Route::post('/decrypt', 'store')->name('decrypt.store');
});