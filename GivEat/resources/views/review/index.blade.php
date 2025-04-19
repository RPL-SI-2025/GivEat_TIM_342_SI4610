@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Review Makanan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($reviews as $review)
            <div class="bg-white shadow-md rounded-2xl p-6">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-lg font-semibold text-gray-700 truncate">
                        {{ $review->food->name ?? 'Makanan Tidak Diketahui' }}
                    </h2>
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                            @else
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
                            @endif
                        @endfor
                    </div>
                </div>

                <p class="text-gray-600 text-sm mb-4">"{{ $review->comment }}"</p>

                <p class="text-sm text-gray-500">
                    Oleh: <span class="font-medium text-gray-700">{{ $review->user->name ?? 'Anonim' }}</span>
                </p>
            </div>
        @endforeach
    </div>

    @if ($reviews->isEmpty())
        <div class="text-center text-gray-500 mt-10">
            Belum ada review yang tersedia.
        </div>
    @endif
</div>
@endsection
