<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bukti Pemesanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
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
        <div class="logo">
            <img src="{{ asset('images\icon_claim_success.png') }}" alt="Logo">
        </div>
        <h1>Selamat Menikmati!</h1>
        <p class="subtext">Silahkan datang ke alamat yang tertera dan bawa bukti ini untuk mendapatkan makananmu</p>

        <div class="info-box">
            <div><span class="label">Nama Penerima</span><span class="value" id="recipientName">Hailey Williams</span></div>
            <div><span class="label">Tanggal Klaim</span><span class="value" id="claimDate">10 Oktober 2025</span></div>
            <div><span class="label">Alamat Restaurant</span><span class="value" id="restaurantAddress">Jl. Harapan Indah<br>No.23
                    Bandung</span></div>
            <div><span class="label">Kode Pemesanan</span><span class="value" id="bookingCode">ABCD12345</span></div>
            <button class="btn" id="printPdfBtn">Cetak PDF</button>
        </div>

        <form action="{{ route('donation.show', ['donation' => session('claim.donation_id') ?? 1]) }}" method="get">
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
            
            // Set link kembali ke halaman makanan
            document.getElementById('backToFoodLink').href = "{{ route('donation.show', ['donation' => session('claim.donation_id') ?? 1]) }}";
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
                
                // Set link kembali ke halaman makanan
                if (claimData.slug) {
                    document.getElementById('backToFoodLink').href = "/food/" + claimData.slug;
                }
            } else {
                console.error("Data klaim tidak ditemukan baik di session maupun localStorage");
                // Tetap tampilkan data placeholder jika tidak ada data
            }
            @endif
            
            // Tombol cetak PDF
            document.getElementById('printPdfBtn').addEventListener('click', function() {
                window.print();
            });
        });
    </script>
</body>

</html>