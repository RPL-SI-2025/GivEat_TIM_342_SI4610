<nav class="bg-green-700 text-white shadow-md sticky top-0 z-50 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}" class="text-2xl font-bold tracking-wide hover:text-green-200 transition">
                    GivEat 🌱
                </a>
                <a href="{{ route('berita.index') }}" class="hover:text-green-200 transition">
                    Berita Lingkungan
                </a>
            </div>
            <div>
                <!-- Tambahkan auth logic jika ada -->
                <a href="#" class="bg-white text-green-700 px-3 py-1 rounded-lg hover:bg-green-100 transition">
                    Login
                </a>
            </div>
        </div>
    </div>
</nav>
