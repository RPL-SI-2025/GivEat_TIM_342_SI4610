@extends('layouts.app')

@section('title', 'Daftar Mitra Restoran')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-center">📋 Daftar Mitra Restoran</h1>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 p-3 rounded text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- 🔍 Filter Pencarian --}}
    <div class="mb-6">
        <input type="text" id="searchInput" placeholder="Cari mitra berdasarkan nama..." class="w-full p-2 border rounded" onkeyup="filterMitra()">
    </div>

    {{-- 🔄 List Mitra --}}
    <div id="mitraList" class="grid md:grid-cols-3 gap-6">
        @forelse($mitras as $mitra)
            <div class="bg-white rounded shadow p-4 mitra-item">
                @if($mitra->image)
                    <img src="{{ asset('storage/' . $mitra->image) }}" class="w-full h-40 object-cover rounded mb-4" alt="{{ $mitra->name }}">
                @else
                    <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500 mb-4">
                        Tidak ada gambar
                    </div>
                @endif

                <h2 class="text-xl font-semibold mitra-name">{{ $mitra->name }}</h2>
                <p class="text-gray-600 text-sm">{{ $mitra->address }}</p>
                <p class="text-sm mt-1">🕒 {{ $mitra->operational_hours ?? 'Jam tidak tersedia' }}</p>

                {{-- ⭐ Average Rating --}}
                @php $avg = round($mitra->averageRating(), 1); @endphp
                @if($avg)
                    <p class="mt-2 text-yellow-500 text-sm">
                        {{ str_repeat('⭐', floor($avg)) }} <span class="text-gray-700">({{ $avg }})</span>
                    </p>
                @else
                    <p class="text-sm text-gray-400 italic">Belum ada rating</p>
                @endif

                {{-- ✍️ Form Review --}}
                <form action="{{ route('partner.review', $mitra->id) }}" method="POST" class="mt-4">
                    @csrf
                    <select name="rating" class="border rounded p-1 w-full mb-2 text-sm">
                        <option value="">Pilih rating...</option>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} ⭐</option>
                        @endfor
                    </select>
                    <textarea name="comment" class="border rounded p-1 w-full text-sm" placeholder="Komentar (opsional)"></textarea>
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 mt-1 rounded text-sm hover:bg-blue-600 w-full">
                        Kirim Ulasan
                    </button>
                </form>

                {{-- 💬 Daftar Review --}}
                @if($mitra->reviews->count())
                    <div class="mt-3">
                        <p class="text-sm font-medium">Ulasan:</p>
                        @foreach($mitra->reviews->take(2) as $review)
                            <div class="text-xs text-gray-700 mb-1 bg-gray-100 rounded p-2">
                                ⭐ {{ $review->rating }} <br>
                                {{ $review->comment ?? '-' }}
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- ✏️ Edit & Delete --}}
                <div class="mt-4 flex gap-4">
                    <a href="{{ route('partner.edit', $mitra->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                    <form action="{{ route('partner.destroy', $mitra->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus mitra ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline text-sm">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">Belum ada mitra yang ditambahkan.</p>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
    function filterMitra() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const items = document.querySelectorAll('.mitra-item');
        items.forEach(item => {
            const name = item.querySelector('.mitra-name').textContent.toLowerCase();
            item.style.display = name.includes(input) ? '' : 'none';
        });
    }
</script>
@endpush
