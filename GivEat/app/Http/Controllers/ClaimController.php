<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\User;
use App\Models\Donation;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Auth;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->all();

        // Buat klaim baru
        $claim = Claim::create([
            'recipient_id' => Recipient::first()->user_id,
            'donation_id' => $input['donation_id'],
            'claim_date' => date('Y-m-d H:i:s')
        ]);

        // Ambil data klaim yang baru dibuat
        $created_claims = [
            'recipient' => $claim->Recipient,
            'donation' => $claim->Donation,
        ];

        // Simpan data klaim ke dalam session
        session([
            'claim' => [
                'recipient' => [
                    'name' => $claim->Recipient->name ?? 'Guest',
                    'address' => $claim->Recipient->address ?? 'Jl.Sukabirus',
                ],
                'donation' => [
                    'claim_date' => $claim->claim_date,
                    'booking_code' => $claim->Donation->booking_code ?? 'ABC12345',
                ],
            ],
        ]);
        session()->flash('show_modal', true);
        // Redirect kembali ke halaman klaim makanan
        return redirect()->back()->with('success', 'Klaim berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Claim $claim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Claim $claim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Claim $claim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Claim $claim)
    {
        //
    }
}