<?php

namespace App\Http\Controllers\User;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        // Menyaring berdasarkan kata kunci pencarian jika ada
        $query = Review::query();

        if ($request->has('search')) {
            $query->where('nama_hidangan', 'like', '%' . $request->search . '%')
                ->orWhere('nama_restoran', 'like', '%' . $request->search . '%');
        }

        // Mengambil semua data review atau data yang disaring berdasarkan search
        $reviews = $query->get();

        return view('user.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('user.reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_restoran' => 'required|string|max:255',
            'nama_hidangan' => 'required|string|max:255',
            'penilaian' => 'required|integer|between:1,5',
            'foto_makanan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_ulasan' => 'required|string',
            'tag' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('foto_makanan')) {
            $file = $request->file('foto_makanan');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('foto_makanan', $filename, 'public');
            $validated['foto_makanan'] = $path; // Simpan path-nya saja
        }

        // Simpan ulasan
        Review::create($validated);

        return redirect()->route('reviews.index')->with('success', 'Ulasan berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('user.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'nama_restoran' => 'required|string|max:255',
            'nama_hidangan' => 'required|string|max:255',
            'penilaian' => 'required|integer|between:1,5',
            'foto_makanan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_ulasan' => 'required|string',
            'tag' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('foto_makanan')) {
            // Hapus foto lama jika ada
            if ($review->foto_makanan && Storage::disk('public')->exists($review->foto_makanan)) {
                Storage::disk('public')->delete($review->foto_makanan);
            }
            // Upload foto baru
            $file = $request->file('foto_makanan');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('foto_makanan', $filename, 'public');
            $validated['foto_makanan'] = $path;
        }

        $review->update($validated);

        return redirect()->route('reviews.index')->with('success', 'Ulasan berhasil diupdate!');
    }
    

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Hapus foto kalau ada
        if ($review->foto_makanan && Storage::disk('public')->exists($review->foto_makanan)) {
            Storage::disk('public')->delete($review->foto_makanan);
        }

        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Ulasan berhasil dihapus!');
    }
}
