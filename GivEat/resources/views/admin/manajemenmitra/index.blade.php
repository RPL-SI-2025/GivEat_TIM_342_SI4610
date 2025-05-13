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
                <h1 class="h3 mb-0" style="font-size: 1.5rem;">Daftar Mitra</h1>
                <p class="text-muted mb-0" style="font-size: 0.875rem;">Kelola akun pengguna bertipe mitra</p>
            </div>
            <a href="{{ route('admin.manajemenmitra.create') }}" class="btn btn-success rounded-pill px-4" style="font-weight: 500; background-color: #2cbb5c; border-color: #27ac5f;">
                <i class="bi bi-plus-lg"></i> Tambah Mitra
            </a>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius: 0.375rem;">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 5%; padding: 1rem; color: #6c757d; font-size: 0.95rem;">No</th>
                            <th style="padding: 1rem; color: #6c757d; font-size: 0.95rem;"><i class="bi bi-person-fill-check"></i> Nama</th>
                            <th style="padding: 1rem; color: #6c757d; font-size: 0.95rem;"><i class="bi bi-envelope-at-fill"></i> Email</th>
                            <th style="width: 20%; padding: 1rem; color: #6c757d; font-size: 0.95rem;" class="text-end"><i class="bi bi-gear-fill me-2"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mitras as $mitra)
                            <tr>
                                <td class="align-middle text-center" style="padding: 1rem;">{{ $loop->iteration }}</td>
                                <td class="align-middle" style="padding: 1rem; font-weight: 500; color: #495057;">{{ $mitra->name }}</td>
                                <td class="align-middle" style="padding: 1rem;">{{ $mitra->email }}</td>
                                <td class="align-middle text-end" style="padding: 1rem;">
                                    <a href="{{ route('admin.manajemenmitra.edit', $mitra->id) }}" class="btn btn-sm btn-outline-info me-1" title="Edit" style="font-size: 0.875rem;">
                                        <i class="bi bi-pencil"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.manajemenmitra.destroy', $mitra->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mitra ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus" style="font-size: 0.875rem;">
                                            <i class="bi bi-trash"></i>Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4" style="font-style: italic;">Tidak ada data mitra.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
