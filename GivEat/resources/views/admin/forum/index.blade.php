<x-app-layout>
    <x-slot name="title">Kelola Forum Diskusi</x-slot>

    <div class="container-fluid py-4">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4" style="font-weight: 500; color: #28a745; background-color: #d4edda; border-color: #c3e6cb;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0" style="font-size: 1.5rem;">Kelola Forum Diskusi</h1>
                <p class="text-muted mb-0" style="font-size: 0.875rem;">Manajemen forum diskusi pengguna</p>
            </div>
            <div class="badge bg-primary rounded-pill px-3 py-2" style="font-weight: 500; background-color: #2cbb5c;">
                Total Topik: {{ $topics->total() }}
            </div>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius: 0.375rem;">
            
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="border-collapse: collapse; width: 100%;">
                    <thead class="bg-light" style="background-color: #f8f9fa;">
                        <tr>
                            <th style="width: 5%; padding: 1rem; color: #6c757d; font-size: 0.95rem;">No</th>
                            <th style="padding: 1rem; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Judul Topik</th>
                            <th style="padding: 1rem; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Pengguna</th>
                            <th style="padding: 1rem; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Tanggal</th>
                            <th style="padding: 1rem; font-weight: 500; color: #6c757d; font-size: 0.95rem;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($topics as $topic)
                            <tr>
                                <td class="align-middle text-center" style="padding: 1rem;">{{ $loop->iteration }}</td>
                                <td style="padding: 1rem;">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a href="{{ route('admin.forum.show', $topic->id) }}" class="fw-medium" style="color: #495057; text-decoration: none;">
                                                {{ Str::limit($topic->title, 60) }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding: 1rem;">
                                    <div class="d-flex align-items-center">
                                        
                                        <div>
                                            <div class="fw-medium" style="color: #495057;">{{ $topic->user->name }}</div>
                                            <div class="text-muted" style="font-size: 0.875rem;">{{ $topic->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding: 1rem;">
                                    <div style="color: #495057;">{{ $topic->created_at->format('d M Y') }}</div>
                                    <div class="text-muted" style="font-size: 0.875rem;">{{ $topic->created_at->format('H:i') }}</div>
                                </td>
                                <td class="text-end" style="padding: 1rem;">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.forum.show', $topic->id) }}" 
                                        class="btn btn-sm btn-outline-info" 
                                        title="Lihat" 
                                        style="font-size: 0.875rem; border-color: #17a2b8; color: #17a2b8;"
                                        dusk="show-topic-{{ $topic->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </a>

                                        <form action="{{ route('admin.forum.destroy', $topic->id) }}" method="POST" onsubmit="return confirm('Hapus topik ini secara permanen?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus" style="font-size: 0.875rem; border-color: #dc3545; color: #dc3545;"
                                            dusk="delete-topik-{{ $topic->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg>
                                            </button>
                                        </form>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="mb-3">
                                        <path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                    </svg>
                                    <p class="mb-1">Belum ada topik diskusi</p>
                                    <p class="small">Pengguna belum membuat topik diskusi</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $topics->links() }}
        </div>
    </div>
</x-app-layout>