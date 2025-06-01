<x-app-layout>
    @push('styles')
    <style>
        /* Soft background colors for category badges */
        .bg-soft-primary { background-color: rgba(13, 110, 253, 0.1) !important; }
        .bg-soft-info { background-color: rgba(13, 202, 240, 0.1) !important; }
        .bg-soft-warning { background-color: rgba(255, 193, 7, 0.1) !important; }
        .bg-soft-success { background-color: rgba(25, 135, 84, 0.1) !important; }
        .bg-soft-secondary { background-color: rgba(108, 117, 125, 0.1) !important; }
    </style>
    @endpush
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
                <i class="bi bi-plus-lg"></i>Tambah Donasi
            </a>
        </div>

        <!-- Date Filter Buttons -->
        <div class="d-flex flex-wrap gap-2 mb-4">
            <a href="{{ request()->fullUrlWithQuery(['date_filter' => 'all', 'status' => request('status')]) }}"
                class="rounded-pill px-4 py-2 fw-regular shadow-sm"
                style="background:{{ request('date_filter') == 'all' || !request('date_filter') ? '#006837' : '#fff' }}; color:{{ request('date_filter') == 'all' || !request('date_filter') ? '#fff' : '#006837' }}; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border:none;">
                Semua Donasi
            </a>
            <a href="{{ request()->fullUrlWithQuery(['date_filter' => 'today', 'status' => request('status')]) }}"
                class="rounded-pill px-4 py-2 fw-regular shadow-sm"
                style="background:{{ request('date_filter') == 'today' ? '#006837' : '#fff' }}; color:{{ request('date_filter') == 'today' ? '#fff' : '#006837' }}; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border:none;">
                Donasi Hari Ini
            </a>
            <a href="{{ request()->fullUrlWithQuery(['date_filter' => 'past', 'status' => request('status')]) }}"
                class="rounded-pill px-4 py-2 fw-regular shadow-sm"
                style="background:{{ request('date_filter') == 'past' ? '#006837' : '#fff' }}; color:{{ request('date_filter') == 'past' ? '#fff' : '#006837' }}; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border:none;">
                Donasi Lampau
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
                            <th scope="col" style="width: 20%; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem; max-width: 120px;">Deskripsi</th>
                            <th scope="col" style="width: 5%; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem;" class="text-center">Porsi</th>
                            <th scope="col" style="width: 10%; padding: 1rem; background-color: #f8f9fa; font-weight: 500; color: #6c757d; font-size: 0.95rem;">Waktu</th>
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
                                @php
                                    // Daftar warna untuk kategori
                                    $categoryStyles = [
                                        'Makanan' => 'background-color: #FFF8E1; color: #E65100;',
                                        'Minuman' => 'background-color: #E1F5FE; color: #01579B;',
                                        'Snack' => 'background-color:rgb(255, 242, 238); color:rgb(230, 0, 0);',
                                        'Buah' => 'background-color: #E8F5E9; color: #1B5E20;',
                                        'Sayur' => 'background-color: #F1F8E9; color: #33691E;',
                                    ];
                                    
                                    $categoryName = $donation->category->name;
                                    $badgeStyle = $categoryStyles[$categoryName] ?? 'background-color: #F5F5F5; color: #212121;';
                                @endphp
                                <td class="align-middle" style="vertical-align: middle; padding: 1rem;">
                                    <span class="badge rounded-pill" style="font-size: 0.875rem; border: none; font-weight: 500; {{ $badgeStyle }}">
                                        {{ $categoryName }}
                                    </span>
                                </td>
                                <td class="align-middle" style="vertical-align: middle; padding: 1rem;">
                                    <div class="text-muted text-truncate" style="max-width: 250px;" title="{{ $donation->description }}">
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
                                    <a href="{{ route('donations.show', $donation) }}" class="btn btn-sm me-1 d-inline-flex align-items-center justify-content-center" title="Lihat Detail" 
                                       style="width: 36px; height: 36px; font-size: 0.875rem; background-color: rgba(0, 104, 55, 0.1); color: #006837; border: none; border-radius: 0.5rem;">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('donations.edit', $donation) }}" class="btn btn-sm me-1 d-inline-flex align-items-center justify-content-center" dusk="edit-donation-button" title="Edit" 
                                       style="width: 36px; height: 36px; font-size: 0.875rem; background-color: rgba(23, 162, 184, 0.1); color: #0d6efd; border: none; border-radius: 0.5rem;">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('donations.destroy', $donation) }}" method="POST" class="d-inline" dusk="delete-donation-button">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm d-inline-flex align-items-center justify-content-center" title="Hapus" 
                                                style="width: 36px; height: 36px; font-size: 0.875rem; background-color: rgba(220, 53, 69, 0.1); color: #dc3545; border: none; border-radius: 0.5rem;" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus donasi ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top">
                    <div class="text-muted">
                        Menampilkan <span class="fw-semibold">{{ $donations->firstItem() }}</span> sampai <span class="fw-semibold">{{ $donations->lastItem() }}</span> dari <span class="fw-semibold">{{ $donations->total() }}</span> data
                    </div>
                    <nav aria-label="Page navigation" style="margin: 0; padding: 0;">
                        <ul class="pagination mb-0" style="display: flex; padding-left: 0; list-style: none; margin: 0;">
                            {{-- Previous Page Link --}}
                            @if ($donations->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" style="margin: 0 2px;">
                                    <span class="page-link" aria-hidden="true" style="position: relative; display: block; padding: 0.5rem 0.9rem; margin-left: -1px; line-height: 1.25; color: #6c757d; background-color: #fff; border: 1px solid #dee2e6; border-radius: 4px; text-decoration: none;">&lsaquo;</span>
                                </li>
                            @else
                                <li class="page-item" style="margin: 0 2px;">
                                    <a class="page-link" href="{{ $donations->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="position: relative; display: block; padding: 0.5rem 0.9rem; margin-left: -1px; line-height: 1.25; color: #006837 !important; background-color: #fff; border: 1px solid #dee2e6; border-radius: 4px; text-decoration: none; transition: all 0.2s ease-in-out;">&lsaquo;</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($donations->getUrlRange(1, $donations->lastPage()) as $page => $url)
                                @if ($page == $donations->currentPage())
                                    <li class="page-item active" aria-current="page" style="margin: 0 2px;">
                                        <span class="page-link" style="position: relative; display: block; padding: 0.5rem 0.9rem; margin-left: -1px; line-height: 1.25; color: #fff !important; background-color: #006837 !important; border-color: #006837 !important; border-radius: 4px; text-decoration: none; z-index: 3;">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item" style="margin: 0 2px;">
                                        <a class="page-link" href="{{ $url }}" style="position: relative; display: block; padding: 0.5rem 0.9rem; margin-left: -1px; line-height: 1.25; color: #006837 !important; background-color: #fff; border: 1px solid #dee2e6; border-radius: 4px; text-decoration: none; transition: all 0.2s ease-in-out;">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($donations->hasMorePages())
                                <li class="page-item" style="margin: 0 2px;">
                                    <a class="page-link" href="{{ $donations->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="position: relative; display: block; padding: 0.5rem 0.9rem; margin-left: -1px; line-height: 1.25; color: #006837 !important; background-color: #fff; border: 1px solid #dee2e6; border-radius: 4px; text-decoration: none; transition: all 0.2s ease-in-out;">&rsaquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')" style="margin: 0 2px;">
                                    <span class="page-link" aria-hidden="true" style="position: relative; display: block; padding: 0.5rem 0.9rem; margin-left: -1px; line-height: 1.25; color: #6c757d; background-color: #fff; border: 1px solid #dee2e6; border-radius: 4px; text-decoration: none;">&rsaquo;</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
