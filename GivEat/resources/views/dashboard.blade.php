<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Giveat - Siap Makan Hari Ini</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white font-sans">

<!-- Header -->
<header class="d-flex justify-content-between align-items-center px-4 py-3 border-bottom">
  <div class="logo">
    <img src="{{ asset('images/logo1.png') }}" alt="GiveAt Logo" height="40" />
  </div>
  <nav>
    <ul class="nav gap-4 mb-0">
      <li><a href="#" class="nav-link active text-success fw-semibold">Beranda</a></li>
      <li><a href="#" class="nav-link text-dark fw-semibold">Forum</a></li>
      <li><a href="#" class="nav-link text-dark fw-semibold">Berita</a></li>
      <li><a href="#" class="nav-link text-dark fw-semibold">Persebaran</a></li>
      <li><a href="#" class="nav-link text-dark fw-semibold">FAQ</a></li>
    </ul>
  </nav>
  <div class="d-flex align-items-center gap-2">
    <span>Hailey Williams</span>
    <img src="{{ asset('images/user.png') }}" alt="User Profile" width="40" height="40" style="border-radius:50%; object-fit:cover;" />
  </div>
</header>

<main class="container my-4 max-w-screen-xl mx-auto">

  <!-- Banner -->
  <div class="mb-5 rounded-lg overflow-hidden">
    <img src="{{ asset('images/banner/banner.png') }}" alt="Banner Promo" class="w-full h-auto object-cover rounded-lg" />
  </div>

  <!-- Top Restaurant Section -->
  <section aria-label="Top Restaurant">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="fs-4 fw-bold m-0">Top Restaurant</h2>
      <a href="#" class="link-success small text-decoration-none">Lihat Selengkapnya</a>
    </div>

    <div class="d-flex gap-3 overflow-auto pb-md-2 scroll-container" style="scrollbar-width: none; -ms-overflow-style: none;">
      @foreach ($restaurants as $restaurant)
        <div style="min-width: 80px; min-height: 80px; border: 1px solid #ddd; border-radius: 12px; padding: 10px; display: flex; align-items: center; justify-content: center;">
          <img src="{{ asset('images/restaurants/' . $restaurant->logo) }}" alt="{{ $restaurant->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;" />
        </div>
      @endforeach
    </div>
  </section>

  <!-- Siap Makan Hari Ini Section -->
  <section aria-label="Siap Makan Hari Ini" class="mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="fs-4 fw-bold m-0">Siap Makan Hari Ini</h2>
      <a href="#" class="link-success small text-decoration-none">Lihat Selengkapnya</a>
    </div>

  <div class="row g-3">
    @foreach ($foods as $food)
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 position-relative">
          
          {{-- Tampilkan badge jika porsi <= 5 --}}
          @if ($food->portion <= 5)
            <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1 rounded-end small fw-semibold">
              Tersisa {{ $food->portion }}
            </span>
          @endif

          {{-- Gambar Makanan --}}
          <img 
            src="{{ asset('images/foods/' . $food->image) }}" 
            alt="{{ $food->name }}" 
            class="card-img-top object-cover rounded-top" 
            style="height: 180px; object-fit: cover;"
            onerror="this.src='{{ asset('images/foods/') }}';"
          />

          <div class="card-body py-2">
            <h6 class="card-title fw-bold">{{ $food->name }}</h6>
            <p class="small text-muted mb-1">{{ Str::limit($food->description, 50, '...') }}</p>

            <ul class="list-inline list-unstyled small text-muted mb-0 d-flex flex-wrap gap-2">
              <li class="d-flex align-items-center gap-1" title="Porsi">
                🍽️ {{ $food->portion }} Porsi
              </li>
              <li class="d-flex align-items-center gap-1" title="Waktu Persiapan">
                ⏱️ {{ \Carbon\Carbon::parse($food->prepared_at)->diffForHumans() }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>

<!-- Ada Apa Hari Ini Section -->
<section aria-label="Ada Apa Hari Ini" class="mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fs-4 fw-bold m-0">Ada Apa Hari Ini</h2>
  </div>

  <div class="row g-3">
    <div class="col-12">
      <div class="card border-0 shadow-sm overflow-hidden">
        <img src="{{ asset('images/berita/berita.png') }}" alt="Berita Hari Ini" class="w-100 h-auto object-cover" style="max-height: 300px;">
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer style="background-color: #14532d; color: white; padding: 16px 30px;">
  <div style="max-width: 1200px; margin: auto; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
    <!-- Logo -->
    <div style="display:flex; align-items:center;">
      <img src="{{ asset('images/logo2.png') }}" alt="GiveAt Logo" style="height:40px;" />
      <span style="margin-left:10px;"></span>
    </div>

    <!-- Links -->
    <nav>
      <a href="#" style="color:white; margin-right:20px; text-decoration:none;">Privacy Policy</a>
      <a href="#" style="color:white; text-decoration:none;">Hubungi Kami</a>
    </nav>

    <!-- Copyright -->
    <div>© 2025 GiveAt Food Cycle. All Rights Reserved.</div>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script>
  // Interaksi JS bisa ditambahkan di sini
</script>

</body>
</html>
