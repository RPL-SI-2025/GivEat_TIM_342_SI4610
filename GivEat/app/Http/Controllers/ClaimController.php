<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\User;
use App\Models\Donation;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();

        // Buat klaim baru
        $claim = Claim::create([
            'recipient_id' => Recipient::first()->user_id,
            'donation_id' => $input['donation_id'],
            'claim_date' => date('Y-m-d H:i:s')
        ]);

        $donation = Donation::where('id_donation', $input['donation_id'])->first();
        $donation->quantity = $donation->quantity - 1;
        $donation->save();
        
        DB::commit();

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
                    'food_name' => $claim->Donation->food_name ?? 'Makanan',
                    'slug' => $claim->Donation->slug ?? 'default-slug',
                ],
                'donation_id' => $claim->donation_id,
            ],
        ]);
        session()->flash('show_modal', true);
        // Redirect kembali ke halaman klaim makanan
        $slug = $claim->Donation->slug ?? 'default-slug'; 
        return redirect()->route('claim.success', ['slug' => $slug])->with('success', 'Klaim berhasil!');
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

    /**
     * Display the specified resource.
     */
    public function success(Claim $claim)
    {
        return view('claimsuccess');
    }

    /**
     * Display the specified resource.
     */
    public function cancel(Donation $donation)
    {
        DB::beginTransaction();

        try {
            $claim = Claim::where('donation_id', $donation->id_donation)->first();
            
            if (!$claim) {
                return redirect()->back()->with(['error' => 'Klaim tidak ditemukan!']);
            }
            
            $claim->delete();
            
            $donation->quantity = $donation->quantity + 1;
            $donation->save();
            
            DB::commit();

            // Menggunakan flash data 'claimDeleted' untuk penanda bahwa klaim berhasil dihapus
            return redirect()->back()->with(['success' => 'Klaim berhasil dibatalkan!', 'claimDeleted' => true]);
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();

            return redirect()->back()->with(['error' => 'Klaim gagal dibatalkan!']);
        }
    }
}