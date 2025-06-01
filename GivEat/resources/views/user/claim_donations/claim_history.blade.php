<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="relative mb-8">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-4 bg-white text-lg font-semibold text-gray-900 flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#006837]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span class="bg-clip-text text-transparent bg-[#006837] text-xl">
                        Riwayat Klaim Makanan
                    </span>
                </span>
            </div>
        </div>
        
        @if($claimHistory->isEmpty())
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-gray-50 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada riwayat klaim</h3>
                    <p class="text-gray-500">Anda belum mengklaim makanan apapun.</p>
                </div>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-green-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-dark uppercase tracking-wider text-center rounded-tl-xl">No</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-dark uppercase tracking-wider">Makanan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-dark uppercase tracking-wider">Restoran</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-dark uppercase tracking-wider">Kode Pemesanan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-dark uppercase tracking-wider">Tanggal Klaim</th>
                                <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-dark uppercase tracking-wider rounded-tr-xl text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($claimHistory as $index => $claim)
                                <tr class="hover:bg-gray-50 transition-all duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600 font-medium">
                                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-emerald-50 text-emerald-700">
                                            {{ $index + 1 }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-14 w-14 mr-4 overflow-hidden rounded-lg shadow-sm border border-gray-100">
                                                <img 
                                                    src="{{ $claim->donation->image ? asset('storage/' . $claim->donation->image) : asset('images/default_food.png') }}" 
                                                    alt="{{ $claim->donation->name }}" 
                                                    class="h-full w-full object-cover hover:scale-105 transition-transform duration-300"
                                                >
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">{{ $claim->donation->name }}</div>
                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ $claim->donation->portion }} porsi
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full bg-emerald-100 flex items-center justify-center mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $claim->donation->partner->name }}</div>
                                                <div class="text-xs text-gray-500">
                                                    {{ Str::limit($claim->donation->partner->address ?? 'Alamat tidak tersedia', 20) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="px-3 py-1.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-50 text-[#006837] border border-[#006837]">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                                {{ $claim->booking_code }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full bg-amber-50 flex items-center justify-center mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($claim->claimed_at)->format('d M Y') }}
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($claim->claimed_at)->format('H:i') }} WIB
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <button 
                                            type="button"
                                            dusk="print-pdf-button"
                                            onclick="handlePrintPDF(this, 
                                                '{{ auth()->user()->name }}',
                                                '{{ \Carbon\Carbon::parse($claim->claimed_at)->format('d F Y') }}',
                                                '{{ $claim->donation->partner->address ?? '-' }}',
                                                '{{ $claim->booking_code }}'
                                            )" 
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-[#006837] hover:from-green-600 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                            </svg>
                                            Cetak Bukti
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 bg-white border-t border-gray-100 rounded-b-xl">
                    <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                        <div class="text-sm text-gray-600">
                            Menampilkan 
                            <span class="font-semibold text-gray-800">{{ $claimHistory->firstItem() ?? 0 }}</span>
                            sampai 
                            <span class="font-semibold text-gray-800">{{ $claimHistory->lastItem() ?? 0 }}</span>
                            dari 
                            <span class="font-semibold text-gray-800">{{ $claimHistory->total() }}</span>
                            data
                        </div>
                        <div class="flex items-center space-x-2">
                            {{-- Previous Page Link --}}
                            @if ($claimHistory->onFirstPage())
                                <button disabled class="px-4 py-2 rounded-lg border border-gray-200 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                            @else
                                <a href="{{ $claimHistory->previousPageUrl() }}" class="px-4 py-2 rounded-lg border border-[#006837] bg-white text-sm font-medium text-[#006837] hover:bg-gray-50 hover:border-[#00552e] hover:text-[#00552e] transition-colors duration-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </a>
                            @endif

                            {{-- Page Numbers --}}
                            <div class="hidden sm:flex space-x-1">
                                @foreach ($claimHistory->getUrlRange(1, $claimHistory->lastPage()) as $page => $url)
                                    @if ($page == $claimHistory->currentPage())
                                        <span class="px-4 py-2 rounded-lg bg-green-50 border border-green-400 text-sm font-medium">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}" class="px-4 py-2 rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 text-sm font-medium">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>

                            {{-- Next Page Link --}}
                            @if ($claimHistory->hasMorePages())
                                <a href="{{ $claimHistory->nextPageUrl() }}" dusk="next-page-link" class="px-4 py-2 rounded-lg border border-[#006837] bg-white text-sm font-medium text-[#006837] hover:bg-gray-50 hover:border-[#00552e] hover:text-[#00552e] transition-colors duration-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @else
                                <button disabled class="px-4 py-2 rounded-lg border border-gray-200 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @push('scripts')
    <!-- Load jsPDF dari CDN yang berbeda -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        // Fungsi untuk menangani cetak PDF
        async function handlePrintPDF(buttonElement, recipientName, claimDate, restaurantAddress, bookingCode) {
            try {
                // Disable tombol sementara
                buttonElement.disabled = true;
                buttonElement.innerHTML = 'Membuat PDF...';
                
                // Tunggu sebentar untuk memastikan UI update
                await new Promise(resolve => setTimeout(resolve, 100));
                
                // Cek apakah jsPDF tersedia
                if (typeof window.jspdf !== 'undefined') {
                    const { jsPDF } = window.jspdf;
                    
                    // Buat dokumen PDF
                    const doc = new jsPDF();
                    
                    // Tambahkan konten
                    doc.setFontSize(22);
                    doc.setTextColor(33, 150, 83);
                    doc.text('BUKTI PEMESANAN GIVEAT', 105, 20, { align: 'center' });
                    
                    // Garis pemisah
                    doc.setDrawColor(33, 150, 83);
                    doc.setLineWidth(0.5);
                    doc.line(20, 30, 190, 30);
                    
                    // Informasi pesanan
                    doc.setFontSize(14);
                    doc.setTextColor(0, 0, 0);
                    doc.text('INFORMASI PESANAN', 20, 50);
                    
                    // Detail pesanan
                    doc.setFontSize(12);
                    doc.setTextColor(100, 100, 100);
                    doc.text('Nama Penerima:', 20, 65);
                    doc.text('Tanggal Klaim:', 20, 80);
                    doc.text('Alamat Restaurant:', 20, 95);
                    doc.text('Kode Pemesanan:', 20, 110);
                    
                    doc.setTextColor(0, 0, 0);
                    doc.setFont(undefined, 'bold');
                    doc.text(recipientName, 100, 65);
                    doc.text(claimDate, 100, 80);
                    doc.text(restaurantAddress, 100, 95);
                    doc.text(bookingCode, 100, 110);
                    
                    // Footer
                    doc.setDrawColor(33, 150, 83);
                    doc.setLineWidth(0.5);
                    doc.line(20, 250, 190, 250);
                    
                    doc.setFontSize(10);
                    doc.setTextColor(100, 100, 100);
                    doc.setFont(undefined, 'normal');
                    doc.text('Tunjukkan bukti pemesanan ini kepada pemilik restaurant.', 105, 260, { align: 'center' });
                    doc.text('© ' + new Date().getFullYear() + ' GivEat Food Cycle. All Rights Reserved.', 105, 270, { align: 'center' });
                    
                    // Simpan PDF
                    doc.save('bukti-pemesanan-' + bookingCode + '.pdf');
                } else {
                    throw new Error('Library PDF tidak tersedia');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Gagal membuat PDF: ' + error.message + '\nSilakan refresh halaman dan coba lagi.');
            } finally {
                // Reset tombol
                if (buttonElement) {
                    buttonElement.disabled = false;
                    buttonElement.innerHTML = 'Cetak PDF';
                }
            }
        }

        // Load event untuk memastikan jsPDF tersedia
        document.addEventListener('DOMContentLoaded', function() {
            console.log('jsPDF available:', typeof window.jspdf !== 'undefined');
        });
    </script>
    @endpush
</x-app-layout>