@extends('layouts.landing')

@section('content')
<style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* Base Styles */
        html, body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.5;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Layout */
        .w-screen { width: 100vw; }
        .h-screen { height: 100vh; }
        .min-h-screen { min-height: 100vh; }
        .w-full { width: 100%; }
        .h-full { height: 100%; }
        
        /* Positioning */
        .relative { position: relative; }
        .inset-0 { top: 0; right: 0; bottom: 0; left: 0; }

        /* Flex & Grid */
        .flex { display: flex; }
        .grid { display: grid; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .grid-cols-1 { grid-template-columns: 1fr; }
        .gap-12 { gap: 3rem; }
        
        /* Spacing */
        .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .py-12 { padding-top: 3rem; padding-bottom: 3rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mr-12 { margin-right: 3rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }

        /* Typography */
        .header-text {
            font-size: 40px;
            line-height: 3rem;
            color: white;
            margin: 20px;
            font-weight: bold;
        }
        
        /* Utilities */
        .object-cover { object-fit: cover; }

        /* Responsive */
        @media (min-width: 768px) {
            .md\:text-5xl { font-size: 3rem; line-height: 1; }
        }

        @media (min-width: 1024px) {
            .lg\:px-12 { padding-left: 3rem; padding-right: 3rem; }
            .lg\:text-6xl { font-size: 3.75rem; line-height: 1; }
            .lg\:grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
        }

        .stats-card {
  display: flex;
  justify-content: center;
  margin-top: -60px; /* untuk overlap ke Hero jika perlu */
  z-index: 2;
  position: relative;
}

.stats-container {
  background-color: #ffffff;
  border-radius: 20px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
  display: flex;
  padding: 30px 40px;
  gap: 20px;
  align-items: center;
  max-width: 1100px;
  width: 100%;
  justify-content: space-around;
}

.stat-box {
  text-align: center;
}

.stat-box h2 {
  font-size: 3.2rem;
  margin: 0;
  color: #111;
  font-weight: 700;
}

.stat-box p {
  margin: 6px 0 0;
  color: #666;
  font-size: 1.2rem;
}

.divider {
  width: 1px;
  height: 70px;
  background-color: #e0e0e0;
}

@media (max-width: 768px) {
  .stats-container {
    flex-direction: column;
    gap: 20px;
    padding: 20px;
  }

  .divider {
    display: none;
  }
}

        section#misi {
      padding: 60px 20px;
      text-align: center;
      background-color: #ffffff;
    }

    section#misi h2 {
      font-size: 2.2rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    section#misi p {
      max-width: 720px;
      margin: 0 auto 40px auto;
      color: #555;
      font-size: 1rem;
      line-height: 1.6;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      max-width: 1140px;
      margin: 0 auto;
    }

    .card {
      background: #f9f9f9;
      padding: 24px;
      border-radius: 16px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h3 {
      margin-bottom: 12px;
      font-size: 1.2rem;
      font-weight: 600;
    }

    .card p {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.5;
    }

    @media screen and (max-width: 600px) {
      section#misi h2 {
        font-size: 1.6rem;
      }

      .card {
        padding: 20px;
      }
    }
    

    .about-section {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      padding: 60px 20px;
      max-width: auto;
      align-items: flex-start;
      background: url('/images/bg-about.png') no-repeat center center fixed;
  background-size: cover;
    }

    .about-text {
      flex: 1 1 300px;
      max-width: 400px;
      color: #ffffff;
      padding: 30px 30px;
    }

    .about-text h2 {
      font-size: 2rem;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .about-text p {
      font-size: 1rem;
      color: #e0e0e0;
    }

    .card-container {
      flex: 2 1 500px;
      display: flex;
      flex-direction: column;
      padding: 30px 20px;
      gap: 20px;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 24px;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      color: #ffffff;
      transition: transform 0.3s ease;
    }

    .glass-card:hover {
      transform: translateY(-5px);
    }

    .glass-card h3 {
      margin-bottom: 10px;
      font-size: 1.2rem;
    }

    .glass-card p {
      font-size: 0.95rem;
      color: #e0e0e0;
      line-height: 1.5;
    }

    @media screen and (max-width: 768px) {
      .about-section {
        flex-direction: column;
      }
    }
    
    .testimonials-section {
      max-width: 1200px;
      margin: auto;
      padding: 60px 20px;
      text-align: center;
    }
    .testimonials-section h2 {
      font-size: 2rem;
      margin-bottom: 10px;
      color: #222;
      font-weight: bold;
    }

    .testimonials-section p.subtitle {
      color: #666;
      margin-bottom: 40px;
      font-size: 1rem;
    }

    .testimonial-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .testimonial-card {
      background-color: #F5F7F9;
      border-radius: 16px;
      padding: 24px;
      max-width: 320px;
      text-align: left;
      position: relative;
    }

    .testimonial-card::before {
      content: "❝";
      font-size: 4rem;
      color: #007e3e;
      position: absolute;
      top: 16px;
      left: 20px;
    }

    .testimonial-text {
      color: #333;
      font-size: 0.95rem;
      margin-bottom: 20px;
      margin-top: 60px;
    }

    @media (max-width: 768px) {
      .testimonial-cards {
        flex-direction: column;
        align-items: center;
      }
    }
    </style>
    </head>
    <body class="font-sans antialiased m-0 p-0 flex flex-col min-h-screen">
        <!-- Hero Section -->
        <div class="relative h-screen">
            <div class="absolute inset-0 w-full h-full">
                <img src="{{ asset('images/welcome-bld.png') }}" alt="Background" class="w-full h-full object-cover">
            </div>
            <div class="relative h-full flex items-center">
                <div class="max-w-7xl mx-auto px-6 lg:px-12 w-full">
                <div class="w-full max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <!-- Left Column -->
                        <div class="text-white">
                            <h1 class="header-text">
                                Makananmu berlebih?<br>
                                Ubah jadi kebaikan untuk sekitar
                            </h1>
                        </div>
                        
                        <!-- Right Column - Can be used for image or other content -->
                        <div class="hidden lg:block">
                            <!-- Additional content can be added here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->

       
        <section class="stats-card">
  <div class="stats-container">
    <div class="stat-box">
      <h2>400</h2>
      <p>Donatur Makanan</p>
    </div>
    <div class="divider"></div>
    <div class="stat-box">
      <h2>1320</h2>
      <p>Penerima Makanan</p>
    </div>
    <div class="divider"></div>
    <div class="stat-box">
      <h2>4572</h2>
      <p>Makanan Terdistribusi</p>
    </div>
  </div>
</section>


        <section id="misi">
    <h2>Misi Kami</h2>
    <p>
      Misi Kami Adalah Memastikan Tidak Ada Makanan Yang Terbuang Sia-Sia, Dan Tidak
      Ada Perut Yang Kelaparan. Dengan GivEat, Berbagi Jadi Lebih Mudah!
    </p>

    <div class="grid-container">
      <div class="card">
        <h3>Komitmen Kami</h3>
        <p>
          GivEat hadir untuk mengurangi kelaparan dan pemborosan makanan dengan mendistribusikan makanan berlebih kepada yang membutuhkan. Kami percaya setiap sisa makanan yang tersembunyi bisa menjadi harapan bagi sesama.
        </p>
      </div>
      <div class="card">
        <h3>Dampaknya</h3>
        <p>
          Dengan GivEat, sisa makanan berlebih dapat mengurangi kelaparan, memperkuat ikatan, dan menciptakan komunitas yang lebih peduli. Solusi cerdas membawa perubahan nyata bagi mereka yang membutuhkan.
        </p>
      </div>
      <div class="card">
        <h3>Pentingnya</h3>
        <p>
          Usaha kami memastikan tidak ada makanan terbuang setiap harinya. Kami tahu di luar sana, ada orang-orang yang kelaparan. Oleh karena itu, mendistribusikan makanan berlebih tidak sekadar berbagi, tapi menyelamatkan.
        </p>
      </div>
      <div class="card">
        <h3>Tekad Kami</h3>
        <p>
          Kami berkomitmen untuk membangun ekosistem berbagi makanan yang aman, terpercaya, dan berkelanjutan. Dengan teknologi, kami menyambungkan makanan kepada orang yang tepat.
        </p>
      </div>
      <div class="card">
        <h3>Visi Kami</h3>
        <p>
          Dunia tanpa pemborosan makanan dan kelaparan. GivEat ingin menciptakan masa depan yang adil dengan sistem berbagi makanan yang mudah dan efisien bagi semua.
        </p>
      </div>
      <div class="card">
        <h3>Solusi Nyata</h3>
        <p>
          Memberikan kemudahan untuk semua orang berbagi makanan berlebih melalui sistem dan platform yang terpercaya, cepat, dan efisien.
        </p>
      </div>
    </div>
  </section>

  
  <section class="about-section">
    <div class="about-text">
      <h2>Tentang GivEat</h2>
      <p>
        Platform donasi makanan yang menghubungkan kelebihan dengan mereka yang membutuhkan.
      </p>
    </div>

    <div class="card-container">
      <div class="glass-card">
        <h3>Siapa Kami?</h3>
        <p>
          “Misi Sosial untuk Menghubungkan Kelebihan dengan Kebutuhan.”
          GivEat adalah inisiatif sosial yang memanfaatkan teknologi untuk menghubungkan makanan berlebih dengan mereka yang membutuhkan secara cepat. Kami percaya bahwa setiap tindakan kecil menuju transformasi dapat membawa dampak positif bagi sesama.
        </p>
      </div>

      <div class="glass-card">
        <h3>Bagaimana ini dimulai?</h3>
        <p>
          Dari Masalah Pemborosan Pangan, Hadir Solusi Berbagi!
          Kami melihat jumlah makanan terbuang semakin besar, sementara banyak saudara yang kelaparan. Dari kepedulian itu, GivEat hadir, ingin mengubah makanan berlebih menjadi kebahagiaan yang nyata.
        </p>
      </div>

      <div class="glass-card">
        <h3>Apa yang kami lakukan?</h3>
        <p>
          “Mengurangi limbah pangan. Meningkatkan kepedulian.”
          Kami mengembangkan ekosistem donasi makanan yang terintegrasi, mulai dari pemilik makanan berlebih hingga donatur pribadi, dan mendistribusikannya secara langsung, efisien, dan tepat ke mereka yang berhak.
        </p>
      </div>

      <div class="glass-card">
        <h3>Membuat Perubahan</h3>
        <p>
          “Mengubah Kelebihan Menjadi Harapan”
          GivEat percaya bahwa kelebihan makanan yang tersisa bukan kesalahan, tapi kesempatan. Kami ingin menciptakan budaya berbagi dan kesadaran bersama tentang pentingnya efisiensi pangan demi sesama.
        </p>
      </div>
    </div>
  </section>
  <div>
  <section class="testimonials-section">
    <h2>Cerita Mereka</h2>
    <p class="subtitle">
      Dari Satu Porsi Makanan, Lahir Sejuta Harapan. Simak Cerita Mereka Yang Hidupnya <br>
      Berubah Karena Kepedulian Anda Melalui GivEat
    </p>

    <div class="testimonial-cards">
      <div class="testimonial-card">
        <p class="testimonial-text">
          GivEat membuat berbagi makanan jadi lebih mudah dan bermakna! Saya bisa mendonasikan makanan berlebih hanya dengan beberapa klik, dan saya merasa tenang karena makanan saya sampai ke tangan yang benar-benar membutuhkan
        </p>
      </div>

      <div class="testimonial-card">
        <p class="testimonial-text">
          Dulu, saya sering bingung harus bagaimana dengan makanan berlebih di acara keluarga. Sekarang, dengan GivEat, saya bisa langsung berbagi tanpa ribet. Sangat bermanfaat
        </p>
      </div>

      <div class="testimonial-card">
        <p class="testimonial-text">
          Terima kasih GivEat! Berkat aplikasi ini, saya dan keluarga bisa mendapatkan makanan yang layak saat sedang kesulitan. Ini benar-benar membantu banyak orang seperti saya
        </p>
      </div>
    </div>
  </section>
  </div>
  {{-- Footer (Only for regular users) --}}
            <footer class="bg-[#006837] text-white py-4">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-4">
                        <a href="" class="text-white text-decoration-none">
                            <img src="{{ asset('images/logowhite.png') }}" alt="GivEat" class="logo-img" style="height: 45px; width: auto; object-fit: contain;">
                        </a>
                        <div class="d-flex gap-4">
                            <a href="" class="text-white text-decoration-none hover:text-white/80">Privacy Policy</a>
                            <a href="" class="text-white text-decoration-none hover:text-white/80">Hubungi Kami</a>
                        </div>
                    </div>
                    <div class="text-white/80">
                        © {{ date('Y') }} GivEat Food Cycle. All Rights Reserved.
                    </div>
                </div>
            </footer>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        footer a:hover {
            opacity: 0.8;
            transition: opacity 0.2s ease-in-out;
        }
    </style>
@endsection