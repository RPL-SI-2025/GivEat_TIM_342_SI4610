@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-2">{{ $berita->judul }}</h1>
        <img src="{{ asset('images/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-96 object-cover">
        <div class="text-gray-900 leading-relaxed">{!! nl2br(e($berita->isi)) !!}</div>
    </div>
@endsection
