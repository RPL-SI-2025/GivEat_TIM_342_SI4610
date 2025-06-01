<x-app-layout>
    <x-slot name="title">Detail Topik: {{ $topic->title }}</x-slot>

    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Topik Utama -->
        <div class="bg-white shadow-lg rounded-xl p-6 mb-8 border border-gray-100">
            <div class="flex justify-between items-start mb-2">
                <h2 class="text-2xl font-bold text-gray-800">{{ $topic->title }}</h2>
                <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded-full">
                    {{ $topic->created_at->diffForHumans() }}
                </span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-4 space-x-2">
                <span class="font-medium text-gray-700">{{ $topic->user->name }}</span>
                <span>•</span>
                <span>{{ $topic->created_at->format('d M Y, H:i') }}</span>
            </div>
            <div class="prose max-w-none text-gray-700">
                {!! nl2br(e($topic->content)) !!}
            </div>
        </div>

        <!-- Section Komentar -->
        <div class="bg-white shadow rounded-xl p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Komentar ({{ $topic->comments->count() }})</h3>
            </div>

            @forelse($topic->comments as $comment)
                <div class="bg-gray-50 rounded-lg p-4 mb-4 transition hover:bg-gray-100">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="font-medium text-gray-700 text-sm">{{ $comment->user->name }}</span>
                                <span class="text-gray-400 text-xs">•</span>
                                <span class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-700 text-sm">{{ $comment->komentar }}</p>
                        </div>
                        <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Hapus komentar ini?')"
                        dusk="delete-comment-{{ $comment->id }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <p class="mt-2 text-gray-500">Belum ada komentar</p>
                </div>
            @endforelse

            <div class="mt-6">
                <a href="{{ route('admin.forum.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Kembali ke daftar topik
                </a>
            </div>
        </div>
    </div>
</x-app-layout>