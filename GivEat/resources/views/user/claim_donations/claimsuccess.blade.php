<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bukti Pemesanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Plus Jakarta Sans', Arial, sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: url("{{ asset('images/success_bg.png') }}") no-repeat center center;
        background-size: cover;
        color: white;
        text-align: center;
        padding: 20px;
    }

    .container {
        max-width: 500px;
    }

    .logo {
        width: 150px;
        height: 150px;
        justify-content: center;
        align-items: center;
        display: flex;
        margin: 0 auto 10px auto;
    }

    .logo img {
        width: 100%;

    }

    h1 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    p.subtext {
        font-size: 14px;
        margin-bottom: 30px;
    }

    .info-box {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 20px;
        text-align: right;
        margin-bottom: 20px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .info-box div {
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
    }

    .label {
        color: #cbd5e1;
    }

    .value {
        font-weight: 600;
        color: #ffffff;
    }

    .btn {
        background-color: white;
        color: #047857;
        padding: 10px 20px;
        border-radius: 20px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        height: 40px;
        width: 100%;
    }

    .back-btn {
        background-color: #71F279;
        color: #064e3b;
        border: 2px solid #C0F39E;
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 600;
        width: 100%;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo" style="margin-bottom: 18px; display: flex; justify-content: center; align-items: center;">
    <img src="{{ asset('images/icon_claim_success.png') }}" alt="Logo" style="width: 110px; height: 110px;">
</div>
<h1 style="margin-bottom: 10px;">Selamat Menikmati!</h1>
<p class="mb-3" style="color: white; font-size: 16px; padding: 0 20px; margin-bottom: 24px;">Terima kasih telah mengklaim makanan. Silakan datang ke lokasi untuk mengambil makanan Anda sesuai waktu yang ditentukan.</p>
@php
    $claim = \App\Models\ClaimTransaction::where('donation_id', $donation->id)->where('user_id', auth()->id())->latest()->first();
@endphp
@if($claim)
    <div style="background:rgba(255,255,255,0.12); border-radius:14px; color:#fff; font-weight:600; padding:14px 0; margin:0 auto 18px auto; max-width:340px; text-align:center; border:1.5px solid #b4f1c1; font-size:17px; letter-spacing:1px;">
        Kode Pemesanan Anda: <strong>{{ $claim->booking_code }}</strong>
    </div>
@endif


        <div class="info-box">
    @php
        $claim = \App\Models\ClaimTransaction::where('donation_id', $donation->id)
            ->where('user_id', auth()->id())
            ->latest()->first();
    @endphp
    <div><span class="label">Nama Penerima</span><span class="value" id="recipientName">{{ auth()->user()->name }}</span></div>
    <div><span class="label">Tanggal Klaim</span><span class="value" id="claimDate">{{ $claim ? \Carbon\Carbon::parse($claim->claimed_at)->translatedFormat('d F Y') : '-' }}</span></div>
    <div><span class="label">Alamat Restaurant</span><span class="value" id="restaurantAddress">{{ $donation->partner->address ?? '-' }}</span></div>
    <div><span class="label">Kode Pemesanan</span><span class="value" id="bookingCode">{{ $claim->booking_code ?? '-' }}</span></div>
    <button class="btn" id="printPdfBtn">Cetak PDF</button>
</div>

        <form action="{{ route('dashboard') }}" method="get">
            <button class="back-btn" type="submit">Kembali ke Beranda</button>
        </form>
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
            
            // Tombol cetak PDF
            const printPdfBtn = document.getElementById('printPdfBtn');
            if (printPdfBtn) {
                printPdfBtn.addEventListener('click', function() {
                    try {
                        const { jsPDF } = window.jspdf;
                        const doc = new jsPDF();
                        
                        // Ambil data dari halaman (dengan pengecekan elemen)
                        const recipientNameEl = document.getElementById('recipientName');
                        const claimDateEl = document.getElementById('claimDate');
                        const restaurantAddressEl = document.getElementById('restaurantAddress');
                        const bookingCodeEl = document.getElementById('bookingCode');
                        
                        if (!recipientNameEl || !claimDateEl || !restaurantAddressEl || !bookingCodeEl) {
                            console.error('Beberapa elemen tidak ditemukan', { 
                                recipientNameEl, claimDateEl, restaurantAddressEl, bookingCodeEl 
                            });
                            alert('Terjadi kesalahan saat membuat PDF. Mencoba metode alternatif...');
                            window.print();
                            return;
                        }
                        
                        const recipientName = recipientNameEl.textContent;
                        const claimDate = claimDateEl.textContent;
                        const restaurantAddress = restaurantAddressEl.innerHTML
                            .replace(/<br>/g, ' '); // Mengganti <br> dengan spasi
                        const bookingCode = bookingCodeEl.textContent;
                        
                        // Coba tambahkan logo
                        const logoUrl = "{{ asset('images/logo-giveat-hitam.png') }}";
                        
                        // Fungsi untuk melanjutkan pembuatan PDF
                        function continueWithPdf(hasLogo = false, logoData = null) {
                            // Setting dokumen
                            if (hasLogo && logoData) {
                                try {
                                    doc.addImage(logoData, 'PNG', 75, 20, 60, 30);
                                    // Judul sedikit turun karena ada logo
                                    doc.setFontSize(22);
                                    doc.setTextColor(33, 150, 83);
                                    doc.text('BUKTI PEMESANAN', 105, 65, { align: 'center' });
                                } catch(e) {
                                    console.error('Error saat menambahkan logo:', e);
                                    // Jika gagal, buat judul tanpa logo
                                    doc.setFontSize(22);
                                    doc.setTextColor(33, 150, 83);
                                    doc.text('BUKTI PEMESANAN GIVEAT', 105, 20, { align: 'center' });
                                }
                            } else {
                                // Tanpa logo
                                doc.setFontSize(22);
                                doc.setTextColor(33, 150, 83);
                                doc.text('BUKTI PEMESANAN GIVEAT', 105, 20, { align: 'center' });
                            }
                            
                            // Garis pemisah
                            const lineY = hasLogo ? 90 : 40;
                            doc.setDrawColor(33, 150, 83);
                            doc.setLineWidth(0.5);
                            doc.line(20, lineY, 190, lineY);
                            
                            // Info penerima
                            const startY = hasLogo ? lineY + 20 : lineY + 20;
                            doc.setFontSize(14);
                            doc.setTextColor(0, 0, 0);
                            doc.text('INFORMASI PESANAN', 20, startY);
                            
                            doc.setFontSize(12);
                            doc.setTextColor(100, 100, 100);
                            doc.text('Nama Penerima:', 20, startY + 15);
                            doc.text('Tanggal Klaim:', 20, startY + 30);
                            doc.text('Alamat Restaurant:', 20, startY + 45);
                            doc.text('Kode Pemesanan:', 20, startY + 60);
                            
                            doc.setTextColor(0, 0, 0);
                            doc.setFont(undefined, 'bold');
                            doc.text(recipientName, 100, startY + 15);
                            doc.text(claimDate, 100, startY + 30);
                            doc.text(restaurantAddress, 100, startY + 45);
                            doc.text(bookingCode, 100, startY + 60);
                            
                            // Footer
                            doc.setDrawColor(33, 150, 83);
                            doc.setLineWidth(0.5);
                            doc.line(20, 250, 190, 250);
                            
                            doc.setFontSize(10);
                            doc.setTextColor(100, 100, 100);
                            doc.setFont(undefined, 'normal');
                            doc.text('Tunjukkan bukti pemesanan ini kepada pemilik restaurant.', 105, 260, { align: 'center' });
                            doc.text('© 2023 GivEat Food Cycle. All Rights Reserved.', 105, 270, { align: 'center' });
                            
                            // Simpan dokumen
                            doc.save('bukti-pemesanan-' + bookingCode + '.pdf');
                        }
                        
                        // Coba load gambar logo
                        fetch(logoUrl)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Logo tidak ditemukan');
                                }
                                return response.blob();
                            })
                            .then(blob => {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    continueWithPdf(true, e.target.result);
                                }
                                reader.readAsDataURL(blob);
                            })
                            .catch(error => {
                                console.error('Error loading logo:', error);
                                continueWithPdf(false);
                            });
                    } catch (error) {
                        console.error('Error generating PDF:', error);
                        alert('Gagal membuat PDF. Silakan coba metode print.');
                        // Fallback ke print jika jsPDF gagal
                        window.print();
                    }
                });
            } else {
                console.error("Tombol cetak PDF tidak ditemukan!");
            }
        });
    </script>
</body>

</html>