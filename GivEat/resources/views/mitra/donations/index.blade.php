<x-app-layout>
    <div class="container-fluid py-4" style="background: #FBFFFB;padding: 30px; min-height: 100vh;">
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
                <h1 class="h3 mb-0" style="font-size: 1.5rem; font-weight: bold;">Daftar Donasi</h1>
                <p class="text-muted mb-0" style="font-size: 0.875rem; color: #6c757d;">Kelola data donasi makanan Anda</p>
            </div>
            <a href="{{ route('donations.create') }}" class="btn btn-primary rounded-pill px-4" style="font-weight: 500; background-color: #006837; border-color: #006837; padding: 0.5rem 1.25rem;">
                <i class="bi bi-plus-lg"></i> Tambah Donasi
            </a>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius: 0.375rem; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="border-collapse: collapse; width: 100%;">
                    <thead class="bg-light" style="background-color: #f8f9fa;">
                        <tr>
                            <th scope="col" style="width: 60px; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Gambar</th>
                            <th scope="col" style="width: 15%; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Nama</th>
                            <th scope="col" style="width: 10%; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Kategori</th>
                            <th scope="col" style="width: 25%; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Deskripsi</th>
                            <th scope="col" style="width: 8%; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem;" class="text-center">Porsi</th>
                            <th scope="col" style="width: 12%; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Waktu</th>
                            <th scope="col" style="width: 15%; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem;" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $donation)
                            <tr>
                                <td class="align-middle" style="vertical-align: middle; padding: 1rem;">
                                    @if($donation->image)
                                        <img src="{{ asset('storage/' . $donation->image) }}" 
                                            alt="{{ $donation->name }}" 
                                            class="rounded"
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded" 
                                            style="width: 50px; height: 50px; font-size: 1.25rem; color: #6c757d; background-color: #f8f9fa;">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="align-middle" style="vertical-align: middle; padding: 1rem;">
                                    <div class="fw-medium text-truncate" style="max-width: 150px; font-weight: 500; color: #495057;">{{ $donation->name }}</div>
                                    <small class="text-muted" style="font-size: 0.875rem;">{{ $donation->created_at->diffForHumans() }}</small>
                                </td>
                                <td class="align-middle" style="vertical-align: middle; padding: 1rem;">
                                    <span class="badge {{ $donation->category->name === 'Makanan' ? 'text-bg-success' : 'text-bg-primary' }}" style="font-size: 0.875rem; padding: 0.25rem 0.75rem;">
                                        {{ $donation->category->name }}
                                    </span>
                                </td>
                                <td class="align-middle" style="vertical-align: middle; padding: 1rem;">
                                    <div class="text-muted text-truncate" style="max-width: 300px;" title="{{ $donation->description }}">
                                        {{ $donation->description }}
                                    </div>
                                </td>
                                <td class="align-middle text-center" style="vertical-align: middle; padding: 1rem;">
                                    <span class="badge text-bg-light border" style="font-size: 0.875rem; padding: 0.25rem 0.75rem;">
                                        {{ $donation->portion }}
                                    </span>
                                </td>
                                <td class="align-middle" style="vertical-align: middle; padding: 1rem;">
                                    <div class="text-muted small" style="font-size: 0.875rem;">
                                        {{ \Carbon\Carbon::parse($donation->pickup_time)->format('d/m/y H:i') }}
                                    </div>
                                </td>
                                <td class="align-middle text-end" style="vertical-align: middle; padding: 1rem;">
                                    <a href="{{ route('donations.show', $donation) }}" class="btn btn-sm btn-outline-primary me-1" title="Lihat Detail" style="font-size: 0.875rem; border-color: #007bff; color: #007bff;">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('donations.edit', $donation) }}" class="btn btn-sm btn-outline-info me-1" title="Edit" style="font-size: 0.875rem; border-color: #17a2b8; color: #17a2b8;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('donations.destroy', $donation) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus" 
                                                style="font-size: 0.875rem; border-color: #dc3545; color: #dc3545;" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus donasi ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
