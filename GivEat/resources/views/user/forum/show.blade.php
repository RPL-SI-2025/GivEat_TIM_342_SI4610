<x-app-layout>
    <x-slot name="title">{{ $topic->title }}</x-slot>

    <div class="max-w-3xl mx-auto py-12 px-4">
        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('forum.index') }}" class="inline-flex items-center text-[#00843D] hover:text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Forum
            </a>
        </div>

        <!-- TOPIK -->
        <div class="mb-6 bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $topic->title }}</h2>
            <div class="text-sm text-gray-500 mb-4">{{ $topic->user->name }} • {{ $topic->created_at->diffForHumans() }}</div>
            <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $topic->content }}</div>

            @if (Auth::id() === $topic->user_id && $topic->created_at->gt(now()->subMinutes(30)))
                <div class="flex items-center gap-4 mt-4">
                    <a href="{{ route('forum.edit', $topic->id) }}" 
                       class="text-sm text-gray-600 hover:text-gray-900 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>Edit</a>
                    <form action="{{ route('forum.destroy', $topic->id) }}" method="POST" onsubmit="return confirm('Hapus topik ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="hapus-topik" class="text-sm text-gray-600 hover:text-gray-900 flex items-center gap-1" dusk="delete-topik-{{ $topic->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <!-- DAFTAR KOMENTAR -->
        <h3 class="text-xl font-semibold mb-4">Komentar</h3>

        @forelse($topic->comments as $comment)
            <div class="flex items-start gap-3 mb-4 pb-4 border-b border-gray-200" id="comment-{{ $comment->id }}">
                <div class="flex-shrink-0">
                    <img src="{{ $comment->user->avatar_url ?? 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->user->email))) . '?d=mp' }}" 
                         class="w-10 h-10 rounded-full object-cover" 
                         alt="{{ $comment->user->name }}">
                </div>

                <div class="flex-grow">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="font-medium text-gray-900">{{ $comment->user->name }}</span>
                        <span class="text-xs text-gray-500">
                            {{ $comment->created_at->diffForHumans() }}
                            @if($comment->created_at != $comment->updated_at)
                                (diedit)
                            @endif
                        </span>
                    </div>

                    <div class="comment-display" id="display-{{ $comment->id }}">
                        <p class="text-gray-800 whitespace-pre-line">{{ $comment->komentar }}</p>
                    </div>

                    @if(Auth::id() === $comment->user_id)
                        <div class="comment-edit hidden" id="edit-{{ $comment->id }}">
                            <form method="POST" action="{{ route('forum.comment.update', $comment->id) }}" 
                                  class="comment-edit-form" id="form-{{ $comment->id }}">
                                @csrf
                                @method('PUT')
                                <textarea name="komentar" rows="3" 
                                          class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring focus:ring-green-200 focus:outline-none mb-2">{{ $comment->komentar }}</textarea>
                                <div class="flex items-center gap-2">
                                    <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded text-sm hover:bg-blue-700">Simpan</button>
                                    <button type="button" onclick="disableEditMode('{{ $comment->id }}')" 
                                            class="px-3 py-1 bg-gray-200 text-gray-800 rounded text-sm hover:bg-gray-300">Batal</button>
                                </div>
                            </form>
                        </div>
                    @endif

                    <div class="flex items-center gap-4 mt-2">
                        @if(Auth::check() && Auth::id() === $comment->user_id && $comment->created_at->gt(now()->subMinutes(30)))
                            <button onclick="enableEditMode('{{ $comment->id }}')" 
                                    class="text-sm text-gray-600 hover:text-gray-900 flex items-center gap-1"
                                    id="edit-comment-{{ $comment->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </button>


                            <form action="{{ route('forum.comment.destroy', $comment->id) }}" method="POST" 
                                  class="inline" onsubmit="return confirm('Hapus komentar ini?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 flex items-center gap-1" 
                                        id="delete-comment-{{ $comment->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500 mb-4">Belum ada komentar.</p>
        @endforelse

        <!-- FORM KOMENTAR -->
        <div class="flex items-start gap-3 mt-6">
            <div class="flex-shrink-0">
                <img src="{{ Auth::user()->avatar_url ?? 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=mp' }}" 
                     class="w-10 h-10 rounded-full object-cover" 
                     alt="{{ Auth::user()->name }}">
            </div>
            <form action="{{ route('forum.comment.store', $topic->id) }}" method="POST" class="flex-grow">
                @csrf
                <textarea name="komentar" rows="3" required 
                          class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring focus:ring-green-200 focus:outline-none" 
                          placeholder="Tambahkan komentar..."></textarea>
                <div class="flex justify-end mt-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        function enableEditMode(commentId) {
            document.getElementById(`display-${commentId}`).classList.add('hidden');
            document.getElementById(`edit-${commentId}`).classList.remove('hidden');
            const textarea = document.querySelector(`#edit-${commentId} textarea`);
            textarea.focus();
            textarea.selectionStart = textarea.value.length;
        }

        function disableEditMode(commentId) {
            document.getElementById(`display-${commentId}`).classList.remove('hidden');
            document.getElementById(`edit-${commentId}`).classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.comment-edit-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const form = e.target;
                    const commentId = form.id.split('-')[1];

                    fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams(new FormData(form))
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            document.querySelector(`#display-${commentId} p`).textContent = data.komentar;
                            disableEditMode(commentId);
                            const timestamp = document.querySelector(`#comment-${commentId} .text-xs`);
                            if (timestamp) {
                                timestamp.innerHTML = 'Baru saja <span class="text-gray-400">(diedit)</span>';
                                setTimeout(() => {
                                    timestamp.textContent = '1 menit yang lalu (diedit)';
                                }, 60000);
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan komentar');
                    });
                });
            });
        });
    </script>
    @endpush
</x-app-layout>
