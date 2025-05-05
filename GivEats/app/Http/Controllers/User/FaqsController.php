<?php

namespace App\Http\Controllers\user;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Menampilkan halaman FAQ.
     */
    public function index()
    {
        // Mengambil semua data FAQ
        $faqs = Faq::all();

        // Menampilkan ke view faq.index
        return view('user.faq', compact('faqs'));
    }
}
