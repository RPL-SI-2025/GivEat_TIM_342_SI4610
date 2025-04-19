<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GivEat')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    {{-- 🌐 Navbar --}}
    <nav class="bg-white shadow-md py-3 px-6 mb-6">
        <div class="max-w-5xl mx-auto flex flex-wrap gap-4 items-center justify-between">
            <div class="font-bold text-green-600 text-xl">GivEat</div>
            <div class="flex flex-wrap gap-4 text-sm">
                <a href="{{ url('/') }}" class="hover:text-green-700">🏠 Menu</a>
                <a href="{{ route('partner.index') }}" class="hover:text-green-700">📋 Daftar Mitra</a>
                <a href="{{ route('partner.create') }}" class="hover:text-green-700">➕ Tambah Mitra</a>
                <a href="{{ route('partner.map') }}" class="hover:text-green-700">🗺️ Peta Mitra</a>
                <a href="{{ route('partner.terdekat') }}" class="hover:text-green-700">📍 Terdekat</a>
            </div>
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <div class="max-w-4xl mx-auto px-6 pb-10">
        @yield('content')
    </div>

@stack('scripts')

</body>
</html>
