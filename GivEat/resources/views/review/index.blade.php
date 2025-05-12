<x-app-layout>
     <div class="container-fluid py-4">
        <!-- Welcome Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h3 mb-1">Review</h2>
                    <p class="text-muted">Hai {{ auth()->user()->name ?? 'Robert' }}, lihat ulasan penerima</p>
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


            <!-- Review Section -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Review Penerima</h3>
                <a href="#" class="text-green-600 text-sm">Lihat Selengkapnya</a>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-10">
                <!-- Card 1 -->
                <div class="bg-white p-5 rounded-xl shadow-md">
                    <p class="text-8xl text-green-600 leading-none">“</p>
                    <p class="text-sm mb-4">Makanannya sangat enak dan porsinya pas. Terima kasih banyak!</p>
                    <div class="flex items-center mt-4">
                        <img src="{{ asset('images/human/andi.jpg') }}" alt="Andi" class="w-8 h-8 rounded-full">
                        <span class="text-sm font-medium ml-2">Andi</span>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white p-5 rounded-xl shadow-md">
                    <p class="text-8xl text-green-600 leading-none">“</p>
                    <p class="text-sm mb-4">Pelayanannya cepat dan makanannya masih hangat saat diterima.</p>
                    <div class="flex items-center mt-4">
                        <img src="{{ asset('images/human/budi.jpg') }}" alt="Default" class="w-8 h-8 rounded-full">
                        <span class="text-sm font-medium ml-2">Budi</span>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white p-5 rounded-xl shadow-md">
                    <p class="text-8xl text-green-600 leading-none">“</p>
                    <p class="text-sm mb-4">Sangat membantu, makanannya lezat dan bergizi. Terima kasih!</p>
                    <div class="flex items-center mt-4">
                        <img src="{{ asset('images/human/citra.jpg') }}" alt="Default" class="w-8 h-8 rounded-full">
                        <span class="text-sm font-medium ml-2">Citra</span>
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
                                    <img src="{{ asset('images/foods/nasi_goreng.png') }}" class="card-img-top" alt="Nasi Liwet" style="height: 200px; object-fit: cover;">
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
                                    <img src="{{ asset('images/foods/ayam_goreng.png') }}" class="card-img-top" alt="Ayam Goreng" style="height: 200px; object-fit: cover;">
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
                                    <img src="{{ asset('images/foods/kwetiau_goreng.png') }}" class="card-img-top" alt="Kwetiau Goreng" style="height: 200px; object-fit: cover;">
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
</x-app-layout>