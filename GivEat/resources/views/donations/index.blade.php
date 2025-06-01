@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Daftar Donasi</h1>
            <p class="text-muted mb-0">Kelola data donasi makanan Anda</p>
        </div>
        <a href="{{ route('donations.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg"></i> Tambah Donasi
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" style="width: 60px">Gambar</th>
                        <th scope="col" style="width: 15%">Nama</th>
                        <th scope="col" style="width: 10%">Kategori</th>
                        <th scope="col" style="width: 25%">Deskripsi</th>
                        <th scope="col" style="width: 8%" class="text-center">Porsi</th>
                        <th scope="col" style="width: 12%">Waktu</th>
                        <th scope="col" style="width: 15%" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donations as $donation)
                        <tr>
                            <td>
                                @if($donation->image)
                                    <img src="{{ asset('storage/' . $donation->image) }}" 
                                         alt="{{ $donation->name }}" 
                                         class="rounded"
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded" 
                                         style="width: 50px; height: 50px;">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-medium text-truncate" style="max-width: 150px;">{{ $donation->name }}</div>
                                <small class="text-muted">{{ $donation->created_at->diffForHumans() }}</small>
                            </td>
                            <td>
                                <span class="badge {{ $donation->category->name === 'Makanan' ? 'text-bg-success' : 'text-bg-primary' }}">
                                    {{ $donation->category->name }}
                                </span>
                            </td>
                            <td>
                                <div class="text-muted text-truncate" style="max-width: 300px;" title="{{ $donation->description }}">
                                    {{ $donation->description }}
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge text-bg-light border">
                                    {{ $donation->portion }}
                                </span>
                            </td>
                            <td>
                                <div class="text-muted small">
                                    {{ \Carbon\Carbon::parse($donation->pickup_time)->format('d/m/y H:i') }}
                                </div>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('donations.show', $donation) }}" class="btn btn-sm btn-outline-primary me-1" title="Lihat Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('donations.edit', $donation) }}" class="btn btn-sm btn-outline-info me-1" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('donations.destroy', $donation) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"
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
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    .table th {
        font-weight: 500;
        color: var(--giveat-text);
        font-size: 0.95rem;
        padding: 1rem;
        background-color: #f8f9fa;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .table td {
        color: var(--giveat-text);
        font-size: 0.9rem;
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #f0f0f0;
        border-color: #f0f0f0;
    }

    .table tbody tr:hover {
        background-color: var(--giveat-hover);
    }

    .btn-outline-primary {
        color: var(--giveat-primary);
        border-color: var(--giveat-primary);
    }

    .btn-outline-primary:hover {
        background-color: var(--giveat-primary);
        border-color: var(--giveat-primary);
        color: white;
    }

    .btn-primary {
        background-color: var(--giveat-primary);
        border-color: var(--giveat-primary);
        font-weight: 500;
    }

    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus {
        background-color: #02190B !important;
        border-color: #02190B !important;
    }

    .badge.bg-success {
        background-color: #dcf5e7 !important;
        color: #0a6d3d;
    }

    .badge.bg-warning {
        background-color: #fff4d9 !important;
        color: #b98900;
    }

    .badge.bg-secondary {
        background-color: #f0f0f0 !important;
        color: #666666;
    }
</style>
@endpush
