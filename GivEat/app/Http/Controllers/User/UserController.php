<?php

namespace App\Http\Controllers\User;

use App\Models\Restaurant;
use App\Models\FoodItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::distinct()->get();
        $foods = FoodItem::distinct()->get();

        return view('dashboard', compact('restaurants', 'foods'));
    }
}
