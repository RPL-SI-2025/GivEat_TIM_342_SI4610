<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GivEat - Book Food</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'poppins', sans-serif;
      /* margin-left: 120px;
      margin-right: 120px; */
      margin: 0;
      padding: 0;
      background-color: #fff;
    }


    
    header, footer {
      padding: 20px 40px;
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

    .header img{
      width: 100px;}

    .profile {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .hero {
        width: 75%;
    height: 400px;
      margin: 20px 40px;
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
      padding: 20px 40px;
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
    }

    .info-box {
      border: 1px solid #E5E7EB;
      border-radius: 12px;
      padding: 16px;
      flex: 1;
      text-align: center;
    }

    .ambil-button {
        font-family: 'poppins', sans-serif;
      padding: 14px 28px;
      background: #15803D;
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      cursor: pointer;
    }

    .testimoni {
      padding: 20px 40px;
    }

    .testimoni-item {
      margin-bottom: 20px;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .user-info img {
      border-radius: 50%;
      width: 36px;
      height: 36px;
      object-fit: cover;
    }

    .lihat-lainnya {
      padding: 20px 40px;
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
      <img src="https://via.placeholder.com/32" alt="Profile">
    </div>
  </header>

  <!-- Hero -->
  <div class="hero">
    <img src="{{ asset('images/sop-ayam.jpg') }}" alt="Sop Ayam">
    <span class="badge">Selamatkan segera</span>
    <span class="timer">⏰ 01:37:29</span>
  </div>

  <!-- Content -->
  <div class="content">
    <h2>Sop Ayam dan Sayur</h2>
    <p>
      Saya ingin mendonasikan satu porsi sop ayam hangat dan sayur segar untuk siapa saja yang membutuhkan.
      Makanan ini dimasak dengan bahan berkualitas dan masih dalam kondisi layak konsumsi.
      Semoga dapat membantu menghangatkan hari Anda. Silakan ambil dengan senang hati!
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
        <div>10 Porsi Tersedia</div>
      </div>
      <div class="info-box">
        <div style="font-size: 24px;">📍</div>
        <div>Lokasi <br><img src="https://via.placeholder.com/100x30?text=Maps" alt="Maps"></div>
      </div>
    </div>

    <button class="ambil-button">Ambil Makananmu</button>
  </div>

  <!-- Testimoni -->
  <div class="testimoni">
    <div class="testimoni-item">
      <div class="user-info">
        <img src="{{ asset('images/profile-picture-1.jpg') }}" alt="User">
        <strong>Hailey Williams</strong>
        <span style="color: #9CA3AF;">03 Maret 2025</span>
      </div>
      <p>⭐⭐⭐⭐⭐</p>
      <p>Makanannya sangat enak sekali, terimakasih semoga Tuhan membalas kebaikanmu</p>
    </div>
    <div class="testimoni-item">
      <div class="user-info">
        <img src="{{ asset('images/profile-picture-1.jpg') }}" alt="User">
        <strong>Jade Anne</strong>
        <span style="color: #9CA3AF;">03 Maret 2025</span>
      </div>
      <p>⭐⭐⭐⭐⭐</p>
      <p>Terimakasih banyak!</p>
    </div>
    <div class="testimoni-item">
      <div class="user-info">
        <img src="{{ asset('images/profile-picture-1.jpg') }}" alt="User">
        <strong>Henry McGee</strong>
        <span style="color: #9CA3AF;">03 Maret 2025</span>
      </div>
      <p>⭐⭐⭐⭐⭐</p>
      <p>Keren, teruslah berbuat baik!</p>
    </div>
    <a href="#" style="color: #6B7280; text-decoration: none;">Lihat lebih banyak</a>
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
  </div>
</body>

</html>
