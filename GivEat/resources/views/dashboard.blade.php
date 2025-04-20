<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Giveat - Siap Makan Hari Ini</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('images/logo1.png') }}" alt="GiveAt Logo" />
    </div>
    <nav>
        <a href="#" class="active">Beranda</a>
        <a href="#">Forum</a>
        <a href="#">Berita</a>
        <a href="#">Persebaran</a>
        <a href="#">FAQ</a>
    </nav>
    <div class="user-profile">
        <span>Hailey Williams</span>
        <img src="{{ asset('images/user.png') }}" alt="User Profile" />
    </div>
</header>

<main class="container">
    <!-- Banner -->
    <div class="banner-container">
        <img src="{{ asset('images/banner/banner.png') }}" alt="Banner" class="banner-image" />
    </div>

    <!-- Top Restaurants -->
    <div class="top-restaurants">
        <div class="header">
            <h2>Top Restaurant</h2>
            <a href="#" class="view-more">Lihat Selengkapnya</a>
        </div>
        <div class="scroll-container-wrapper">
            <div class="scroll-container">
                <!-- Daftar Asli -->
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/cheffest.png') }}" alt="Cheffest" />
                    <p>Cheffest</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/bistro.png') }}" alt="Bistro" />
                    <p>Bistro</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/dapur.png') }}" alt="Dapur" />
                    <p>Dapur Keluarga</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/resto1.png') }}" alt="Resto 1" />
                    <p>Resto 1</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/resto2.png') }}" alt="Resto 2" />
                    <p>Resto 2</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/selera.png') }}" alt="Selera" />
                    <p>Selera Bersama</p>
                </div>
                <!-- Duplikat untuk efek infinite -->
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/cheffest.png') }}" alt="Cheffest" />
                    <p>Cheffest</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/bistro.png') }}" alt="Bistro" />
                    <p>Bistro</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/dapur.png') }}" alt="Dapur" />
                    <p>Dapur Keluarga</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/resto1.png') }}" alt="Resto 1" />
                    <p>Resto 1</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/resto2.png') }}" alt="Resto 2" />
                    <p>Resto 2</p>
                </div>
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/selera.png') }}" alt="Selera" />
                    <p>Selera Bersama</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Siap Makan Hari Ini -->
    <div class="siap-makan">
        <div class="header">
            <h2>Siap Makan Hari Ini</h2>
            <a href="#" class="see-more">Lihat Selengkapnya</a>
        </div>
        <div class="grid-foods">
            <!-- Sop Ayam dan Sayur -->
            <div class="food-card">
                <div class="food-image-container">
                    <img src="{{ asset('images/foods/sop_ayam_sayur.png') }}" alt="Sop Ayam dan Sayur" class="food-image" />
                    <div class="label-red-small">Tersisa 5</div>
                </div>
                <div class="food-info">
                    <div class="food-name">Sop Ayam dan Sayur</div>
                    <div class="food-details">
                        <div class="time-portion">
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>30 menit</span>
                            </div>
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"></path>
                                </svg>
                                <span>5 porsi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ayam Goreng -->
            <div class="food-card">
                <div class="food-image-container">
                    <img src="{{ asset('images/foods/ayam_goreng.png') }}" alt="Ayam Goreng" class="food-image" />
                    <div class="label-red-small">Tersisa 5</div>
                </div>
                <div class="food-info">
                    <div class="food-name">Ayam Goreng</div>
                    <div class="food-details">
                        <div class="time-portion">
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>20 menit</span>
                            </div>
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"></path>
                                </svg>
                                <span>5 porsi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sayur Asem -->
            <div class="food-card">
                <div class="food-image-container">
                    <img src="{{ asset('images/foods/sayur_asem.png') }}" alt="Sayur Asem" class="food-image" />
                </div>
                <div class="food-info">
                    <div class="food-name">Sayur Asem</div>
                    <div class="food-details">
                        <div class="time-portion">
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>35 menit</span>
                            </div>
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"></path>
                                </svg>
                                <span>5 porsi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kwetiau Goreng -->
            <div class="food-card">
                <div class="food-image-container">
                    <img src="{{ asset('images/foods/kwetiau_goreng.png') }}" alt="Kwetiau Goreng" class="food-image" />
                </div>
                <div class="food-info">
                    <div class="food-name">Kwetiau Goreng</div>
                    <div class="food-details">
                        <div class="time-portion">
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>20 menit</span>
                            </div>
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"></path>
                                </svg>
                                <span>5 porsi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sate Ayam -->
            <div class="food-card">
                <div class="food-image-container">
                    <img src="{{ asset('images/foods/sate_ayam.png') }}" alt="Sate Ayam" class="food-image" />
                    <div class="label-red-small">Tersisa 5</div>
                </div>
                <div class="food-info">
                    <div class="food-name">Sate Ayam</div>
                    <div class="food-details">
                        <div class="time-portion">
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>1 Jam</span>
                            </div>
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"></path>
                                </svg>
                                <span>5 porsi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sop Udang -->
            <div class="food-card">
                <div class="food-image-container">
                    <img src="{{ asset('images/foods/sop_udang.png') }}" alt="Sop Udang" class="food-image" />
                    <div class="label-red-small">Tersisa 5</div>
                </div>
                <div class="food-info">
                    <div class="food-name">Sop Udang</div>
                    <div class="food-details">
                        <div class="time-portion">
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>1 Jam</span>
                            </div>
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"></path>
                                </svg>
                                <span>5 porsi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ketoprak -->
            <div class="food-card">
                <div class="food-image-container">
                    <img src="{{ asset('images/foods/ketoprak.png') }}" alt="Ketoprak" class="food-image" />
                </div>
                <div class="food-info">
                    <div class="food-name">Ketoprak</div>
                    <div class="food-details">
                        <div class="time-portion">
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>2 Jam</span>
                            </div>
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"></path>
                                </svg>
                                <span>5 porsi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Nasi Goreng -->
            <div class="food-card">
                <div class="food-image-container">
                    <img src="{{ asset('images/foods/nasi_goreng.png') }}" alt="Nasi Goreng" class="food-image" />
                    <div class="label-red-small">Tersisa 5</div>
                </div>
                <div class="food-info">
                    <div class="food-name">Nasi Goreng</div>
                    <div class="food-details">
                        <div class="time-portion">
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span>2 Jam</span>
                            </div>
                            <div class="icon-text">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"></path>
                                </svg>
                                <span>5 porsi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Slider Section -->
    <section class="news-slider-section">
        <div class="section-header">
            <h2>Ada Apa Hari Ini</h2>
            <a href="#" class="see-all">Lihat Semua</a>
        </div>
        <div class="news-slider-container">
            <div class="news-slider">
                <!-- Slide 1 -->
                <div class="news-slide active">
                    <div class="news-highlight">
                        <div class="news-image-container">
                            <img src="{{ asset('images/berita/gaza.jpg') }}" alt="Konflik Gaza" class="news-image" />
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">PBB: Ancaman Kelaparan Makin Meningkat akibat Konflik di Jalur Gaza</h3>
                            <p class="news-excerpt">PBB memperingatkan ancaman kelaparan semakin meningkat akibat konflik berkepanjangan di wilayah Gaza.</p>
                            <div class="news-footer">
                                <span class="news-tag">Jalur Gaza</span>
                                <a href="#" class="read-more">Lihat Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="news-slide">
                    <div class="news-highlight">
                        <div class="news-image-container">
                            <img src="{{ asset('images/berita/gaza2.jpg') }}" alt="Berita 2" class="news-image" />
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Kampanye GiveAt: Berbagi Makanan untuk Sesama</h3>
                            <p class="news-excerpt">Inisiatif baru untuk mengurangi food waste dan membantu mereka yang membutuhkan.</p>
                            <div class="news-footer">
                                <span class="news-tag">Kampanye</span>
                                <a href="#" class="read-more">Lihat Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="news-slide">
                    <div class="news-highlight">
                        <div class="news-image-container">
                            <img src="{{ asset('images/berita/gaza3.jpg') }}" alt="Berita 3" class="news-image" />
                        </div>
                        <div class="news-content">
                            <h3 class="news-title">Tahun Berganti, Warga Gaza Masih Berdesakan Antre Makanan</h3>
                            <p class="news-excerpt">Miris rasanya melihat warga Gaza yang masih berdesakan menantre makanan.</p>
                            <div class="news-footer">
                                <span class="news-tag">Renungan</span>
                                <a href="#" class="read-more">Lihat Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navigation Dots -->
            <div class="slider-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <!-- Navigation Arrows -->
            <button class="slider-arrow prev">‹</button>
            <button class="slider-arrow next">›</button>
        </div>
    </section>
</main>

<footer>
    <div class="footer-container">
        <div class="footer-logo">
            <img src="{{ asset('images/logo2.png') }}" alt="GiveAt Logo" />
        </div>
        <nav class="footer-nav">
            <a href="#">Privacy Policy</a> | 
            <a href="#">Hubungi Kami</a>
        </nav>
        <div class="footer-copyright">© 2025 GiveAt Food Cycle. All Rights Reserved.</div>
    </div>
</footer>

</body>
</html>