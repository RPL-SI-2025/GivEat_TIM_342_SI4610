@extends('layouts.app')

@section('title', 'Berita Lingkungan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Berita Lingkungan</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($beritas as $berita)
            <div class="bg-white rounded shadow hover:shadow-lg transition">
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full h-48 object-cover rounded-t">
                <div class="p-4">
                    <h2 class="font-semibold text-lg mb-2">{{ $berita->judul }}</h2>
                    <p class="text-sm text-gray-700 mb-3">{{ Str::limit($berita->ringkasan, 100) }}</p>
                    <a href="{{ route('berita.show', $berita->id) }}" class="text-green-600 hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $beritas->links() }}
    </div>
@endsection
