<x-app-layout>
    <div class="container-fluid py-4">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm" style="font-weight: 500; color: #28a745; background-color: #d4edda; border-color: #c3e6cb;">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger border-0 shadow-sm" style="font-weight: 500; color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;">
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0" style="font-size: 1.5rem;">Daftar FAQ</h1>
                <p class="text-muted mb-0" style="font-size: 0.875rem;">Kelola pertanyaan umum dari pengguna</p>
            </div>
            <a href="{{ route('admin.faq.create') }}" class="btn btn-success rounded-pill px-4" style="font-weight: 500; background-color: #2cbb5c; border-color: #27ac5f;">
                <i class="bi bi-plus-lg"></i>Tambah FAQ
            </a>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius: 0.375rem;">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 5%; padding: 1rem; color: #6c757d; font-size: 0.95rem;">No</th>
                            <th style="width: 35%; padding: 1rem; color: #6c757d; font-size: 0.95rem;"><i class="bi bi-question-circle-fill"></i> Pertanyaan</th>
                            <th style="width: 40%; padding: 1rem; color: #6c757d; font-size: 0.95rem;"><i class="bi bi-question-circle-fill"></i> Jawaban</th>
                            <th style="width: 20%; padding: 1rem; color: #6c757d; font-size: 0.95rem;" class="text-end"><i class="bi bi-gear-fill me-2"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($faqs as $faq)
                            <tr>
                                <td class="align-middle text-center" style="padding: 1rem;">{{ $loop->iteration }}</td>
                                <td class="align-middle" style="padding: 1rem; font-weight: 500; color: #495057;">{{ $faq->question }}</td>
                                <td class="align-middle" style="padding: 1rem;">
                                    <div class="text-muted text-truncate" style="max-width: 300px;" title="{{ $faq->answer }}">
                                        {{ \Illuminate\Support\Str::words($faq->answer, 10, '...') }}
                                    </div>
                                </td>
                                <td class="align-middle text-end" style="padding: 1rem;">
                                    <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-sm btn-outline-info me-1" dusk="edit" title="Edit" style="font-size: 0.875rem;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" class="d-inline" dusk="hapus" onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus" style="font-size: 0.875rem;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4" style="font-style: italic;">Tidak ada data FAQ.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
