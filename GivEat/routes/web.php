<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return redirect()->to(route('donation.show', 1));
});
Route::get('/', function () {
    return redirect()->to(route('donation.show', 1));
});

// Route::controller(SiteController::class)->group(function () {
//     Route::get('/', 'index')->name('home');
// });



// Route::get('/profile', function () {
//     return view('profile');
// })->name('profile');

// new route for profile and change password 🔥
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('profile.upload-photo');
    Route::delete('/profile/delete-photo', [ProfileController::class, 'deletePhoto'])->name('profile.delete-photo');
    Route::get('/password/change', [PasswordController::class, 'showChangePassword'])->name('password.change');
    Route::post('/password/update', [PasswordController::class, 'updatePassword'])->name('password.update');

    Route::controller(DonationController::class)->group(function () {
        Route::get('/donations/{donation}', 'show')->name('donation.show'); // TODO : pakai middleware kalau sudah ada login
    });

    Route::controller(ClaimController::class)->group(function () {
        Route::post('/claim/{donation}', 'store')->name('claim.store'); // TODO : pakai middleware kalau sudah ada login
        Route::get('/claim/success/{slug}', 'success')->name('claim.success'); // TODO : pakai middleware kalau sudah ada login
        Route::delete('/claim/{donation}/cancel', 'cancel')->name('claim.cancel'); // TODO : pakai middleware kalau sudah ada login
    });
});

// Route::get('/register', function () {
//     return view('register');
// })->name('register');

// new route for register

Route::middleware('guest')->group(function () {


    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Route::get('/login', function () {
    //     return view('login');
    // })->name('login');

    // new route for login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
