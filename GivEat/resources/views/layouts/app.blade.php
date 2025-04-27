<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GivEat</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col" style="font-family: 'Poppins', sans-serif;">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center text-green-600 font-bold text-xl" style="font-family: 'Poppins', sans-serif;">
                        <img src="{{ asset('assets/img/GivEat-Logo.png') }}" alt="GivEat Logo" class="h-8 mr-10">
                    </a>
                    <div class="ml-10 flex space-x-8">
                        <a href="#" class="text-green-600 font-semibold hover:text-green-700" style="font-family: 'Poppins', sans-serif;">Beranda</a>
                        <a href="#" class="text-gray-600 hover:text-green-600" style="font-family: 'Poppins', sans-serif;">Forum</a>
                        <a href="#" class="text-gray-600 hover:text-green-600" style="font-family: 'Poppins', sans-serif;">Berita</a>
                        <a href="#" class="text-gray-600 hover:text-green-600" style="font-family: 'Poppins', sans-serif;">Persebaran</a>
                        <a href="#" class="text-gray-600 hover:text-green-600" style="font-family: 'Poppins', sans-serif;">FAQ</a>
                    </div>
                </div>

                <div class="flex items-center">
                    <span class="mr-4 text-gray-700 font-medium" style="font-family: 'Poppins', sans-serif;">Hailey Williams</span>
                    <img src="{{ asset('assets/img/Hailey-Williams.jpg') }}" class="w-10 h-10 rounded-full alt="Profile">
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-1 py-5 px-4" style="font-family: 'Poppins', sans-serif;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-green-700 text-white text-sm py-4" style="font-family: 'Poppins', sans-serif;">
        <div class="max-w-7xl mx-auto px-4 flex justify-between">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('assets/img/GivEat2.png') }}" alt="GivEat Logo" class="h-6">
            </div>
            <div class="space-x-6">
                <a href="#" class="hover:underline" style="font-family: 'Poppins', sans-serif;">Privacy Policy</a>
                <a href="#" class="hover:underline" style="font-family: 'Poppins', sans-serif;">Hubungi Kami</a>
            </div>
            <div class="text-right" style="font-family: 'Poppins', sans-serif;">
                <p> 2025 GiveEat Food Cycle. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>

