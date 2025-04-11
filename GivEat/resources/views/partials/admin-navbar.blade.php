<nav class="bg-gray-800 text-white px-4 py-3">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('admin.berita.index') }}" class="font-bold text-lg">Admin Panel</a>
        <ul class="flex space-x-4">
            <li><a href="{{ route('admin.berita.create') }}">Tambah Berita</a></li>
            <!-- Tambahkan lainnya jika ada -->
        </ul>
    </div>
</nav>
