<x-app-layout>
    <div class="container-fluid py-4" style="background: #FBFFFB; padding: 30px; min-height: 100vh;">
        <!-- Welcome Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1" style="font-weight:bold">Dashboard</h1>
                <p class="text-muted">Hai {{ auth()->user()->name ?? 'Robert' }}, lihat statistik donasimu!</p>
            </div>
        </div>
    
        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <!-- Total Orders -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h3 class="display-6 fw-bold mb-1">{{ number_format($totalTransactions ?? 0) }}</h3>
                                <div class="text-muted">Total Pesanan</div>
                                <small class="text-muted">
                                  Total pesanan yang telah diproses
                                </small>
                            </div>
                            <div class="ms-3 bg-success bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-box-seam text-success fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Food Recipients -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h3 class="display-6 fw-bold mb-1">{{ number_format($stats['recipients'] ?? 0) }}</h3>
                                <div class="text-muted">Penerima Makanan</div>
                                <small class="text-muted">
                                    Jumlah penerima manfaat
                                </small>
                            </div>
                            <div class="ms-3 bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-people text-primary fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Saved Food -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h3 class="display-6 fw-bold mb-1">{{ number_format($stats['saved'] ?? 0, 1) }}</h3>
                                <div class="text-muted">Kg Makanan Terselamatkan</div>
                                <small class="text-muted">
                                    Total berat makanan yang diselamatkan
                                </small>
                            </div>
                            <div class="ms-3 bg-warning bg-opacity-10 rounded-circle p-3">
                                <i class="bi bi-basket text-warning fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row g-4">
            <!-- Order Table -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0" style="font-size: 1.25rem; font-weight: 600; color: #2c3e50;">Daftar Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="historyTable" class="table align-middle mb-0">
                                <thead style="background: #f5faf7;">
                                    <tr>
                                        <th>No</th>
                                        <th>Pesanan</th>
                                        <th>Nama</th>
                                        <th>Waktu</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $i => $order)
                                    <tr>
                                        <td>{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $order->booking_code }}</td>
                                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                                        <td>{{ $order->claimed_at ? \Carbon\Carbon::parse($order->claimed_at)->format('H:i') : '-' }}</td>
                                        <td>{{ $order->claimed_at ? \Carbon\Carbon::parse($order->claimed_at)->format('d/m/Y') : '-' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data pesanan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Donation Status -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0" style="font-size: 1.25rem; font-weight: 600; color: #2c3e50;">Status Donasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>{{ $totalTransactions }} Total pesanan</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" style="width: {{ $statusCounts['done'] / max($totalTransactions, 1) * 100 }}%"></div>
                                <div class="progress-bar bg-warning" style="width: {{ $statusCounts['pending'] / max($totalTransactions, 1) * 100 }}%"></div>
                                <div class="progress-bar bg-danger" style="width: {{ $statusCounts['not_taken'] / max($totalTransactions, 1) * 100 }}%"></div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span><i class="bi bi-circle-fill text-success me-2"></i> {{ $statusCounts['done'] }} Selesai</span>
                                <span class="text-muted">{{ round(($statusCounts['done'] / max($totalTransactions, 1)) * 100) }}%</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span><i class="bi bi-circle-fill text-warning me-2"></i> {{ $statusCounts['pending'] }} Belum Diambil</span>
                                <span class="text-muted">{{ round(($statusCounts['pending'] / max($totalTransactions, 1)) * 100) }}%</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-circle-fill text-danger me-2"></i> {{ $statusCounts['not_taken'] }} Tidak Diambil</span>
                                <span class="text-muted">{{ round(($statusCounts['not_taken'] / max($totalTransactions, 1)) * 100) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Donasi Hari Ini -->
<div class="col-12 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0" style="font-size: 1.25rem; font-weight: 600; color: #2c3e50;">Donasi Hari Ini</h5>
        <a href="{{ route('mitra.donations.index') }}" class="btn btn-sm" style="color: #006837; font-size: 0.875rem; font-weight: 500; text-decoration: none;">
            Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
    
    @if($availableDonations->isNotEmpty())
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach($availableDonations as $donation)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; transition: transform 0.2s;">
                        <div class="position-relative">
                            <span class="position-absolute top-0 end-0 m-2 badge" style="background-color: #FF4B4B; font-size: 0.75rem; font-weight: 500;">
                                Tersisa {{ $donation->portion }} Porsi
                            </span>
                            @if($donation->image)
                                <img src="{{ asset('storage/' . $donation->image) }}" 
                                    class="card-img-top" 
                                    alt="{{ $donation->name }}"
                                    style="height: 180px; object-fit: cover; width: 100%;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                    style="height: 180px; background-color: #f8f9fa;">
                                    <i class="bi bi-image fs-1 text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-2" style="font-size: 1rem; font-weight: 600; color: #2c3e50;">
                                {{ Str::limit($donation->name, 25) }}
                            </h5>
                            
                            @php
                                $categoryStyles = [
                                    'Makanan' => ['bg' => '#FFF8E1', 'text' => '#E65100'],
                                    'Minuman' => ['bg' => '#E1F5FE', 'text' => '#01579B'],
                                    'Snack' => ['bg' => '#FFF3E0', 'text' => '#E64A19'],
                                    'Buah' => ['bg' => '#E8F5E9', 'text' => '#1B5E20'],
                                    'Sayur' => ['bg' => '#F1F8E9', 'text' => '#33691E'],
                                ];
                                
                                $categoryName = $donation->category->name ?? 'Lainnya';
                                $categoryStyle = $categoryStyles[$categoryName] ?? ['bg' => '#F5F5F5', 'text' => '#212121'];
                            @endphp
                            
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge rounded-pill me-2" style="font-size: 0.7rem; padding: 0.3rem 0.8rem; background-color: {{ $categoryStyle['bg'] }}; color: {{ $categoryStyle['text'] }}; font-weight: 500;">
                                    {{ $categoryName }}
                                </span>
                            </div>
                            
                            <div class="d-flex align-items-center text-muted mb-3" style="font-size: 0.8rem; color: #7f8c8d;">
                                <i class="bi bi-clock me-2"></i>
                                {{ \Carbon\Carbon::parse($donation->pickup_time)->format('H:i') }} WIB
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5 border rounded" style="background-color: #f8f9fa; border-radius: 12px; border: 1px dashed #dee2e6 !important;">
            <i class="bi bi-inbox fs-1 text-muted mb-3" style="opacity: 0.7;"></i>
            <p class="text-muted mb-0" style="font-size: 0.95rem;">Tidak ada donasi tersedia saat ini</p>
        </div>
    @endif
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
