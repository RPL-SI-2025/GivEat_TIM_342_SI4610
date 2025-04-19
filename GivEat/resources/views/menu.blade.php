<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Utama | GivEat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-10 rounded shadow max-w-md w-full text-center space-y-6">
        <h1 class="text-3xl font-bold text-green-700">Menu Utama GivEat</h1>

        <div class="flex flex-col space-y-4">
            <a href="{{ route('partner.index') }}" class="bg-green-600 text-white py-2 rounded hover:bg-green-700">
                📋 Lihat Daftar Mitra
            </a>
            <a href="{{ route('partner.create') }}" class="bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                ➕ Tambah Mitra Baru
            </a>
            <a href="{{ route('partner.map') }}" class="bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                🗺️ Lihat Peta Mitra
            </a>
            <a href="{{ route('partner.terdekat') }}" class="bg-pink-600 text-white py-2 rounded hover:bg-pink-700">
                📍 Cari Mitra Terdekat
            </a>
        </div>
    </div>

</body>
</html>
