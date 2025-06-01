<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'GivEat') }} - {{ $title ?? 'Masuk' }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex min-h-screen items-center justify-center bg-white font-[Poppins]">
        <div class="mx-auto flex w-full max-w-6xl overflow-hidden rounded-2xl px-10">
            <!-- Left: Image -->
            <div class="hidden w-1/2 items-center justify-center bg-cover bg-center p-10 md:flex">
                <img src="{{ asset('images/Banner Auth.png') }}" alt="GivEat" class="mx-auto mb-4">
            </div>

            <!-- Right: Content -->
            <div class="w-full p-10 md:w-1/2">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
