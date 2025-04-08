<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index() {
        $beritas = Berita::latest()->paginate(5);
        return view('berita.index', compact('beritas'));
    }

    public function show($id) {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    public function adminIndex() {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create() {
        return view('admin.berita.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'ringkasan' => 'required',
            'isi' => 'required'
        ]);

        $gambar = $request->file('gambar')->store('berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'gambar' => $gambar,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id) {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id) {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'isi' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($berita->gambar);
            $gambar = $request->file('gambar')->store('berita', 'public');
        } else {
            $gambar = $berita->gambar;
        }

        $berita->update([
            'judul' => $request->judul,
            'gambar' => $gambar,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id) {
        $berita = Berita::findOrFail($id);
        Storage::disk('public')->delete($berita->gambar);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }

}
