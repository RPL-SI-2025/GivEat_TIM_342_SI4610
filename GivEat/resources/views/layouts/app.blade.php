<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GivEat')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">

    @include('partials.navbar')

    <div class="max-w-7xl mx-auto mt-6 px-4">
        {{-- Notifikasi flash message --}}
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
                {{ session('error') }}
            </div>
        @endif

        {{-- Konten utama --}}
        <main>
            @yield('content')
        </main>
    </div>

    <footer class="bg-green-700 text-white mt-10 py-4 text-center">
        &copy; {{ date('Y') }} GivEat • Bersama Kurangi Limbah Makanan 🌍
    </footer>

</body>
</html>
