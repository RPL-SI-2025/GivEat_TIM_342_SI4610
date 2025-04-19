<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GivEat - Book Food</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    body {
        font-family: 'poppins', sans-serif;
        /* margin-left: 120px;
      margin-right: 120px; */
        margin: 0;
        /* padding: 0px, 120px; */
        background-color: #fff;
    }

    header,
    footer {
        padding: 20px 120px;
    }

    nav a {
        margin-right: 24px;
        text-decoration: none;
        color: black;
    }

    nav a.active {
        color: #16A34A;
        font-weight: bold;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header img {
        width: 100px;
    }

    .profile {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .profile img {
        border-radius: 50%;
        width: 36px;
        height: 36px;
        object-fit: cover;
    }

    .main-layout {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        /* padding: 20px 120px; */

    }

    .hero {
        width: 95%;
        height: 400px;
        margin: 10px 120px;
        position: relative;
        border-radius: 20px;
        overflow: hidden;

    }

    .hero img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* height: 72px; */
    }

    .badge {
        position: absolute;
        top: 16px;
        left: 16px;
        background: red;
        color: white;
        padding: 4px 12px;
        border-radius: 8px;
    }

    .timer {
        position: absolute;
        top: 16px;
        right: 16px;
        background: white;
        color: black;
        padding: 6px 10px;
        border-radius: 8px;
    }

    .content {
        width: 65%;
        padding: 20px;
        padding-left: 120px;
        padding-right: 40px;

    }

    .tags {
        display: flex;
        gap: 12px;
        margin: 16px 0;
    }

    .tags span {
        padding: 6px 12px;
        border-radius: 9999px;
    }

    .tag-makanan {
        background: #DCFCE7;
        color: #15803D;
    }

    .tag-minuman {
        background: #E0E7FF;
        color: #6366F1;
    }

    .info-boxes {
        width: 20%;
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .info-box {

        border: 1px solid #E5E7EB;
        border-radius: 12px;
        padding: 16px;
        flex: 1;
        text-align: center;
    }

    .info-box img {
        /* width: 36px; */
        height: 36px;
        object-fit: cover;
    }

    .ambil-button {
        width: 100%;
        font-family: 'poppins', sans-serif;
        padding: 20px 28px;
        background: #15803D;
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 16px;
        cursor: pointer;
    }

    .testimoni {
        padding: 20px 120px;
    }

    .lihat-lebih-banyak {
        margin-bottom: 20px;
        border-radius: 20px;
        text-align: center;
    }

    .testimoni-item {
        padding: 20px;
        background-color: #F5F7F9;
        margin-bottom: 20px;
        border-radius: 20px;
    }

    .user-info {

        padding: 5px;
        display: flex;
        align-items: center;
        gap: 12px;
        background-color: white;
        border-radius: 50px;
    }

    .user-info img {
        border-radius: 50%;
        width: 36px;
        height: 36px;
        object-fit: cover;
        background-color: #fff;
    }

    .lihat-lainnya {
        padding: 20px 120px;
    }

    .card-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;

    }

    .card {
        border: 1px solid #E5E7EB;
        border-radius: 12px;
        overflow: hidden;

        width: 200px;
        height: 300px
    }

    .card img {
        width: 100%;
        height: 60%;
        object-fit: cover;
    }

    .card-content {
        padding: 10px;
    }

    .card-content p {

        font-size: 14px;
        color: #6B7280;
        margin: 4px 0 0;
    }

    .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        border-radius: 8px;
        width: 300px;
    }

    .modal-content {
        text-align: center;
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 18px;
    }

    button {
        padding: 10px 20px;
        margin-top: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    footer {
        background: #14532D;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    footer img {
        width: 100px;
    }

    footer a {
        color: white;
        text-decoration: none;
        margin-right: 20px;
    }
    </style>


</head>

<body>
    <!-- @if(session('claim'))
    <pre>{{ print_r(session('claim'), true) }}</pre>
    @else
    <p>Session 'show_modal' tersedia.</p>
    @endif -->

    <!-- Header -->
    <header class="header">
        <img src="{{ asset('images/logo-giveat-hitam.png') }}" alt="Logo">
        <nav>
            <a href="#" class="active">Beranda</a>
            <a href="#">Forum</a>
            <a href="#">Berita</a>
            <a href="#">Persebaran</a>
            <a href="#">FAQ</a>
        </nav>
        <div class="profile">
            <span>Hailey Williams</span>
            <img src="{{ asset('images/profile-picture-1.jpg') }}" alt="Profile">
        </div>
    </header>

    <div class="main-layout">
        <div class="main-content">
            <div class="hero">
                <img src="{{ asset('images/sop-ayam.jpg') }}" alt="Sop Ayam">
                <span class="badge">Selamatkan segera</span>
                <span class="timer">⏰ 01:37:29</span>
            </div>

            <!-- Content -->
            <div class="content">
                <h2>{{ $donation->food_name }}</h2>
                <p>
                    {{  $donation->description}}
                </p>
                <p>🕒 Waktu pengambilan hari ini, 21.00 – 23.30</p>

                <!-- Tags -->
                <div class="tags">
                    <span class="tag-makanan">Makanan</span>
                    <span class="tag-minuman">Minuman</span>
                </div>

                <!-- Info -->
                <div class="info-boxes">
                    <div class="info-box">
                        <div style="font-size: 24px;">🍽️</div>
                        <div>{{ $donation->quantity }} Porsi Tersedia</div>
                    </div>
                    <div class="info-box">
                        <div style="font-size: 24px;">📍</div>
                        <div>Lokasi <br>
                            <a href="{{ $donation->location}}">
                                <img src=" {{ asset('images\gmaps.png') }}" alt=" Maps">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div id="modalCodeBooking" class="modal" style="display: none;">
                    <div class="modal-content" id="modalContent">
                        <span class="close-button">&times;</span>
                        <h2>Bukti Pemesanan</h2>
                        <p><strong>Nama Pengguna:</strong> <span
                                id="modalUser">{{ session('claim.recipient.name') }}</span></p>
                        <p><strong>Tanggal Klaim:</strong> <span
                                id="modalDate">{{ session('claim.donation.claim_date') ?? \Carbon\Carbon::now()->format('d M Y') }}</span>
                        </p>
                        <p><strong>Alamat:</strong> <span
                                id="modalAddress">{{ session('claim.recipient.address') ?? '-' }}</span></p>
                        <p><strong>Kode Booking:</strong> <span
                                id="modalCode">{{ session('claim.donation.booking_code') ?? 'ABC12345' }}</span></p>
                        <button id="printButton">Cetak PDF</button>
                    </div>
                </div>

                <!-- Button -->
                <form action="/claims" method="POST">
                    @csrf
                    <input type="text" name="donation_id" value="{{ $donation->id_donation }}" hidden>
                    <input type="text" name="donation" value="{{ $donation }}" hidden>
                    <button class="ambil-button">Ambil Makananmu</button>
                </form>

                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    @if(session('show_modal'))
                    const modal = document.getElementById('modalCodeBooking');
                    modal.style.display = 'block';
                    @endif

                    document.querySelector('.close-button').addEventListener('click', function() {
                        const modal = document.getElementById('modalCodeBooking');
                        modal.style.display = 'none';
                    });

                    window.addEventListener('click', function(event) {
                        const modal = document.getElementById('modalCodeBooking');
                        if (event.target === modal) {
                            modal.style.display = 'none';
                        }
                    });
                });

                // Cetak PDF dengan styling modern
                document.getElementById('printButton').addEventListener('click', async function() {
                    const {
                        jsPDF
                    } = window.jspdf; // Pastikan jsPDF sudah di-load
                    const doc = new jsPDF();

                    try {
                        // Muat gambar logo
                        const logoUrl = "{{ asset('images/LOGO GIVEAT 2.png') }}"; // URL logo
                        const logoResponse = await fetch(logoUrl);
                        if (!logoResponse.ok) {
                            throw new Error('Gagal memuat logo');
                        }
                        const logoBlob = await logoResponse.blob();
                        const logoDataUrl = await new Promise((resolve) => {
                            const reader = new FileReader();
                            reader.onload = () => resolve(reader.result);
                            reader.readAsDataURL(logoBlob);
                        });

                        // Tambahkan logo ke PDF
                        doc.addImage(logoDataUrl, 'PNG', 10, 10, 50, 20); // X, Y, Width, Height
                    } catch (error) {
                        console.error('Error memuat logo:', error);
                        alert('Gagal memuat logo. Pastikan file logo tersedia.');
                        return;
                    }

                    // Header
                    doc.setFontSize(20);
                    doc.setTextColor(40, 40, 40);
                    doc.text('Bukti Pemesanan', 105, 40, {
                        align: 'center'
                    });

                    // Garis pemisah
                    doc.setDrawColor(0, 0, 0);
                    doc.setLineWidth(0.5);
                    doc.line(10, 45, 200, 45);

                    // Informasi Pemesanan
                    doc.setFontSize(12);
                    doc.setTextColor(60, 60, 60);
                    doc.text('Nama Pengguna:', 10, 60);
                    doc.setFontSize(14);
                    doc.setTextColor(0, 0, 0);
                    doc.text('John Doe', 60, 60);

                    doc.setFontSize(12);
                    doc.setTextColor(60, 60, 60);
                    doc.text('Tanggal Klaim:', 10, 70);
                    doc.setFontSize(14);
                    doc.setTextColor(0, 0, 0);
                    doc.text('13 April 2025', 60, 70);

                    doc.setFontSize(12);
                    doc.setTextColor(60, 60, 60);
                    doc.text('Alamat:', 10, 80);
                    doc.setFontSize(14);
                    doc.setTextColor(0, 0, 0);
                    doc.text('Jl. Contoh Alamat No. 123', 60, 80);

                    doc.setFontSize(12);
                    doc.setTextColor(60, 60, 60);
                    doc.text('Kode Booking:', 10, 90);
                    doc.setFontSize(14);
                    doc.setTextColor(0, 0, 0);
                    doc.text('ABC12345', 60, 90);

                    // Footer
                    doc.setFontSize(10);
                    doc.setTextColor(100, 100, 100);
                    doc.text('Terima kasih telah menggunakan layanan kami.', 105, 290, {
                        align: 'center'
                    });

                    // Simpan file PDF
                    doc.save('bukti-pemesanan.pdf');
                });
                </script>

            </div>
        </div>

        <!-- Testimoni -->
        <div class="testimoni">
            <div class="testimoni-item">
                <div class="user-info">
                    <img src="{{ asset('images/profile-picture-1.jpg') }}" alt="User">
                    <strong>Hailey Williams</strong>
                </div>
                <p style="color: #9CA3AF;">03 Maret 2025</p>
                <p>⭐⭐⭐⭐⭐</p>
                <p>Makanannya sangat enak sekali, terimakasih semoga Tuhan membalas kebaikanmu</p>
            </div>
            <div class="testimoni-item">
                <div class="user-info">
                    <img src="{{ asset('images/profile-picture-1.jpg') }}" alt="User">
                    <strong>Jade Anne</strong>
                </div>
                <p style="color: #9CA3AF;">03 Maret 2025</p>
                <p>⭐⭐⭐⭐⭐</p>
                <p>Terimakasih banyak!</p>
            </div>
            <div class="testimoni-item">
                <div class="user-info">
                    <img src="{{ asset('images/profile-picture-1.jpg') }}" alt="User">
                    <strong>Henry McGee</strong>
                </div>
                <p style="color: #9CA3AF;">03 Maret 2025</p>
                <p>⭐⭐⭐⭐⭐</p>
                <p>Keren, teruslah berbuat baik!</p>
            </div>
            <div class="lihat-lebih-banyak">
                <a href="#" style="color: #6B7280; text-decoration: none;">Lihat lebih banyak</a>
            </div>
        </div>
    </div>



    <!-- Lihat Lainnya -->
    <div class="lihat-lainnya">
        <h3>Lihat Lainnya</h3>
        <div class="card-container">
            <div class="card">
                <img src="{{ asset('images/sop-ayam.jpg') }}" alt="Sop Ayam">
                <div class="card-content">
                    <strong>Sop Ayam dan Sayur</strong>
                    <p>🍽️ 10 Porsi · 30 menit yang lalu</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/ayam-goreng.jpg') }}" alt="Ayam Goreng">
                <div class="card-content">
                    <strong>Ayam Goreng</strong>
                    <p>🍽️ 20 Porsi · 35 menit yang lalu</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/sayur-asem.jpg') }}" alt="Sayur Asem">
                <div class="card-content">
                    <strong>Sayur Asem</strong>
                    <p>🍽️ 40 Porsi · 40 menit yang lalu</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/kwetiau.jpg') }}" alt="Kwetiau Goreng">
                <div class="card-content">
                    <strong>Kwetiau Goreng</strong>
                    <p>🍽️ 20 Porsi · 1 jam yang lalu</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div>
            <img src="{{ asset('images/logo-giveat-putih.png') }}" alt="Logo">
        </div>
        <div>
            <a href="#">Privacy Policy</a>
            <a href="#">Hubungi Kami</a>
        </div>
        <div>© 2025 GivEat Food Cycle. All Rights Reserved.</div>
    </footer>
</body>

</html>