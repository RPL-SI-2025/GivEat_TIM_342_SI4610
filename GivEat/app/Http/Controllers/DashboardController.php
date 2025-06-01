<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $availableDonations = Donation::where('status', 'available')
            ->with(['partner', 'category'])
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard', [
            'availableDonations' => $availableDonations,
            'restaurants' => ['cheffest', 'bistro', 'dapur', 'resto1', 'resto2', 'selera'] // Keep existing restaurant data
        ]);
    }

    public function availableFoods()
    {
        $availableDonations = Donation::where('status', 'available')
            ->with(['partner', 'category'])
            ->latest()
            ->paginate(12);

        return view('foods.available', compact('availableDonations'));
    }
}