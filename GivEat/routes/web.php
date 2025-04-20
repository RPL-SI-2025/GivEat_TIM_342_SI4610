<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(DonationController::class)->group(function () {
    Route::get('/donations/{donation}', 'show')->name('donation.show'); // TODO : pakai middleware kalau sudah ada login
});

Route::controller(ClaimController::class)->group(function () {
    Route::post('/claim/{donation}', 'store')->name('claim.store'); // TODO : pakai middleware kalau sudah ada login
    Route::get('/claim/success/{slug}', 'success')->name('claim.success'); // TODO : pakai middleware kalau sudah ada login
    Route::delete('/claim/{donation}/cancel', 'cancel')->name('claim.cancel'); // TODO : pakai middleware kalau sudah ada login
});