<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PartnerRestaurant;

class MitraController extends Controller
{
    public function semua()
    {
        try {
            $data = \App\Models\PartnerRestaurant::all();
    
            if ($data->isEmpty()) {
                return response()->json(['message' => 'Tidak ada data mitra'], 200);
            }
    
            return response()->json($data);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
