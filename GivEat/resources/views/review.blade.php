<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GivEat - Review</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#F6F8F9] text-gray-800">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md px-6 py-8">
            <img src="{{ asset('assets/img/GivEat-Logo.png') }}" alt="GivEat Logo" class="w-42 mb-10">
            <nav class="space-y-4">
                <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100 hover:text-green-600 text-gray-700">
                    <img src="{{ asset('assets/img/Beranda.png') }}" alt="Beranda" class="w-6 h-6">
                    <span class="text-lg font-medium">Beranda</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100 hover:text-green-600 text-gray-700">
                    <img src="{{ asset('assets/img/Donasi.png') }}" alt="Donasi" class="w-6 h-6" fill="black">
                    <span class="text-lg font-medium">Donasi</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100 hover:text-green-600 text-gray-700">
                    <img src="{{ asset('assets/img/Review.png') }}" alt="Review" class="w-6 h-6">
                    <span class="text-lg font-medium">Review</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100 hover:text-green-600 text-gray-700">
                    <img src="{{ asset('assets/img/Riwayat.png') }}" alt="Riwayat" class="w-6 h-6">
                    <span class="text-lg font-medium">Riwayat</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 px-10 py-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-semibold">Review</h2>
                    <p class="text-gray-600">Hai Robert, Lihat ulasan penerima</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="font-semibold">Robert Julian</span>
                    <img src="{{ asset('assets/img/Robert-Julian.png') }}" alt="Profil" class="w-8 h-8 rounded-full">
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-6 mb-8">
            <!-- Card 1: Makanan Terdistribusi -->
            <div class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-3xl font-bold">9812</p>
                    <p class="text-base text-black">Makanan Terdistribusi</p>
                    <p class="text-green-500 text-sm mt-1">↑ 50 kali lebih banyak minggu ini</p>
                </div>
                <div class="bg-gray-100 rounded-full p-4">
                    <img src="{{ asset('assets/img/FamiconsFastFood.png') }}" alt="Profil" class="w-10 h-auto">
                </div>
            </div>

            <!-- Card 2: Penerima Makanan -->
            <div class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-3xl font-bold">1000</p>
                    <p class="text-base text-black">Penerima Makanan</p>
                    <p class="text-green-500 text-sm mt-1">↑ 50 kali lebih banyak minggu ini</p>
                </div>
                <div class="bg-gray-100 rounded-full p-4">
                    <img src="{{ asset('assets/img/People.png') }}" alt="Profil" class="w-10 h-auto">
                </div>
            </div>

            <!-- Card 3: Kg Makanan Terselamatkan -->
            <div class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
                <div>
                    <p class="text-3xl font-bold">4591</p>
                    <p class="text-base text-black">Kg Makanan Terselamatkan</p>
                    <p class="text-green-500 text-sm mt-1">↑ 50 kali lebih banyak minggu ini</p>
                </div>
                <div class="bg-gray-100 rounded-full p-4">
                    <img src="{{ asset('assets/img/FoodTurkey.png') }}" alt="Profil" class="w-10 h-auto">
                </div>
            </div>
        </div>


            <!-- Review Section -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Review Penerima</h3>
                <a href="#" class="text-green-600 text-sm">Lihat Selengkapnya</a>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-10">
                @forelse($reviews as $review)
                    <div class="bg-white p-5 rounded-xl shadow-md">
                        <p class="text-8xl text-green-600 leading-none">“</p>
                        <p class="text-sm mb-4">{{ $review->pesan }}</p>
                        <div class="flex items-center mt-4">
                            @if($review->foto)
                                <img src="{{ asset('storage/' . $review->foto) }}" alt="Profil" class="w-8 h-8 rounded-full">
                            @else
                                <img src="{{ asset('assets/img/default-avatar.png') }}" alt="Default" class="w-8 h-8 rounded-full">
                            @endif
                            <span class="text-sm font-medium ml-2">{{ $review->nama }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 col-span-3">Belum ada review.</p>
                @endforelse
            </div>


            <!-- Terakhir Dipesan -->
            <h3 class="text-lg font-semibold mb-4">Terakhir Dipesan</h3>
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('assets/img/Nasi-Liwet-Sunda.jpg') }}" class="w-full h-32 object-cover" alt="Nasi Liwet">
                    <div class="p-4">
                        <h4 class="font-semibold">Nasi Liwet</h4>
                        <p class="text-sm text-gray-600">🍽️ 10 Porsi &nbsp; 👥 5 Penerima</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('assets/img/Ayam-Goreng.jpg') }}" class="w-full h-32 object-cover" alt="Ayam Goreng">
                    <div class="p-4">
                        <h4 class="font-semibold">Ayam Goreng</h4>
                        <p class="text-sm text-gray-600">🍽️ 10 Porsi &nbsp; 👥 8 Penerima</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('assets/img/Kwetiau-Goreng.jpg') }}" class="w-full h-32 object-cover" alt="Kwetiau Goreng">
                    <div class="p-4">
                        <h4 class="font-semibold">Kwetiau Goreng</h4>
                        <p class="text-sm text-gray-600">🍽️ 10 Porsi &nbsp; 👥 4 Penerima</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>