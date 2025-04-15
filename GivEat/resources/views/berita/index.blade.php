
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    {{-- BERITA TERBARU --}}
    @if(request()->page == null || request()->page == 1)
        @if ($beritaTerbaru)
            <div class="mb-12 rounded-xl overflow-hidden shadow-md">
                <div class="relative w-full h-80 overflow-hidden">
                    <img src="{{ asset('images/' . $beritaTerbaru->gambar) }}" alt="{{ $beritaTerbaru->judul }}" class="w-full h-full object-cover">
                    
                    {{-- Overlay dan Teks --}}
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-end p-6">
                        <h2 class="text-white text-2xl md:text-5xl  max-w-lg leading-snug font-Coolvetica">
                            {{ $beritaTerbaru->judul }}
                        </h2>

                        <div class="mt-4">
                            <a href="{{ route('berita.show', $beritaTerbaru->id) }}" class="inline-flex items-center gap-2 bg-white text-green-700 hover:bg-gray-100 font-semibold px-4 py-2 rounded-full transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    {{-- JUDUL --}}
    <h3 class="text-xl font-bold mb-6 text-gray-800">Temukan Informasi Baru</h3>

    {{-- BERITA LAINNYA --}}
    <div class="space-y-5">
        @foreach ($beritaLainnya as $berita)
            <a href="{{ route('berita.show', $berita->id) }}" class="flex flex-col md:flex-row items-start md:items-center gap-4 bg-white hover:bg-gray-50 border border-gray-200 rounded-xl p-4 transition duration-300 ease-in-out shadow-sm hover:shadow-md">
                <div class="flex-1">
                    <h4 class="text-lg font-semibold text-gray-800 mb-1">
                        {{ $berita->judul }}
                    </h4>
                    <p class="text-sm text-gray-600 mb-1">
                        {{ Str::limit($berita->ringkasan, 100) }}
                    </p>
                    <span class="text-xs text-gray-400">
                        {{ $berita->created_at->diffForHumans() }}
                    </span>
                </div>
                <div class="w-28 h-28 rounded-lg overflow-hidden flex-shrink-0">
                    <img src="{{ asset('images/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                </div>
            </a>
        @endforeach
    </div>

    {{-- PAGINATION --}}
    <div class="mt-10 flex justify-center">
        {{ $beritaLainnya->onEachSide(1)->links('pagination::tailwind') }}
    </div>

</div>
@endsection
