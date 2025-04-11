@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
    <h1 class="text-xl font-bold mb-4">Tambah Berita</h1>

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        <div>
            <label class="block font-semibold">Judul</label>
            <input type="text" name="judul" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-semibold">Gambar</label>
            <input type="file" name="gambar" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-semibold">Ringkasan</label>
            <textarea name="ringkasan" class="w-full border rounded px-3 py-2" required></textarea>
        </div>
        <div>
            <label class="block font-semibold">Isi Berita</label>
            <textarea name="isi" class="w-full border rounded px-3 py-2" rows="6" required></textarea>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Publikasikan</button>
    </form>
@endsection
