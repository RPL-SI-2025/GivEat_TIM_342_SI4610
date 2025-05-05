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
                <h1 class="h3 mb-0" style="font-size: 1.5rem;">Manajemen Berita</h1>
                <p class="text-muted mb-0" style="font-size: 0.875rem;">Kelola konten berita yang ditampilkan</p>
            </div>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary rounded-pill px-4" style="font-weight: 500; background-color: #2cbb5c; border-color: #27ac5f; padding: 0.5rem 1.25rem;">
                <i class="bi bi-plus-lg"></i> Tambah Berita
            </a>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius: 0.375rem;">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="border-collapse: collapse; width: 100%;">
                    <thead class="bg-light" style="background-color: #f8f9fa;">
                        <tr>
                            <th style="padding: 1rem; font-weight: 500; color: #6c757d; font-size: 0.95rem;">#</th>
                            <th style="padding: 1rem; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Judul</th>
                            <th style="padding: 1rem; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Ringkasan</th>
                            <th style="padding: 1rem; font-weight: 500; color: #6c757d; font-size: 0.95rem;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($beritas as $index => $berita)
                            <tr>
                                <td style="padding: 1rem;">{{ $index + 1 }}</td>
                                <td style="padding: 1rem;">
                                    <div class="fw-medium text-truncate" style="max-width: 200px; color: #495057;">
                                        {{ $berita->judul }}
                                    </div>
                                </td>
                                <td style="padding: 1rem;">
                                    <div class="text-muted text-truncate" style="max-width: 350px;" title="{{ $berita->ringkasan }}">
                                        {{ \Illuminate\Support\Str::limit($berita->ringkasan, 100) }}
                                    </div>
                                </td>
                                <td class="text-end" style="padding: 1rem;">
                                    <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-sm btn-outline-info me-1" title="Edit"
                                       style="font-size: 0.875rem; border-color: #17a2b8; color: #17a2b8;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"
                                                style="font-size: 0.875rem; border-color: #dc3545; color: #dc3545;"
                                                dusk="delete-berita-{{ $berita->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Tidak ada berita tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
