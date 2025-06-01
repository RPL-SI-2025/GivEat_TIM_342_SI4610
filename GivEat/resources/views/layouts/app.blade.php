<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GivEat') }}</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html, body, * {
            font-family: 'Poppins', Arial, sans-serif !important;
        }
    </style>

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-white d-flex flex-column">
        {{-- Navigation --}}
        @if(Auth::user()->usertype === 'admin')
            @include('layouts.navigation.admin')
        @elseif(Auth::user()->usertype === 'mitra')
            @include('layouts.navigation.mitra')
        @else
            @include('layouts.navigation.user')
        @endif

        {{-- Page Heading --}}
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Page Content --}}
        <main class="flex-grow-1">
            {{ $slot }}
        </main>

        {{-- Footer (Only for regular users) --}}
        @if(Auth::check() && Auth::user()->usertype === 'user')
            <footer class="bg-[#006837] text-white py-4">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-4">
                        <a href="" class="text-white text-decoration-none">
                            <img src="{{ asset('images/logowhite.png') }}" alt="GivEat" class="logo-img" style="height: 45px; width: auto; object-fit: contain;">
                        </a>
                        <div class="d-flex gap-4">
                            <a href="" class="text-white text-decoration-none hover:text-white/80">Privacy Policy</a>
                            <a href="" class="text-white text-decoration-none hover:text-white/80">Hubungi Kami</a>
                        </div>
                    </div>
                    <div class="text-white/80">
                        © {{ date('Y') }} GivEat Food Cycle. All Rights Reserved.
                    </div>
                </div>
            </footer>
        @endif
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        footer a:hover {
            opacity: 0.8;
            transition: opacity 0.2s ease-in-out;
        }
    </style>
    @stack('scripts')
</body>
</html>