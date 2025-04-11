<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Publik - Tampilkan daftar berita
    public function index()
    {
        $beritas = Berita::latest()->paginate(6); // ubah ke bentuk jamak
        return view('berita.index', compact('beritas'));
    }

    // Publik - Tampilkan detail berita
    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    // Admin - Tampilkan daftar berita
    public function adminIndex()
    {
        $beritas = Berita::latest()->get(); // ubah ke bentuk jamak
        return view('admin.berita.index', compact('beritas'));
    }

    // Admin - Form tambah berita
    public function create()
    {
        return view('admin.berita.create');
    }

    // Admin - Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
        ]);

        $path = $request->file('gambar')->store('berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'gambar' => $path,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    // Admin - Form edit berita
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    // Admin - Simpan perubahan berita
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
        ]);

        $data = $request->only(['judul', 'ringkasan', 'isi']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    // Admin - Hapus berita
    public function destroy(Berita $berita)
    {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
