<x-app-layout>
    <x-slot name="title">Edit Topik</x-slot>

    <div class="max-w-3xl mx-auto py-12 px-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Topik</h2>

        <form action="{{ route('forum.update', $topic->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block mb-1 font-medium text-gray-700">Judul Topik</label>
                <input type="text" name="title" value="{{ old('title', $topic->title) }}" class="w-full border rounded-lg px-4 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium text-gray-700">Isi Topik</label>
                <textarea name="content" rows="6" class="w-full border rounded-lg px-4 py-2" required>{{ old('content', $topic->content) }}</textarea>
            </div>

            <button type="submit" class="bg-[#00843D] text-white px-4 py-2 rounded-lg font-semibold">Simpan Perubahan</button>
        </form>
    </div>
</x-app-layout>
