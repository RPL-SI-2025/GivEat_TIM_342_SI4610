<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

// Using User Controller
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\FaqsController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\ClaimDonationController;
use App\Http\Controllers\User\ForumController;

// Using Mitra Controller
use App\Http\Controllers\Mitra\MitraController;
use App\Http\Controllers\Mitra\DonationController;

// Using Admin Controller
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ManajemenmitraController;

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Authenticated user profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// =====================
// User Routes
// =====================
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    // Food claim routes
    Route::get('/claim/food/{id}', [ClaimDonationController::class, 'show'])->name('claim.food');
    Route::post('/claim/food/{id}', [ClaimDonationController::class, 'store'])->name('claim.food.store');
    Route::get('/claim/food/{id}/success', [ClaimDonationController::class, 'success'])->name('claim.success');
    Route::get('/claim-history', [ClaimDonationController::class, 'showClaimHistory'])->name('claim.history');
    Route::get('/claim/food/{donation}/map', [ClaimDonationController::class, 'showMap'])->name('claim.food.map');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/makanan-tersedia', [DashboardController::class, 'availableFoods'])->name('foods.available');

    // Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');

    // FAQ
    Route::get('/faq', [FaqsController::class, 'index'])->name('faq.index');

    // Review CRUD
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    //forum
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show'); // ✅ TAMBAHKAN INI
    Route::get('/forum/{id}/edit', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{id}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');
    // Comment forum CRUD
    Route::post('/forum/{id}/comment', [ForumController::class, 'storeComment'])->name('forum.comment.store');
    Route::get('/forum/comment/{comment}/edit', [ForumController::class, 'editComment'])->name('forum.comment.edit');
    Route::put('/forum/comment/{comment}', [ForumController::class, 'updateComment'])->name('forum.comment.update');
    Route::delete('/forum/comment/{id}', [ForumController::class, 'destroyComment'])->name('forum.comment.destroy');
    Route::post('/forum/{topic}/like', [ForumController::class, 'like'])->name('forum.like');

});

// =====================
// Mitra Routes
// =====================
Route::middleware(['auth', 'mitraMiddleware'])->group(function () {
    Route::get('/mitra/dashboard', [MitraController::class, 'index'])->name('mitra.dashboard');
    // Donations CRUD
    Route::get('/mitra/donations', [DonationController::class, 'index'])->name('mitra.donations.index');
    Route::get('/mitra/donations/create', [DonationController::class, 'create'])->name('donations.create');
    Route::post('/mitra/donations', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/mitra/donations/edit/{donation}', [DonationController::class, 'edit'])->name('donations.edit');
    Route::put('/mitra/donations/edit/{donation}', [DonationController::class, 'update'])->name('donations.update');
    Route::delete('/mitra/donations/{donation}', [DonationController::class, 'destroy'])->name('donations.destroy');
    Route::get('/mitra/donations/{donation}', [DonationController::class, 'show'])->name('donations.show');
    // History page
    Route::get('/mitra/history', [MitraController::class, 'history'])->name('mitra.history');
    Route::get('/mitra/history/export-pdf', [MitraController::class, 'exportHistoryPdf'])->name('mitra.history.export_pdf');
    Route::patch('/mitra/history/{id}/update-status', [MitraController::class, 'updateStatus'])->name('mitra.history.update_status');
});

// =====================
// Admin Routes
// =====================
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // FAQ CRUD
    Route::get('/admin/faq', [FaqController::class, 'index'])->name('admin.faq.index');
    Route::get('/admin/faq/create', [FaqController::class, 'create'])->name('admin.faq.create');
    Route::post('/admin/faq/store', [FaqController::class, 'store'])->name('admin.faq.store');
    Route::get('/admin/faq/edit/{faq}', [FaqController::class, 'edit'])->name('admin.faq.edit');
    Route::put('/admin/faq/edit/{faq}', [FaqController::class, 'update'])->name('admin.faq.update');
    Route::delete('/admin/faq/{faq}', [FaqController::class, 'destroy'])->name('admin.faq.destroy');
    // Berita CRUD
    Route::get('/admin/berita', [BeritaController::class, 'adminIndex'])->name('admin.berita.index');
    Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/admin/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/admin/berita/{berita}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/admin/berita/{berita}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
    // Manajement Mitra CRUD
    Route::get('admin/mitra', [ManajemenmitraController::class, 'index'])->name('admin.manajemenmitra.index');
    Route::get('admin/mitra/create', [ManajemenmitraController::class, 'create'])->name('admin.manajemenmitra.create');
    Route::post('admin/mitra', [ManajemenmitraController::class, 'store'])->name('admin.manajemenmitra.store');
    Route::get('admin/mitra/{mitra}/edit', [ManajemenmitraController::class, 'edit'])->name('admin.manajemenmitra.edit');
    Route::put('admin/mitra/{mitra}', [ManajemenmitraController::class, 'update'])->name('admin.manajemenmitra.update');
    Route::delete('admin/mitra/{mitra}', [ManajemenmitraController::class, 'destroy'])->name('admin.manajemenmitra.destroy');

    // Forum admin
    Route::get('admin/forum', [ForumController::class, 'adminIndex'])->name('admin.forum.index');
    Route::get('admin/forum/{id}', [ForumController::class, 'adminShow'])->name('admin.forum.show');
    Route::delete('admin/forum/{id}', [ForumController::class, 'adminDestroy'])->name('admin.forum.destroy');
    Route::delete('admin/forum/comment/{id}', [ForumController::class, 'adminDestroyComment'])->name('admin.comment.destroy');
    
});
