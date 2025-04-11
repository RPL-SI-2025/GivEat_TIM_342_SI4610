@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <h1 class="text-xl font-bold mb-4">Edit Berita</h1>

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf @method('PUT')
        <div>
            <label class="block font-semibold">Judul</label>
            <input type="text" name="judul" value="{{ $berita->judul }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-semibold">Gambar</label>
            <input type="file" name="gambar" class="w-full border rounded px-3 py-2">
            <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-32 mt-2">
        </div>
        <div>
            <label class="block font-semibold">Ringkasan</label>
            <textarea name="ringkasan" class="w-full border rounded px-3 py-2" required>{{ $berita->ringkasan }}</textarea>
        </div>
        <div>
            <label class="block font-semibold">Isi Berita</label>
            <textarea name="isi" class="w-full border rounded px-3 py-2" rows="6" required>{{ $berita->isi }}</textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
    </form>
@endsection
