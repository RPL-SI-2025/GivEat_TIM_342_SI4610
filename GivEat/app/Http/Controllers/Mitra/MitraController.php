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
