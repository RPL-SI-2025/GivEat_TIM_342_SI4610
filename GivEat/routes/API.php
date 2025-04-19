<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MitraController;

Route::get('/mitra-terdaftar', [MitraController::class, 'semua']);
Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});
