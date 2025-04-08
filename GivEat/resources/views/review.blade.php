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
            <h1 class="text-2xl font-bold text-green-700 mb-10">GivEat</h1>
            <nav class="space-y-4">
                <a href="#" class="block text-lg font-medium text-gray-700 hover:text-green-600">Beranda</a>
                <a href="#" class="block text-lg font-medium text-gray-700 hover:text-green-600">Donasi</a>
                <a href="#" class="block text-lg font-medium text-green-600">Review</a>
                <a href="#" class="block text-lg font-medium text-gray-700 hover:text-green-600">Riwayat</a>
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
                    <img src="https://via.placeholder.com/40" alt="profile" class="rounded-full w-10 h-10">
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <p class="text-2xl font-bold">9812</p>
                    <p class="text-sm text-gray-500">Makanan Terdistribusi</p>
                    <p class="text-green-500 text-sm mt-1">↑ 50 kali lebih banyak minggu ini</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <p class="text-2xl font-bold">1000</p>
                    <p class="text-sm text-gray-500">Penerima Makanan</p>
                    <p class="text-green-500 text-sm mt-1">↑ 50 kali lebih banyak minggu ini</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <p class="text-2xl font-bold">4591</p>
                    <p class="text-sm text-gray-500">Kg Makanan Terselamatkan</p>
                    <p class="text-green-500 text-sm mt-1">↑ 50 kali lebih banyak minggu ini</p>
                </div>
            </div>

            <!-- Review Section -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Review Penerima</h3>
                <a href="#" class="text-green-600 text-sm">Lihat Selengkapnya</a>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-10">
                @for($i = 0; $i < 3; $i++)
                <div class="bg-white p-5 rounded-xl shadow-md">
                    <p class="text-4xl text-green-600 leading-none mb-3">“</p>
                    <p class="text-sm mb-4">GivEat membuat berbagi makanan jadi lebih mudah dan bermakna! Saya bisa mendonasikan makanan berlebih hanya dengan beberapa klik, dan saya merasa tenang karena makanan saya sampai ke tangan yang benar-benar membutuhkan</p>
                    <div class="flex items-center mt-4">
                        <img src="https://via.placeholder.com/32" class="rounded-full mr-3" alt="user">
                        <span class="text-sm font-medium">Hailey Williams</span>
                    </div>
                </div>
                @endfor
            </div>

            <!-- Terakhir Dipesan -->
            <h3 class="text-lg font-semibold mb-4">Terakhir Dipesan</h3>
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/300x150" class="w-full h-32 object-cover" alt="Nasi Liwet">
                    <div class="p-4">
                        <h4 class="font-semibold">Nasi Liwet</h4>
                        <p class="text-sm text-gray-600">🍽️ 10 Porsi &nbsp; 👥 5 Penerima</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/300x150" class="w-full h-32 object-cover" alt="Ayam Goreng">
                    <div class="p-4">
                        <h4 class="font-semibold">Ayam Goreng</h4>
                        <p class="text-sm text-gray-600">🍽️ 10 Porsi &nbsp; 👥 8 Penerima</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/300x150" class="w-full h-32 object-cover" alt="Kwetiau Goreng">
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