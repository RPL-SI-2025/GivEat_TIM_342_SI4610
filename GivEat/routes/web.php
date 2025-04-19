<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ClaimController;

// Route::get('/klaim-makanan', function () {
//     return view('klaimmakanan');

// });
Route::get('/donations', [DonationController::class, 'index'])->name('donations.index');
Route::get('/donations/{id}', [DonationController::class, 'show'])->name('donations.show');

Route::resource('/claims', ClaimController::class);
// Route::post('/claims-alsdijalsjid', [ClaimController::class, 'namafunction']);