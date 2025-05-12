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
            <!-- Distributed Food -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h3 class="display-6 fw-bold mb-1">9812</h3>
                                <div class="text-muted">Makanan Terdistribusi</div>
                                <small class="text-success">
                                    <i class="bi bi-arrow-up"></i> 50 kali lebih banyak minggu ini
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
                                <h3 class="display-6 fw-bold mb-1">1000</h3>
                                <div class="text-muted">Penerima Makanan</div>
                                <small class="text-success">
                                    <i class="bi bi-arrow-up"></i> 50 kali lebih banyak minggu ini
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
                                <h3 class="display-6 fw-bold mb-1">4591</h3>
                                <div class="text-muted">Kg Makanan Terselamatkan</div>
                                <small class="text-success">
                                    <i class="bi bi-arrow-up"></i> 50 kali lebih banyak minggu ini
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
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0">Pesanan Masuk</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Pesanan</th>
                                        <th>Waktu Booking</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>PS0001</td>
                                        <td>19:20:25</td>
                                        <td><span class="badge bg-success">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>PS0002</td>
                                        <td>19:20:25</td>
                                        <td><span class="badge bg-warning">Belum Diambil</span></td>
                                    </tr>
                                    <tr>
                                        <td>03</td>
                                        <td>PS0003</td>
                                        <td>19:20:25</td>
                                        <td><span class="badge bg-danger">Tidak Diambil</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Donation Status -->
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0">Status Donasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>500 Total pesanan</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar bg-success" style="width: 74%"></div>
                                <div class="progress-bar bg-warning" style="width: 16%"></div>
                                <div class="progress-bar bg-danger" style="width: 10%"></div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span><i class="bi bi-circle-fill text-success me-2"></i> 370 Selesai</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span><i class="bi bi-circle-fill text-warning me-2"></i> 80 Belum Diambil</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-circle-fill text-danger me-2"></i> 50 Tidak Diambil</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Latest Orders -->
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0">Terakhir Dipesan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <img src="{{ asset('images/makanan.png') }}" class="card-img-top" alt="Nasi Liwet" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">Nasi Liwet</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="bi bi-people me-2"></i>10 Porsi</span>
                                            <span><i class="bi bi-person me-2"></i>5 Penerima</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <img src="{{ asset('images/makanan.png') }}" class="card-img-top" alt="Ayam Goreng" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">Ayam Goreng</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="bi bi-people me-2"></i>10 Porsi</span>
                                            <span><i class="bi bi-person me-2"></i>8 Penerima</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <img src="{{ asset('images/makanan.png') }}" class="card-img-top" alt="Kwetiau Goreng" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">Kwetiau Goreng</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="bi bi-people me-2"></i>10 Porsi</span>
                                            <span><i class="bi bi-person me-2"></i>4 Penerima</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
