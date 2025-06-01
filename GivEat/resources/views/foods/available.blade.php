<x-app-layout>
    <div class="container p-5">
        <div class="flex items-center justify-between mb-8">
            <!-- Tombol Kembali -->
            <a href="{{ route('dashboard') }}" class="btn" style="background-color:rgb(233, 255, 245); border: 1px solid #006837; color: #006837; border-radius: 20px; padding: 8px 20px;">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
            
            <!-- Judul -->
            <div class="flex-1 text-center">
                <span class="text-lg font-semibold">
                    <span class="bg-clip-text text-transparent bg-[#006837] text-xl">
                        Siap Makan Hari Ini
                    </span>
                </span>
            </div>
            
            <!-- Spacer untuk keseimbangan layout -->
            <div class="w-32"></div>
        </div>
        <!-- Siap Makan Hari Ini -->
        <div class="siap-makan">
            <div class="grid-foods">
                @forelse($availableDonations as $donation)
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
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            Saat ini tidak ada makanan yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $availableDonations->links() }}
            </div>
        </div>
    </div>

    <style>
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
</x-app-layout>
