<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PartnerRestaurant;
use App\Models\Review;
use Illuminate\Http\Request;

class PartnerRestaurantController extends Controller
{
    public function create()
    {
        return view('partner.create');
    }

    public function index()
    {
        $mitras = PartnerRestaurant::latest()->get();
        return view('partner.index', compact('mitras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'operational_hours' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('mitra', 'public');
        }

        PartnerRestaurant::create([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'operational_hours' => $request->operational_hours,
            'image' => $path,
        ]);

        return redirect()->back()->with('success', 'Mitra berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mitra = PartnerRestaurant::findOrFail($id);
        return view('partner.edit', compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'operational_hours' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $mitra = PartnerRestaurant::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('mitra', 'public');
            $mitra->image = $path;
        }

        $mitra->update([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'operational_hours' => $request->operational_hours,
            'image' => $mitra->image,
        ]);

        return redirect()->route('partner.index')->with('success', 'Mitra berhasil diperbarui!');
    }

    public function destroy($id)
    {
        PartnerRestaurant::findOrFail($id)->delete();
        return redirect()->route('partner.index')->with('success', 'Mitra berhasil dihapus!');
    }

    public function map()
    {
        $mitras = PartnerRestaurant::all();
        return view('partner.map', compact('mitras'));
    }

    public function terdekat()
    {
        $mitras = PartnerRestaurant::all();
        return view('partner.terdekat', compact('mitras'));
    }

    public function submitReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Review::create([
            'partner_restaurant_id' => $id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas ulasannya!');
    }
}
