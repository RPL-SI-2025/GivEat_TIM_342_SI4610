@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4">
    <a href="{{ route('reviews.index') }}" class="text-green-600 hover:underline mb-4 inline-block">
        ← Kembali ke Daftar Ulasan
    </a>

    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">
        @if($review->image)
        <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->food_name }}" class="w-full h-64 object-cover">
        @endif

        <div class="p-6">
            {{-- Rating --}}
            <div class="flex items-center mb-2">
                @for ($i = 0; $i < $review->rating; $i++)
                    <span class="text-yellow-400 text-xl">★</span>
                @endfor
            </div>

            <h1 class="text-3xl font-bold">{{ $review->food_name }}</h1>
            <p class="text-gray-500 mb-4">{{ $review->restaurant }}</p>

            <p class="text-gray-700 leading-relaxed">{{ $review->review_text }}</p>

            <div class="mt-6 flex items-center justify-between text-sm text-gray-400">
                <span>{{ \Carbon\Carbon::parse($review->review_date)->translatedFormat('d F Y') }}</span>

                <span class="inline-block bg-yellow-100 text-yellow-800 font-semibold px-3 py-1 rounded-full">
                    {{ $review->category }}
                </span>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-8 flex space-x-4">
                <a href="{{ route('reviews.edit', $review) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Edit Ulasan
                </a>

                <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                        Hapus Ulasan
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
