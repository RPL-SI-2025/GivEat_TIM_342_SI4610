<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

// Public route
Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');

// Admin routes (tanpa middleware auth)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/berita', [BeritaController::class, 'adminIndex'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');
});
