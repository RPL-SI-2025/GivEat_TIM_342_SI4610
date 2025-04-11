@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-2">{{ $berita->judul }}</h1>
        <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full rounded mb-4">
        <p class="text-gray-800 mb-4">{{ $berita->ringkasan }}</p>
        <div class="text-gray-900 leading-relaxed">{!! nl2br(e($berita->isi)) !!}</div>
    </div>
@endsection
