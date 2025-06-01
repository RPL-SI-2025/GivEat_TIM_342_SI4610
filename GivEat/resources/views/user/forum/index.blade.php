<x-app-layout>
    <x-slot name="title">Forum Diskusi</x-slot>

    <div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Notifikasi sukses -->
        @if (session('success'))
            <div id="flash-message" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Banner with Heading -->
        <div class="mb-8 text-center">
            <img src="{{ asset('images/forum-banner.jpg') }}" alt="Banner Forum" class="rounded-lg w-full object-cover h-48">
        </div>

        <!-- Categories -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Topik Menarik</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-3">
                @foreach(['Q & A', 'Food Sharing', 'Food Waste', 'Lifestyle', 'Event', 'Recipe'] as $category)
                    <div class="bg-white rounded-lg shadow p-3 text-center hover:shadow-md transition-shadow cursor-pointer category-item" data-category="{{ $category }}">
                        <img src="{{ asset('icons/' . Str::slug($category) . '.png') }}" alt="{{ $category }}" class="h-12 mx-auto mb-2">
                        <span class="text-sm font-medium text-gray-700">{{ $category }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Search and Create Post -->
        <div class="mb-6">
            <div class="bg-white rounded-lg shadow p-4">
                <!-- Search Field -->
                <form action="{{ route('forum.index') }}" method="GET" id="searchForm">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            id="search" 
                            name="search" 
                            value="{{ old('search', $search) }}"
                            placeholder="Mau Cari Topik Apa?" 
                            class="w-full border border-gray-300 rounded-full py-2 px-10 focus:outline-none focus:ring-2 focus:ring-[#00843D] focus:border-transparent"
                        >
                        @if(old('search', $search))
                            <button 
                                type="button" 
                                id="clearSearch" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center focus:outline-none"
                            >
                                <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Buat Postingan -->
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
                                        {{ $topic->title }}
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
                                    <a href="{{ route('forum.show', $topic->id) }}" class="text-gray-800 hover:text-[#00843D]">
                                    <span class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                        <span class="ml-1">{{ $topic->comments_count }}</span>
                                    </span>
                                    </a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryItems = document.querySelectorAll('.category-item');
            const searchForm = document.getElementById('searchForm');
            const searchInput = document.getElementById('search');

            categoryItems.forEach(item => {
                item.addEventListener('click', function() {
                    const category = item.getAttribute('data-category');
                    searchInput.value = category; // Set the category to the search input
                    searchForm.submit(); // Submit the form
                });
            });

            // Existing functionality for clear button and search form
            const clearButton = document.getElementById('clearSearch');
            if (clearButton) {
                clearButton.addEventListener('click', function() {
                    searchInput.value = '';
                    this.style.display = 'none';
                    searchForm.submit();
                });
            }

            // Auto-hide flash message after 5 seconds
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                setTimeout(() => {
                    flashMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</x-app-layout>
