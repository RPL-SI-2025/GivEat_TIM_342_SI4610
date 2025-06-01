<x-app-layout>
    <x-slot name="title">
        {{ $berita->judul }}
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 py-8">

        {{-- Judul di bagian atas halaman --}}
        <div class="mb-4">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">{{ $berita->judul }}</h1>

            <p class="text-sm text-gray-500 mt-1">
                Dipublikasikan {{ $berita->created_at->translatedFormat('d F Y') }}
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            {{-- Gambar Berita --}}
            <div class="w-full max-h-[280px] overflow-hidden rounded-t-xl">
                <img src="{{ asset('images/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                     class="w-full h-[280px] object-cover object-center transition-transform duration-500 hover:scale-105">
            </div>

            {{-- Konten --}}
            <div class="p-6">
                <div class="prose max-w-full text-gray-700 leading-relaxed">
                    {!! nl2br(e($berita->isi)) !!}
                </div>
            </div>
        </div>

        {{-- Rekomendasi Berita Lainnya --}}
        @if ($rekomendasiBerita->count() > 0)
            <div class="mt-12">
                <h2 class="text-xl font-bold text-gray-800 mb-4">PILIHAN UNTUKMU</h2>
                <div id="rekomendasi-scroll" class="flex gap-4 overflow-x-auto pb-4 scroll-smooth">
                    @foreach ($rekomendasiBerita as $item)
                        <a href="{{ route('berita.show', $item->id) }}"
                           class="min-w-[250px] flex-shrink-0 bg-white rounded-lg shadow hover:shadow-lg transition duration-300">
                            <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->judul }} "
                                 class="w-full h-40 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="font-semibold text-sm text-gray-800">{{ Str::limit($item->judul, 60) }}</h3>
                                <p class="text-xs text-gray-500 mt-1">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    {{-- Scroll horizontal dengan mouse hanya pada rekomendasi --}}
    <script>
        const scrollContainer = document.getElementById('rekomendasi-scroll');
        scrollContainer.addEventListener('wheel', function(e) {
            if (e.deltaY !== 0) {
                e.preventDefault();
                scrollContainer.scrollLeft += e.deltaY;
            }
        });
    </script>
</x-app-layout>
