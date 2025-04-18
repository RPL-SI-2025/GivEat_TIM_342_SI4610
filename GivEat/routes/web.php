<?php

Use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Mitra\mitraController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// User Routes
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    
    Route::get('dashboard',[UserController::class, 'index'])->name('dashboard');

});

// Mitra Routes
Route::middleware(['auth', 'mitraMiddleware'])->group(function () {
    
    Route::get('/mitra/dashboard',[MitraController::class, 'index'])->name('mitra.dashboard');

});

// Admin Routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    
    Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');

});
