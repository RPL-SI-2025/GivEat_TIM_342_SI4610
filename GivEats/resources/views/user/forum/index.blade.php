<x-app-layout>
    <x-slot name="title">Forum Diskusi</x-slot>

    <div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Banner with Heading -->
        <div class="mb-8 text-center">
            <img src="{{ asset('images/forum-banner.jpg') }}" alt="Banner Forum" class="rounded-lg w-full object-cover h-48">
        </div>

        <!-- Categories -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Topik Menarik</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
                @foreach(['Q & A', 'Food Sharing', 'Food Waste', 'Lifestyle', 'Event', 'Recipe'] as $category)
                    <div class="bg-white rounded-lg shadow p-3 text-center hover:shadow-md transition-shadow cursor-pointer">
                        <img src="{{ asset('icons/' . Str::slug($category) . '.png') }}" alt="{{ $category }}" class="h-12 mx-auto mb-2">
                        <span class="text-sm font-medium text-gray-700">{{ $category }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Search and Create Post -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <!-- Search Field -->
                <div class="mb-4">
                    <input 
                        type="text" 
                        id="search" 
                        name="search" 
                        placeholder="Mau Cari Topik Apa?" 
                        class="w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#00843D] focus:border-transparent"
                    >
                </div>
            </div>
        </div>

        <div class="mb-2">
            <div>
                <a href="{{ route('forum.create') }}" class="inline-block bg-[#00843D] hover:bg-[#006F33] text-white text-sm font-semibold py-2 px-6 rounded-full transition-colors duration-200">
                    Buat Postingan
                </a>
            </div>
        </div>

        <!-- Posts Section -->
        <div class="mb-8">
            
            <div class="space-y-4">
                @forelse ($topics as $topic)
                    <div class="bg-white rounded-xl shadow px-6 py-4 hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-semibold">
                                    {{ substr($topic->user->name, 0, 1) }}
                                </div>
                            </div>
                            <div class="flex-grow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <span class="font-semibold text-gray-800">{{ $topic->user->name }}</span>
                                        <span class="text-xs text-gray-500 ml-2">{{ $topic->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <a href="{{ route('forum.show', $topic->id) }}" class="text-gray-800 hover:text-[#00843D]">
                                        {{ $topic->title }}
                                    </a>
                                </div>
                                <div class="mt-2 text-gray-600 text-sm">{{ Str::limit($topic->content, 200) }}</div>
                                <div class="mt-3 flex items-center space-x-5 text-sm text-gray-500">
                                    <form action="{{ route('forum.like', $topic->id) }}" method="POST" class="like-form flex items-center">
                                        @csrf
                                        <button type="submit" class="flex items-center focus:outline-none like-button" data-topic-id="{{ $topic->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $topic->isLikedBy(auth()->user()) ? 'text-red-500 fill-current' : 'text-gray-400' }}" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-1 like-count">{{ $topic->likes_count }}</span>
                                        </button>
                                    </form>
                                    <span class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        <span class="ml-1">{{ $topic->comments_count }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-lg shadow p-8 text-center">
                        <p class="text-gray-500">Belum ada topik diskusi.</p>
                        <a href="{{ route('forum.create') }}" class="mt-4 inline-block bg-[#00843D] hover:bg-[#006F33] text-white px-6 py-3 rounded-full font-semibold transition-colors">Buat Postingan Pertama</a>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if($topics->hasPages())
            <div class="mt-6 bg-white rounded-lg shadow p-4">
                {{ $topics->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
