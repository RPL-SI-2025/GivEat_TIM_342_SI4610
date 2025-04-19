<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DonationController extends Controller
{
    // Menampilkan semua donasi di halaman web
    public function index()
    {
        $donations = Donation::with(['partner', 'category'])->get();
        return view('donations.index', compact('donations'));
    }

    // Menampilkan form tambah donasi
    public function create()
    {
        $categories = Category::all();
        return view('donations.create', compact('categories'));
    }

    // Menampilkan detail donasi
    public function show($id)
    {
        $donation = Donation::with(['partner', 'category'])->findOrFail($id);
        return view('donations.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified donation.
     */
    public function edit($id)
    {
        $donation = Donation::findOrFail($id);

        // Prevent editing claimed donations
        if ($donation->status !== 'available') {
            return redirect()->route('donations.index')
                ->with('error', 'Donasi yang sudah diklaim tidak dapat diubah');
        }

        $categories = Category::all();
        return view('donations.edit', compact('donation', 'categories'));
    }

    /**
     * Update the specified donation in storage.
     */
    public function update(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);

        // Prevent updating claimed donations
        if ($donation->status !== 'available') {
            return redirect()->route('donations.index')
                ->with('error', 'Donasi yang sudah diklaim tidak dapat diubah');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'pickup_time' => 'required|date',
            'portion' => 'nullable|integer|min:1',
            'location' => 'required|string',
            'image' => 'nullable|image|max:5120', // 5MB Optional during edit
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($donation->image) {
                Storage::disk('public')->delete($donation->image);
            }
            $imagePath = $request->file('image')->store('donation_images', 'public');
            $validated['image'] = $imagePath;
        }

        $donation->update($validated);

        return redirect()->route('donations.index')
            ->with('success', 'Donasi berhasil diperbarui!');
    }

    /**
     * Remove the specified donation from storage.
     */
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);

        // Check if donation is claimed
        if ($donation->status !== 'available') {
            return redirect()->route('donations.index')
                ->with('error', 'Donasi tidak bisa dihapus karena sudah diklaim oleh relawan/penerima');
        }

        // Delete the image if exists
        if ($donation->image) {
            Storage::disk('public')->delete($donation->image);
        }

        $donation->delete();

        return redirect()->route('donations.index')
            ->with('success', 'Donasi berhasil dihapus!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'pickup_time' => 'required|date',
            'portion' => 'nullable|integer|min:1',
            'location' => 'required|string',
            'image' => 'required|image|max:5120', // 5MB
        ]);

        // Upload gambar kalau ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('donation_images', 'public');
            $validated['image'] = $imagePath;
        }

        // Default partner id dan status
        $validated['partner_id'] = 1;
        $validated['status'] = 'available';

        // Create the donation
        $donation = Donation::create($validated);

        // Redirect to index with success message
        return redirect()->route('donations.index')
            ->with('success', 'Donasi berhasil ditambahkan!');
    }
}
