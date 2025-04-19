<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all(); // ambil semua data review
        return view('review.index', compact('reviews')); // kirim ke view
    }
}

