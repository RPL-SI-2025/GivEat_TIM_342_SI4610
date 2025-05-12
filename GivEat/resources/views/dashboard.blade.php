<x-app-layout>
    <main class="container p-5">
        <!-- Banner -->
        <div class="banner-container mb-5">
            <img src="{{ asset('images/banner/banner.png') }}" alt="Banner" class="banner-image" />
        </div>

        <!-- Top Restaurants -->
        <div class="top-restaurants mb-5">
            <div class="header d-flex justify-content-between align-items-center">
                <h1 class="text-2xl font-bold"><b>Top Restaurant</b></h1>
                <a href="#" class="view-more text-secondary">Lihat Selengkapnya</a>
            </div>
            <div class="scroll-container-wrapper">
                <div class="scroll-container">
                    @php
                        $restaurants = ['cheffest', 'bistro', 'dapur', 'resto1', 'resto2', 'selera'];
                    @endphp

                    @for ($i = 0; $i < 3; $i++) {{-- Gandakan isi agar animasi mulus --}}
                        @foreach ($restaurants as $restaurant)
                            <div class="restaurant-btn">
                                <img src="{{ asset("images/restaurants/{$restaurant}.png") }}" alt="{{ ucfirst($restaurant) }}" />
                                <p class="restaurant-name">{{ ucfirst($restaurant) }}</p>
                            </div>
                        @endforeach
                    @endfor
                </div>
            </div>
        </div>

        <!-- Siap Makan Hari Ini -->
        <div class="siap-makan">
            <div class="header d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-2xl font-bold"><b>Siap Makan Hari Ini</b></h1>
                <a href="#" class="view-more text-secondary">Lihat Selengkapnya</a>
            </div>
            <div class="grid-foods">
                @foreach ($availableDonations as $donation)
                    <div class="food-card">
                        <div class="food-image-container">
                            <div class="tersisa-badge">Tersisa {{ $donation->portion }}</div>
                            <img src="{{ $donation->image ? asset('storage/' . $donation->image) : asset('images/foods/default.png') }}" 
                                alt="{{ $donation->name }}" 
                                class="food-image" />
                        </div>
                        <div class="food-info">
                            <h3 class="food-name">{{ $donation->name }}</h3>
                            <div class="food-details">
                                <div class="meta-info">
                                <div class="portion">
                                        <i class="bi bi-cup-hot me-2"></i>
                                        {{ $donation->portion }} Porsi
                                    </div>
                                    <div class="time" id="timer-{{ $donation->id }}" data-pickup-time="{{ $donation->pickup_time }}">
                                        <i class="bi bi-clock me-2"></i>
                                        <span>{{ $donation->pickup_time ? \Carbon\Carbon::parse($donation->pickup_time)->diffForHumans() : '' }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('claim.food', $donation->id) }}" 
                                   class="btn btn-primary w-100 mt-3 pick-hover">
                                    <i class="bi bi-cart-plus me-2"></i>Ambil
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="news-card">
                    <div class="header d-flex justify-content-between align-items-center mb-4 mt-5">
                <h1 class="text-2xl font-bold"><b>Ada Apa Hari Ini</b></h1>
                <a href="#" class="view-more text-secondary">Lihat Selengkapnya</a>
            </div>
            <a href="{{ route('berita.index') }}">
                <img src="{{ asset('images/news.png') }}" alt="News 1" class="news-image" />
            </a>
                    </div>
    </main>
    <style>
        pick-hover:hover, pick-hover:focus {
            background-color: #003F21 !important;
            color: #fff !important;
            border-color: #003F21 !important;
            filter: none !important;
            box-shadow: none !important;
        }

        /* News Image */
        .news-image {
            width: 100%;
            border-radius: 10px; /* Optional: to match banner style */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Optional: to match banner style */
        }

        /* Banner */
        .banner-container img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Top Restaurants Section */
        .top-restaurants .header {
            margin-bottom: 20px;
        }

        .scroll-container-wrapper {
            overflow: hidden;
            position: relative;
            width: 100%;
            padding: 20px 0;
        }

        .scroll-container {
            display: flex;
            gap: 20px;
            width: max-content;
            animation: scroll 30s linear infinite;
        }

        .restaurant-btn {
            text-align: center;
            flex-shrink: 0;
            width: 150px;
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .restaurant-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .restaurant-btn img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .restaurant-name {
            font-weight: bold;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Food Cards */
        .grid-foods {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .food-card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .food-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .food-image-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .food-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .food-info {
            padding: 15px;
        }

        .food-name {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .food-details {
            font-size: 0.9rem;
            color: #666;
        }

        .time-portion .icon-text {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }

        .time-portion .icon-text svg {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            fill: #FF6F61;
        }

        /* Button "Lihat Selengkapnya" */
        .view-more {
            font-size: 0.9rem;
            font-weight: regular;
            color: #FF6F61;
            text-decoration: none;
        }

        .view-more:hover {
            text-decoration: underline;
        }

        /* Animation for scrolling */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-33.33%);
            }
        }
    </style>
    <style>
        .grid-foods {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 24px;
        }

        .food-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        gap: 24px;
    }

    .food-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .food-image-container {
        position: relative;
        height: 180px;
    }

    .tersisa-badge {
        position: absolute;
        top: 12px;
        background: #FF4B4B;
        color: white;
        padding: 4px 12px;
        border-radius: 0px 20px 20px 0px;
        font-size: 14px;
        font-weight: 500;
        z-index: 1;
    }

    .food-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .food-info {
        padding: 16px;
    }

    .food-name {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #1A1A1A;
    }

    .meta-info {
        font-size: 14px;
        color: #666;
        margin-bottom: 16px;
    }

    .time, .portion {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
    }

    .btn-primary {
        background: #006837;
        border: none;
        padding: 10px;
        font-weight: 500;
        border-radius: 8px;
    }

    .btn-primary:hover {
        background: #005229;
        transform: translateY(-2px);
    }

    .view-more {
        font-size: 14px;
        text-decoration: none;
        color: #006837;
    }

    .view-more:hover {
        text-decoration: underline;
        color: #005229;
    }
</style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timers = document.querySelectorAll('.time[data-pickup-time]');

            timers.forEach(timerElement => {
                const pickupTimeStr = timerElement.dataset.pickupTime;
                if (!pickupTimeStr) return;

                const pickupDate = new Date(pickupTimeStr.replace(/-/g, '/'));
                let intervalId = null; 

                function updateTimer() {
                    const now = new Date();
                    const diff = pickupDate - now;

                    if (diff <= 0) {
                        timerElement.querySelector('span').textContent = 'Waktu habis';
                        const card = timerElement.closest('.food-card');
                        if (card) {
                            card.style.display = 'none'; // Hide the card
                        }
                        if (intervalId) clearInterval(intervalId);
                        return;
                    }

                    const hours = Math.floor(diff / (1000 * 60 * 60));
                    const minutes = Math.floor((diff / (1000 * 60)) % 60);
                    const seconds = Math.floor((diff / 1000) % 60);

                    timerElement.querySelector('span').textContent =
                        `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')} Tersisa`;
                }

                intervalId = setInterval(updateTimer, 1000);
                updateTimer(); 
            });
        });
    </script>
</x-app-layout>
