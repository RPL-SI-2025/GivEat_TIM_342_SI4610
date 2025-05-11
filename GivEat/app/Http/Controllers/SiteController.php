<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Show the home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the food claim page
     *
     * @return \Illuminate\View\View
     */
    public function foodClaim()
    {
        return view('food-claim');
    }
}
