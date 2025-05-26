<x-app-layout>
    <x-slot name="title">Edit Topik</x-slot>

    <div class="max-w-3xl mx-auto py-12 px-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Topik</h2>

        <form action="{{ route('forum.update', $topic->id) }}" method="POST">
            @csrf 
            @method('PUT')
            
            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">Judul Topik</label>
                <input type="text" name="title" value="{{ old('title', $topic->title) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#00843D]" required>
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">Isi Topik</label>
                <textarea name="content" rows="6" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#00843D]" required>{{ old('content', $topic->content) }}</textarea>
            </div>

            <div class="flex justify-end space-x-4">
                <!-- Tombol Batal -->
                <a href="{{ route('forum.show', $topic->id) }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-semibold hover:bg-gray-400 transition duration-300">Batal</a>
                
                <!-- Tombol Simpan -->
                <button type="submit" class="bg-[#00843D] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#006f2c] transition duration-300">Simpan Perubahan</button>
                
                
            </div>
        </form>
    </div>
</x-app-layout>
