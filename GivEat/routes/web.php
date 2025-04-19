<?php

use App\Http\Controllers\Api\MitraController;
use App\Http\Controllers\PartnerRestaurantController;


Route::post('/partner', [PartnerRestaurantController::class, 'store'])->name('partner.store');

Route::get('/partner/create', [PartnerRestaurantController::class, 'create'])->name('partner.create');
Route::post('/partner/store', [PartnerRestaurantController::class, 'store'])->name('partner.store');
Route::get('/api/mitra-terdekat', [MitraController::class, 'terdekat']);
Route::get('/partner', [PartnerRestaurantController::class, 'index'])->name('partner.index');
// Edit Form
Route::get('/partner/{id}/edit', [PartnerRestaurantController::class, 'edit'])->name('partner.edit');

// Update Action
Route::put('/partner/{id}', [PartnerRestaurantController::class, 'update'])->name('partner.update');

// Hapus Mitra
Route::delete('/partner/{id}', [PartnerRestaurantController::class, 'destroy'])->name('partner.destroy');
Route::get('/', function () {
    return view('menu');
});

Route::get('/partner/map', [PartnerRestaurantController::class, 'map'])->name('partner.map');
Route::get('/partner/terdekat', [PartnerRestaurantController::class, 'terdekat'])->name('partner.terdekat');
Route::post('/partner/{id}/review', [PartnerRestaurantController::class, 'submitReview'])->name('partner.review');
