<?php

namespace App\Http\Controllers\Mitra;

use App\Models\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MitraController extends Controller
{
    public function index()
    {
        // Get the authenticated user (mitra)
        $user = auth()->user();
        
        // Get donations by this partner
        
        // Get recent claim transactions for these donations
        // Get all claim transactions for this partner's donations
        $claimTransactions = \App\Models\ClaimTransaction::all();

        // Calculate statistics
        $totalTransactions = $claimTransactions->count();
        $totalReceivers = $claimTransactions->unique('user_id')->count();
        $totalKg = $totalTransactions * 0.5; // 0.5kg per portion
        
        // Debug: Log the donation IDs and transaction count
        \Log::info('Dashboard Stats', [
            'partner_id' => $user->id,
            'total_transactions' => $totalTransactions,
            'claim_transactions' => $claimTransactions->toArray()
        ]);
        
        // Get recent claim transactions for these donations
        $recentTransactions = $claimTransactions->sortByDesc('claimed_at')->take(5);
            
        // Status counts
        $statusCounts = [
            'done' => $claimTransactions->where('status', 'done')->count(),
            'pending' => $claimTransactions->where('status', 'pending')->count(),
            'not_taken' => $claimTransactions->where('status', 'not_taken')->count(),
        ];
        
        // Prepare stats for the cards
        // Get total orders count (all claim transactions for this partner)
        $totalOrders = \App\Models\ClaimTransaction::count();
        
        $stats = [
            'distributed' => $totalKg,           // Total kg of food distributed
            'recipients' => $totalReceivers,    // Total unique users who received food
            'saved' => $totalKg,                // Total kg of food saved (portions * 0.5kg)
            'total_orders' => $totalOrders      // Total number of all orders
        ];

        $availableDonations = Donation::where('status', 'available')
            ->with(['partner', 'category'])
            ->latest()
            ->take(4)
            ->get();

        // Get 5 most recent orders for the dashboard table
        $orders = \App\Models\ClaimTransaction::with(['donation', 'user'])
            ->latest('claimed_at')
            ->take(5) // Show last 5 orders
            ->get();

        return view('mitra.dashboard', [
            'stats' => $stats,
            'recentOrders' => $recentTransactions,
            'orders' => $orders, // Add orders to the view
            'statusCounts' => $statusCounts,
            'totalTransactions' => $totalTransactions,
            'availableDonations' => $availableDonations,
        ]);
    }

    // Halaman Riwayat
    public function history()
    {
        // Ambil transaksi yang dilakukan oleh mitra (user yang sedang login)
        $user = auth()->user();
        // Diasumsikan mitra adalah partner, dan donasi yang dilakukan oleh partner
        $donationIds = \App\Models\Donation::where('partner_id', $user->id)->pluck('id');

        // Ambil SEMUA transaksi klaim makanan (tanpa filter mitra)
        $ordersQuery = \App\Models\ClaimTransaction::with(['donation', 'user'])
            ->orderByDesc('claimed_at');
        if (request('status')) {
            $ordersQuery->where('status', request('status'));
        }
        $orders = $ordersQuery->paginate(10);

        // Statistik
        $total_distributed = $orders->count();
        $total_receivers = $orders->unique('user_id')->count();
        $total_kg = $orders->count() * 0.5; // Asumsi 0.5kg per transaksi, sesuaikan jika ada field berat

        return view('mitra.history.history', compact('total_distributed', 'total_receivers', 'total_kg', 'orders'));
    }

    // Update status ClaimTransaction
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,done,not_taken',
        ]);
        $transaction = \App\Models\ClaimTransaction::findOrFail($id);
        $transaction->status = $request->status;
        $transaction->save();
        return back()->with('success', 'Status transaksi berhasil diubah!');
    }
}