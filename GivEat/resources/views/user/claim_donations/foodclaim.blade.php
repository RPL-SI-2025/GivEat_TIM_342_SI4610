<x-app-layout>
    <style>
    body {
        font-family: 'Plus Jakarta Sans', Arial, sans-serif;
        margin: 0;
        background-color: #ffffff;
    }
    .testimoni {
        border-radius: 18px;
        padding: 32px 24px;
        margin-top: 32px;
    }
    .testimoni-item {
        background: transparent;
        /* review card tetap transparan agar hanya wrapper testimoni yang abu-abu */
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
    .main-content {
        width: 100%;
    }

    .hero {
        width: 95%;
        height: 400px;
        margin: 50px 120px 5px 120px;
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
        top: 20px;
        background: #E4283D;
        color: white;
        border-radius: 0px 8px 8px 0px;
        font-size: 1em;
        line-height: 35px;
        text-align: center;
        padding: 0 12px;
        font-weight: 500;
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
        width: 100%;
        padding: 20px;
        padding-left: 120px;
        padding-right: 40px;
    }
    .donation-title {
        font-weight: bold;
        font-size: 2.2rem;
        color: #2d2d2d;
        letter-spacing: 1.5px;
        margin-bottom: 0.5em;
    }
    .donation-description {
        font-size: 1.2rem;
        color: #6B7280;
        margin-bottom: 1em;
        width: 100%;
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
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        width: 100%;
    }

    .info-box {
        width: 120px;
        border: 1px solid #E5E7EB;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
        align-items: center;
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
        gap: 12x;
        background-color: white;
        border-radius: 50px;
        width: 60%;
    }

    .user-info img {
        border-radius: 50%;
        width: 36px;
        height: 36px;
        object-fit: cover;
        margin-right: 12px;
        background-color: #fff;
    }

    .lihat-lainnya {
        padding: 20px 120px;
    }

    .lihat-lainnya h3 {
        font-size: 20px;
        font-weight : bold;
        padding-bottom: 20px;
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
        background-color: #71F279;
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
    <div class="container">
        <!-- Hero -->
        <div class="main-layout">
            <div class="main-content">
                <div class="hero">
                    <img src="{{ $donation->image ? asset('storage/' . $donation->image) : asset('images/foods/default.png') }}" alt="{{ $donation->name }}">
                    <span class="badge" style="font-size:1em;vertical-align:middle;margin-right:10px;">Selamatkan segera</span>
                    <span class="timer"><i class="bi bi-stopwatch" style="font-size:1.2em;vertical-align:middle;margin-right:6px;"></i><span id="countdown" data-pickup="{{ $donation->pickup_time }}"></span></span>
<script>
    function startCountdown() {
        const countdown = document.getElementById('countdown');
        const pickupTime = countdown.getAttribute('data-pickup');
        if (!pickupTime) { countdown.innerText = '-'; return; }
        const pickupDate = new Date(pickupTime.replace(' ', 'T'));
        function updateCountdown() {
            const now = new Date();
            let diff = pickupDate - now;
            if (diff <= 0) {
                countdown.innerText = 'Selesai';
                return;
            }
            const hours = Math.floor(diff / (1000 * 60 * 60));
            diff -= hours * (1000 * 60 * 60);
            const minutes = Math.floor(diff / (1000 * 60));
            diff -= minutes * (1000 * 60);
            const seconds = Math.floor(diff / 1000);
            countdown.innerText = `${hours}j ${minutes}m ${seconds}d`;
            setTimeout(updateCountdown, 1000);
        }
        updateCountdown();
    }
    document.addEventListener('DOMContentLoaded', startCountdown);
</script>
untdown" data-pickup="{{ $donation->pickup_time }}"></span></span>
<script>
    function startCountdown() {
        const countdown = document.getElementById('countdown');
        const pickupTime = countdown.getAttribute('data-pickup');
        if (!pickupTime) { countdown.innerText = '-'; return; }
        const pickupDate = new Date(pickupTime.replace(' ', 'T'));
        function updateCountdown() {
            const now = new Date();
            let diff = pickupDate - now;
            if (diff <= 0) {
                countdown.innerText = 'Selesai';
                return;
            }
            const hours = Math.floor(diff / (1000 * 60 * 60));
            diff -= hours * (1000 * 60 * 60);
            const minutes = Math.floor(diff / (1000 * 60));
            diff -= minutes * (1000 * 60);
            const seconds = Math.floor(diff / 1000);
            countdown.innerText = `${hours}j ${minutes}m ${seconds}d`;
            setTimeout(updateCountdown, 1000);
        }
        updateCountdown();
    }
    document.addEventListener('DOMContentLoaded', startCountdown);
</script>
                </div>

                <!-- Content -->
                <div class="content">
                    <h2 class="donation-title">{{ $donation->name }}</h2>
                    <p class="donation-description">
                        {{ $donation->description }}
                    </p>
                    <p><i class="bi bi-clock me-2"></i>Waktu pengambilan hari ini, {{ $donation->pickup_time ? \Carbon\Carbon::parse($donation->pickup_time)->format('H:i') : '' }}</p>

                    <!-- Tags -->
                    <div class="tags">
    @if($donation->category && isset($donation->category->name))
        @php
            $cat = strtolower($donation->category->name);
        @endphp
        @if(str_contains($cat, 'makanan'))
            <span class="tag-makanan">{{ $donation->category->name }}</span>
        @elseif(str_contains($cat, 'minuman'))
            <span class="tag-minuman">{{ $donation->category->name }}</span>
        @else
            <span class="badge">{{ $donation->category->name }}</span>
        @endif
    @endif
</div>
<!-- Info -->
<div class="info-boxes">
    <div class="info-box">
        <div style="font-size: 30px;">🍽️</div>
        <div style="font-size: 14px;">Porsi Tersedia</div>
        <div style="font-size: 30px; font-weight: bold;">{{ $donation->portion }} </div>
    </div>
    <div class="info-box">
        <div style="font-size: 30px;">📍</div>
        <div style="font-size: 14px;">Lokasi</div>
        <img src="{{ asset('images/gmaps.png') }}" style="width: 100%; height: auto; object-fit: contain; padding-top: 20px;" alt="Maps">
    </div>
</div>
<!-- Ambil Makanan Button -->
@if(session('error'))
            <div class="alert alert-danger mt-3">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        <form action="{{ route('claim.food.store', $donation->id) }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-success btn-lg" style="background:#15803D; border-radius:2em; font-weight:600; font-size:1rem; padding:0.75em 0; width: 60%;"
                @if($donation->status !== 'available' || $donation->portion < 1) disabled @endif>
                Ambil Makanan
            </button>
        </form>
                </div>
            </div>
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
                @forelse ($otherDonations as $other)
                    <a href="{{ route('claim.food', $other->id) }}" class="card" style="text-decoration: none; color: inherit;">
                        <img src="{{ $other->image ? asset('storage/' . $other->image) : asset('images/foods/default.png') }}" alt="{{ $other->name }}">
                        <div class="card-content">
                            <strong>{{ $other->name }}</strong>
                            <p><i class="bi bi-cup-hot" style="margin-right:6px;"></i>{{ $other->portion }} Porsi</p>
<p><i class="bi bi-stopwatch" style="margin-right:6px;"></i>{{ $other->pickup_time ? \Carbon\Carbon::parse($other->pickup_time)->diffForHumans() : '' }}</p>
                        </div>
                    </a>
                @empty
                    <div class="card-content">Tidak ada menu lain tersedia.</div>
                @endforelse
            </div>
        </div>
</x-app-layout>