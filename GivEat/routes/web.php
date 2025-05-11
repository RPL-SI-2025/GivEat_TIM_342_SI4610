<?php
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Mitra\MitraController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route publik
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

// Route autentikasi dan profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route khusus role
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'mitraMiddleware'])->group(function () {
    Route::get('/mitra/dashboard', [MitraController::class, 'index'])->name('mitra.dashboard');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
