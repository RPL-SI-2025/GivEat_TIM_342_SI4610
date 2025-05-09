<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page', 1); 
        $beritaTerbaru = null;
        $beritaLainnya = collect(); // default kosong

        if ($page == 1) {
            $beritaTerbaru = Berita::latest()->first();

            if ($beritaTerbaru) {
                $beritaLainnya = Berita::where('id', '!=', $beritaTerbaru->id)
                    ->latest()
                    ->paginate(4);
            } else {
                $beritaLainnya = Berita::latest()->paginate(4);
            }
        } else {
            $beritaLainnya = Berita::latest()->skip(1)->paginate(4);
        }

        return view('user.berita', compact('beritaTerbaru', 'beritaLainnya'));
    }

    public function show(Berita $berita)
    {
        $rekomendasiBerita = Berita::where('id', '!=', $berita->id)
                                ->latest()
                                ->take(10)
                                ->get();

        return view('user.showberita', compact('berita', 'rekomendasiBerita'));
    }

    public function adminIndex()
    {
        $beritas = Berita::latest()->get(); 
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
        ]);

        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);

        Berita::create([
            'judul' => $request->judul,
            'gambar' => $filename, 
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

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
            $oldPath = public_path('images/' . $berita->gambar);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['gambar'] = $filename;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(Berita $berita)
    {
        $filePath = public_path('images/' . $berita->gambar);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
