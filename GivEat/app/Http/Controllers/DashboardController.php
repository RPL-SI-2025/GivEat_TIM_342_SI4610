<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\FoodItem;

class DashboardController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::distinct()->get();
        $foods = FoodItem::distinct()->get();

        return view('dashboard', compact('restaurants', 'foods'));

    }
}