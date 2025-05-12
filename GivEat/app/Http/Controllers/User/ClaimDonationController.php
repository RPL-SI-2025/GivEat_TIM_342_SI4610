<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class ClaimDonationController extends Controller
{
    // GET: Halaman sukses klaim makanan
    public function success($id)
    {
        $donation = \App\Models\Donation::with(['category', 'partner'])->findOrFail($id);
        return view('user.claim_donations.claimsuccess', compact('donation'));
    }

    // POST: Claim food
    public function store(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);
        // Cek apakah donasi masih tersedia
        if ($donation->status !== 'available' || $donation->portion < 1) {
            return back()->with('error', 'Donasi sudah tidak tersedia.');
        }
        $user = $request->user();
        // Cegah double claim oleh user yang sama
        $exists = \App\Models\ClaimTransaction::where('donation_id', $donation->id)
            ->where('user_id', $user->id)->exists();
        if ($exists) {
            return back()->with('error', 'Anda sudah pernah klaim donasi ini.');
        }
        // Generate kode pemesanan unik
        $bookingCode = 'GV-' . date('Ymd') . '-' . random_int(1000, 9999);
        // Catat transaksi klaim
        $claim = \App\Models\ClaimTransaction::create([
            'donation_id' => $donation->id,
            'user_id' => $user->id,
            'claimed_at' => now(),
            'booking_code' => $bookingCode,
        ]);
        // Kurangi porsi atau update status jika habis
        if ($donation->portion > 1) {
            $donation->portion -= 1;
            $donation->save();
        } else {
            $donation->status = 'claimed';
            $donation->portion = 0;
            $donation->save();
        }
        // Redirect ke halaman sukses klaim
        return redirect()->route('claim.success', $donation->id)->with('success', 'Berhasil klaim makanan!');
    }

    // Show food claim page for a specific donation
    public function show($id)
    {
        $donation = Donation::with(['category', 'partner'])->findOrFail($id);
        $otherDonations = Donation::where('status', 'available')
            ->where('id', '!=', $id)
            ->with(['partner', 'category'])
            ->latest()
            ->take(4)
            ->get();
        return view('user.claim_donations.foodclaim', compact('donation', 'otherDonations'));
    }
}
