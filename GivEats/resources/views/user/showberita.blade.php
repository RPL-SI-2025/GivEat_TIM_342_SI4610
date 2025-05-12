<x-app-layout>
    <x-slot name="title">Detail Topik</x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                <h2 class="text-3xl font-bold text-[#1A1A1A]">{{ $topic->title }}</h2>
                <p class="text-gray-700 mt-2">{{ $topic->content }}</p>
                <div class="text-sm text-gray-500 mt-2">
                    oleh {{ $topic->user->name }} - {{ $topic->created_at->diffForHumans() }}
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-2xl font-semibold text-[#1A1A1A] mb-4">Komentar</h3>
                @foreach ($topic->comments as $comment)
                    <div class="mb-4">
                        <p class="text-gray-800">{{ $comment->content }}</p>
                        <div class="text-sm text-gray-500">
                            oleh {{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h4 class="text-xl font-bold mb-3 text-[#1A1A1A]">Tulis Komentar</h4>
                <form method="POST" action="{{ route('forum.comment', $topic->id) }}">
                    @csrf
                    <textarea name="content" rows="3" class="w-full p-2 border border-gray-300 rounded mb-3" required></textarea>
                    <button type="submit" class="px-4 py-2 bg-[#00843D] text-white rounded">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
