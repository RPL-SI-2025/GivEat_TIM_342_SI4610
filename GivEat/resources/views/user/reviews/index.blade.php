<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold mb-2">Ulasan Makanan</h1>
        <form action="{{ route('reviews.index') }}" method="GET" class="flex items-center space-x-2">
            <input type="text" name="search" placeholder="Telusuri Ulasan..." class="border rounded-lg px-3 py-2 focus:outline-none" style="font-family: 'Poppins', sans-serif;">
            <button type="submit" class="text-gray-600" style="font-family: 'Poppins', sans-serif;">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-gray-600 mb-8 px-4" style="font-family: 'Poppins', sans-serif;">Temukan pengalaman kuliner luar biasa yang dibagikan oleh komunitas kami.</p>
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- Container Atas: Tombol Create dan Search --}}
                <div class="flex justify-between items-center mb-8" style="font-family: 'Poppins', sans-serif;">
                    {{-- Tombol Create --}}
                    <a href="{{ route('reviews.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        + Buat Ulasan
                    </a>
    
                    {{-- Form Search --}}
                    <form action="{{ route('reviews.index') }}" method="GET" class="flex items-center space-x-2">
                        <input type="text" name="search" placeholder="Telusuri Ulasan..." class="border rounded-lg px-3 py-2 focus:outline-none" style="font-family: 'Poppins', sans-serif;">
                        <button type="submit" class="text-gray-600" style="font-family: 'Poppins', sans-serif;">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($reviews as $review)
                    <div class="border rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300" style="font-family: 'Poppins', sans-serif;">
                        @if ($review->foto_makanan)
                            <img src="{{ asset('storage/' . $review->foto_makanan) }}" alt="{{ $review->nama_hidangan }}" class="w-full h-48 object-cover rounded">
                        @endif
                        <div class="p-4">
                            {{-- Rating --}}
                            <div class="flex items-center mb-2 justify-end" style="font-family: 'Poppins', sans-serif;">
                                @for ($i = 0; $i < $review->penilaian; $i++)
                                    <span class="text-yellow-400 text-lg">★</span>
                                @endfor
                                <a href="{{ route('reviews.edit', $review->id) }}" class="ml-5 text-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z"></path>
                                    </svg>
                                </a>
                                <button onclick="openDeleteModal('{{ route('reviews.destroy', $review->id) }}')" class="text-red-500 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Modal Hapus -->
                            <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
                                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                                    <h2 class="text-xl font-bold mb-4">Konfirmasi Hapus</h2>
                                    <p class="mb-6 text-gray-600">Apakah kamu yakin ingin menghapus ulasan ini?</p>

                                    <div class="flex justify-end space-x-3">
                                        <button onclick="closeModal()" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                                        <form id="deleteForm" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <h2 class="text-xl font-semibold" style="font-family: 'Poppins', sans-serif;">{{ $review->nama_hidangan }}</h2>
                            <p class="text-gray-500" style="font-family: 'Poppins', sans-serif;">{{ $review->nama_restoran }}</p>

                            <p class="mt-2 text-gray-700" style="font-family: 'Poppins', sans-serif;">{{ Str::limit($review->deskripsi_ulasan, 50) }}</p>

                            <div class="mt-2 inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full" style="font-family: 'Poppins', sans-serif;">
                                {{ $review->tag }}
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="px-4" style="font-family: 'Poppins', sans-serif;">Tidak ada ulasan ditemukan.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(action) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = action;
            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>

