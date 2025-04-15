@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow rounded border border-gray-200">
        <div class="bg-green-700 text-white text-lg font-semibold px-6 py-3 rounded-t">
            {{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }}
        </div>
        <form action="{{ isset($berita) ? route('admin.berita.update', $berita->id) : route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            @if(isset($berita))
                @method('PUT')
            @endif

            {{-- Judul --}}
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul"
                       value="{{ old('judul', $berita->judul ?? '') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>

            {{-- Gambar --}}
            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar"
                       class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                       file:rounded-md file:border-0 file:text-sm file:font-semibold
                       file:bg-green-600 file:text-white hover:file:bg-green-700" />
                @if(isset($berita) && $berita->gambar)
                    <img src="{{ asset('images/' . $berita->gambar) }}" alt="Preview" class="mt-2 w-40 h-28 object-cover rounded">
                @endif
            </div>

            {{-- Ringkasan --}}
            <div>
                <label for="ringkasan" class="block text-sm font-medium text-gray-700">Ringkasan</label>
                <textarea name="ringkasan" id="ringkasan" rows="3"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-justify resize-y min-h-[200px] focus:ring-green-500 focus:border-green-500">{{ old('ringkasan', $berita->ringkasan ?? '') }}</textarea>
            </div>

            {{-- Isi --}}
            <div>
                <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
                <textarea name="isi" id="isi" rows="30"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-justify resize-y min-h-[200px] focus:ring-green-500 focus:border-green-500">{{ old('isi', $berita->isi ?? '') }}</textarea>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.berita.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                    {{ isset($berita) ? 'Update' : 'Tambah' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
