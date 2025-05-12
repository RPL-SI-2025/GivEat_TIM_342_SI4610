<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Using User Controller
Use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\FaqsController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\ForumController;

// Using Mitra Controller
use App\Http\Controllers\Mitra\mitraController;
use App\Http\Controllers\Mitra\DonationController;

// Using Admin Controller
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BeritaController;





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
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/faq', [FaqsController::class, 'index'])->name('faq.index');

    // Review CRUD
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show'); // ✅ TAMBAHKAN INI
    Route::get('/forum/{id}/edit', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{id}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');

    // Comment CRUD
    Route::post('/forum/{id}/comment', [ForumController::class, 'storeComment'])->name('forum.comment.store');
    Route::get('/forum/comment/{comment}/edit', [ForumController::class, 'editComment'])->name('forum.comment.edit');
    Route::put('/forum/comment/{comment}', [ForumController::class, 'updateComment'])->name('forum.comment.update');
    Route::delete('/forum/comment/{id}', [ForumController::class, 'destroyComment'])->name('forum.comment.destroy');

    Route::post('/forum/{topic}/like', [ForumController::class, 'like'])->name('forum.like');

});

// Mitra Routes
Route::middleware(['auth', 'mitraMiddleware'])->group(function () {
    Route::get('/mitra/dashboard',[MitraController::class, 'index'])->name('mitra.dashboard');
    
    // Donations CRUD
    Route::get('/mitra/donations', [DonationController::class, 'index'])->name('mitra.donations.index');
    Route::get('mitra/donations/create', [DonationController::class, 'create'])->name('donations.create');
    Route::post('mitra/donations', [DonationController::class, 'store'])->name('donations.store');
    Route::get('mitra/donations/edit/{donation}', [DonationController::class, 'edit'])->name('donations.edit');
    Route::put('mitra/donations/edit/{donation}', [DonationController::class, 'update'])->name('donations.update');
    Route::delete('mitra/donations/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');
    Route::get('mitra/donations/{donation}', [DonationController::class, 'show'])->name('donations.show');
});

// Admin Routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');

    // FAQ CRUD
    Route::get('admin/faq', [FaqController::class, 'index'])->name('admin.faq.index');
    Route::get('admin/faq/create',[FaqController::class, 'create'])->name('admin.faq.create');
    Route::post('admin/faq/store',[FaqController::class, 'store'])->name('admin.faq.store');
    Route::get('admin/faq/edit/{faq}',[FaqController::class, 'edit'])->name('admin.faq.edit');
    Route::put('admin/faq/edit/{faq}', [FaqController::class, 'update'])->name('admin.faq.update');
    Route::delete('/admin/faq/{faq}', [FaqController::class, 'destroy'])->name('admin.faq.destroy');

    // Berita CRUD
    Route::get('admin/berita', [BeritaController::class, 'adminIndex'])->name('admin.berita.index');
    Route::get('admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('admin/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('admin/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('admin/berita/{berita}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('admin/berita/{berita}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

});
