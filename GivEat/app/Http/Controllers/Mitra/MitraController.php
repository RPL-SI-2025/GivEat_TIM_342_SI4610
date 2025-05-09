<?php

namespace App\Http\Controllers\Mitra;

use App\Models\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        // Get statistics
        $stats = [
            'distributed' => Donation::where('status', 'completed')->count(),
            'recipients' => Donation::where('status', 'completed')->sum('portion'),
            'saved' => Donation::where('status', 'completed')->count() * 0.5, // Assuming 0.5kg per donation
        ];

        // Get recent orders
        $recentOrders = Donation::latest()
            ->take(5)
            ->get();

        // Get donation status counts
        $statusCounts = [
            'completed' => Donation::where('status', 'completed')->count(),
            'pending' => Donation::where('status', 'claimed')->count(),
            'unclaimed' => Donation::where('status', 'available')->count(),
        ];

        return view('mitra.dashboard', compact('stats', 'recentOrders', 'statusCounts'));
    }
}
