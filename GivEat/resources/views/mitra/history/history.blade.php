<x-app-layout>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bukti Pemesanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</head >
    <body>
    <div class="container-fluid py-4" style="background: #FBFFFB; min-height: 100vh; padding: 30px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0" style="font-size: 1.5rem; font-weight: bold;">Riwayat Donasi</h1>
                <p class="text-muted mb-0" style="font-size: 0.875rem; color: #6c757d;">Lihat riwayat donasi makanan Anda</p>
            </div>
            <button id="printPdfBtn" dusk="export-pdf-button" class="btn rounded-pill px-4 fw-regular" style="background:#006837; color:#fff; border-radius:30px; font-weight:500; padding:0.5rem 1.25rem;">
                <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
            </button>
        </div>
        <div class="d-flex flex-wrap gap-2 mb-3">
            <a href="{{ route('mitra.history') }}"
                dusk="filter-semua"
                class="rounded-pill px-4 py-2 fw-regular shadow-sm"
                style="background:{{ request('status') == null ? '#006837' : '#fff' }}; color:{{ request('status') == null ? '#fff' : '#006837' }}; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border:none;">
                Semua Pesanan
            </a>
            <a href="{{ route('mitra.history', ['status' => 'done']) }}"
                class="rounded-pill px-4 py-2 fw-regular shadow-sm"
                dusk="filter-selesai"
                style="background:{{ request('status') == 'done' ? '#006837' : '#fff' }}; color:{{ request('status') == 'done' ? '#fff' : '#006837' }}; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border:none;">
                Pesanan Selesai
            </a>
            <a href="{{ route('mitra.history', ['status' => 'pending']) }}"
                class="rounded-pill px-4 py-2 fw-regular shadow-sm"
                dusk="filter-belum-diambil"
                style="background:{{ request('status') == 'pending' ? '#006837' : '#fff' }}; color:{{ request('status') == 'pending' ? '#fff' : '#006837' }}; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border:none;">
                Belum Diambil
            </a>
            <a href="{{ route('mitra.history', ['status' => 'not_taken']) }}"
                class="rounded-pill px-4 py-2 fw-regular shadow-sm"
                dusk="filter-tidak-diambil"
                style="background:{{ request('status') == 'not_taken' ? '#006837' : '#fff' }}; color:{{ request('status') == 'not_taken' ? '#fff' : '#006837' }}; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border:none;">
                Tidak Diambil
            </a>
        </div>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="historyTable" class="table align-middle mb-0">
                        <thead style="background: #f5faf7;">
                            <tr>
                                <th>No</th>
                                <th>Pesanan</th>
                                <th>Nama</th>
                                <th>Waktu Booking</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $i => $order)
                            <tr>
    <td>{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</td>
    <td>{{ $order->booking_code ?? ($order->donation->booking_code ?? '-') }}</td>
    <td>{{ $order->user->name ?? '-' }}</td>
    <td>{{ $order->claimed_at ? \Carbon\Carbon::parse($order->claimed_at)->format('H:i') : '-' }}</td>
    <td>{{ $order->claimed_at ? \Carbon\Carbon::parse($order->claimed_at)->format('d/m/Y') : '-' }}</td>
    <td>
        @if($order->status === 'pending')
            <span class="badge bg-warning bg-opacity-25 text-warning px-3 py-2" style="font-size: 0.75rem; font-weight: regular;">Belum Diambil</span>
        @elseif($order->status === 'done')
            <span class="badge bg-success bg-opacity-25 text-success px-3 py-2" style="font-size: 0.75rem; font-weight: regular;">Selesai</span>
        @elseif($order->status === 'not_taken')
            <span class="badge bg-danger bg-opacity-25 text-danger px-3 py-2" style="font-size: 0.75rem; font-weight: regular;">Tidak Diambil</span>
        @else
            <span class="badge bg-secondary bg-opacity-25 text-secondary px-3 py-2" style="font-size: 0.75rem; font-weight: regular;">-</span>
        @endif
    </td>
    <td>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm fw-bold px-3 py-2" style="background:#FBFFFB;color:#006837;border-radius:20px; border: 1px solid #006837;" data-bs-toggle="modal" data-bs-target="#historyModal-{{ $order->id }}">
            Detail & Ubah Status
        </button>
        <!-- Modal -->
        <div class="modal fade" id="historyModal-{{ $order->id }}" tabindex="-1" aria-labelledby="historyModalLabel-{{ $order->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius:18px;">
                    <div class="modal-header" style="background:#F5FAF7;border-radius:18px 18px 0 0;">
                        <h5 class="modal-title fw-bold" id="historyModalLabel-{{ $order->id }}">Detail Riwayat Donasi</h5>
                        <button type="button" class="btn-close" style="background-color:#006837;opacity:.7;border-radius:50%;" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 1.5rem 1.5rem 1rem 1.5rem;">
                        <div class="mb-3">
                            <div class="mb-2"><b>Kode Booking:</b> <span class="text-dark">{{ $order->booking_code ?? ($order->donation->booking_code ?? '-') }}</span></div>
                            <div class="mb-2"><b>Nama Penerima:</b> <span class="text-dark">{{ $order->user->name ?? '-' }}</span></div>
                            <div class="mb-2"><b>Waktu Booking:</b> <span class="text-dark">{{ $order->claimed_at ? \Carbon\Carbon::parse($order->claimed_at)->format('H:i') : '-' }}</span></div>
                            <div class="mb-2"><b>Tanggal Klaim:</b> <span class="text-dark">{{ $order->claimed_at ? \Carbon\Carbon::parse($order->claimed_at)->format('d/m/Y') : '-' }}</span></div>
                            <div class="mb-2"><b>Status:</b> 
                                @if($order->status === 'pending')
                                    <span class="badge bg-warning bg-opacity-25 text-warning px-3 py-2">Belum Diambil</span>
                                @elseif($order->status === 'done')
                                    <span class="badge bg-success bg-opacity-25 text-success px-3 py-2">Selesai</span>
                                @elseif($order->status === 'not_taken')
                                    <span class="badge bg-danger bg-opacity-25 text-danger px-3 py-2">Tidak Diambil</span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-25 text-secondary px-3 py-2">-</span>
                                @endif
                            </div>
                            <div class="mb-2"><b>Action:</b> <span class="text-dark">{{ $order->donation->action ?? '-' }}</span></div>
                            <div class="mb-2"><b>Deskripsi Donasi:</b> <span class="text-dark">{{ $order->donation->description ?? '-' }}</span></div>
                        </div>
                        <form id="statusForm-{{ $order->id }}" action="{{ route('mitra.history.update_status', $order->id) }}" method="POST">
    @csrf
    @method('PATCH')
                            <div class="mb-3">
                                <label for="statusSelect-{{ $order->id }}" class="form-label fw-semibold">Ubah Status</label>
                                <select class="form-select" id="statusSelect-{{ $order->id }}" name="status" style="border-radius:14px;border:1.5px solid #006837;" onchange="document.getElementById('statusForm-{{ $order->id }}').submit()">
                                    <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Selesai</option>
                                    <option value="not_taken" {{ $order->status == 'not_taken' ? 'selected' : '' }}>Tidak Diambil</option>
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data riwayat donasi.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center px-4 py-3 border-top">
                    <div class="text-muted">
                        Menampilkan <span class="fw-semibold">{{ $orders->firstItem() }}</span> sampai <span class="fw-semibold">{{ $orders->lastItem() }}</span> dari <span class="fw-semibold">{{ $orders->total() }}</span> data
                    </div>
                    <nav aria-label="Page navigation" style="margin: 0; padding: 0;">
                        <ul class="pagination mb-0" style="display: flex; padding-left: 0; list-style: none; margin: 0;">
                            {{-- Previous Page Link --}}
                            @if ($orders->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" style="margin: 0 2px;">
                                    <span class="page-link" aria-hidden="true" style="position: relative; display: block; padding: 0.5rem 0.9rem; margin-left: -1px; line-height: 1.25; color: #6c757d; background-color: #fff; border: 1px solid #dee2e6; border-radius: 4px; text-decoration: none;">&lsaquo;</span>
                                </li>
                            @else
                                <li class="page-item" style="margin: 0 2px;">
                                    <a class="page-link" href="{{ $orders->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="position: relative; display: block; padding: 0.5rem 0.9rem; margin-left: -1px; line-height: 1.25; color: #006837 !important; background-color: #fff; border: 1px solid #dee2e6; border-radius: 4px; text-decoration: none; transition: all 0.2s ease-in-out;">&lsaquo;</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                @if ($page == $orders->currentPage())
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
                            @if ($orders->hasMorePages())
                                <li class="page-item" style="margin: 0 2px;">
                                    <a class="page-link" dusk="next-page-link" href="{{ $orders->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="position: relative; display: block; padding: 0.5rem 0.9rem; margin-left: -1px; line-height: 1.25; color: #006837 !important; background-color: #fff; border: 1px solid #dee2e6; border-radius: 4px; text-decoration: none; transition: all 0.2s ease-in-out;">&rsaquo;</a>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Periksa apakah ada data di session
            @if(session('claim'))
            // Jika ada data session, simpan ke localStorage
            const sessionClaimData = {
                recipient: {
                    name: "{{ session('claim.recipient.name') }}",
                    address: "{{ session('claim.recipient.address') }}"
                },
                donation: {
                    claim_date: "{{ session('claim.donation.claim_date') }}",
                    booking_code: "{{ session('claim.donation.booking_code') }}",
                    food_name: "{{ session('claim.donation.food_name') ?? 'Makanan' }}"
                },
                slug: "{{ session('claim.donation.slug') ?? 'default-slug' }}",
                donation_id: "{{ session('claim.donation_id') ?? '' }}"
            };
            
            localStorage.setItem('claimData', JSON.stringify(sessionClaimData));
            
            // Tampilkan data dari session
            document.getElementById('recipientName').textContent = "{{ session('claim.recipient.name') }}";
            
            // Format tanggal dari session
            const sessionClaimDate = new Date("{{ session('claim.donation.claim_date') }}");
            const sessionFormattedDate = sessionClaimDate.getDate() + ' ' + 
                               new Intl.DateTimeFormat('id-ID', { month: 'long' }).format(sessionClaimDate) + ' ' + 
                               sessionClaimDate.getFullYear();
            document.getElementById('claimDate').textContent = sessionFormattedDate;
            
            document.getElementById('restaurantAddress').innerHTML = "{{ session('claim.recipient.address') }}";
            document.getElementById('bookingCode').textContent = "{{ session('claim.donation.booking_code') }}";
            
            @else
            // Jika tidak ada data session, coba ambil dari localStorage
            // TODO : Ganti setelah authentication sudah ada
            const claimDataString = localStorage.getItem('claimData');
            if (claimDataString) {
                const claimData = JSON.parse(claimDataString);
                
                // Tampilkan data pada elemen HTML
                document.getElementById('recipientName').textContent = claimData.recipient.name;
                
                // Format tanggal
                const claimDate = new Date(claimData.donation.claim_date);
                const formattedDate = claimDate.getDate() + ' ' + 
                                      new Intl.DateTimeFormat('id-ID', { month: 'long' }).format(claimDate) + ' ' + 
                                      claimDate.getFullYear();
                document.getElementById('claimDate').textContent = formattedDate;
                
                document.getElementById('restaurantAddress').innerHTML = claimData.recipient.address;
                document.getElementById('bookingCode').textContent = claimData.donation.booking_code;
            } else {
                console.error("Data klaim tidak ditemukan baik di session maupun localStorage");
                // Tetap tampilkan data placeholder jika tidak ada data
            }
            @endif
        });

        document.getElementById('printPdfBtn').addEventListener('click', function () {
    const element = document.querySelector('.card-body');
    
    // Sembunyikan kolom "Action" sebelum capture
    const actionTh = document.querySelector('th:nth-child(7)');
    const actionTds = document.querySelectorAll('td:nth-child(7)');
    const actionButtons = document.querySelectorAll('td:nth-child(7), th:nth-child(7)');

    // Simpan display lama
    const prevDisplays = [];
    actionButtons.forEach((el, i) => {
        prevDisplays[i] = el.style.display;
        el.style.display = 'none';
    });

    html2canvas(element).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jspdf.jsPDF('p', 'mm', 'a4');
        
        // Header dengan desain yang lebih menarik
        pdf.setFillColor(0, 104, 55); // Warna hijau GivEat
        pdf.rect(0, 0, pdf.internal.pageSize.getWidth(), 40, 'F');
        
        // Judul dengan styling yang lebih menarik
        pdf.setTextColor(255, 255, 255);
        pdf.setFont('helvetica', 'bold');
        pdf.setFontSize(24);
        pdf.text('Riwayat Donasi', pdf.internal.pageSize.getWidth() / 2, 20, { align: 'center' });
        
        // Subtitle
        pdf.setFontSize(12);
        pdf.text('GivEat Food Cycle', pdf.internal.pageSize.getWidth() / 2, 30, { align: 'center' });
        
        // Informasi tanggal dengan format yang lebih baik
        const today = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        pdf.setFontSize(10);
        pdf.text(`Dicetak pada: ${today.toLocaleDateString('id-ID', options)}`, pdf.internal.pageSize.getWidth() / 2, 35, { align: 'center' });
        
        // Tambahkan garis pemisah
        pdf.setDrawColor(245, 250, 247);
        pdf.setLineWidth(0.5);
        pdf.line(10, 45, pdf.internal.pageSize.getWidth() - 10, 45);
        
        // Konten tabel dengan margin yang lebih baik
        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth() - 20;
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
        pdf.addImage(imgData, 'PNG', 10, 50, pdfWidth, pdfHeight);
        
        // Footer dengan desain yang lebih menarik
        pdf.setFillColor(245, 250, 247);
        pdf.rect(0, pdf.internal.pageSize.getHeight() - 25, pdf.internal.pageSize.getWidth(), 25, 'F');
        
        // Informasi footer
        pdf.setTextColor(0, 104, 55);
        pdf.setFontSize(10);
        pdf.text('© ' + new Date().getFullYear() + ' GivEat Food Cycle', 15, pdf.internal.pageSize.getHeight() - 15);
        
        // Slogan
        pdf.setFontSize(8);
        pdf.text('Berbagi Makanan, Mengurangi Limbah Makanan', pdf.internal.pageSize.getWidth() - 15, pdf.internal.pageSize.getHeight() - 15, { align: 'right' });
        
        pdf.save("riwayat_donasi.pdf");

        // Kembalikan display kolom "Action"
        actionButtons.forEach((el, i) => {
            el.style.display = prevDisplays[i];
        });
    });
});
    </script>
</body>

</html>
</x-app-layout>