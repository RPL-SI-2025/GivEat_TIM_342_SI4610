<!DOCTYPE html>
<html class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>Giveat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .scrollbar-hide::-webkit-scrollbar {
        display: none;
        }
        .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
        }
    </style>
</head>
<body class="font-sans">
    <nav id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent text-white">
        <div class="max-w-7xl mx-auto px-16 py-6 flex items-center justify-between relative">
            <!-- Logo -->
             <img src="{{ asset('images/logowhite.png')}}" alt="" class="h-full w-20 object-contain" id="logo">

            <!-- Center Menu (desktop only) -->
            <ul id="nav-menu" class="hidden md:flex space-x-6 justify-center w-full">
                <li><a href="/#home" class="hover:underline">Beranda</a></li>
                <li><a href="#misi" class="hover:underline">Misi</a></li>
                <li><a href="/mitra" class="hover:underline">Mitra</a></li>
                <li><a href="#about" class="hover:underline">Tentang Kami</a></li>
                <li><a href="#review" class="hover:underline">Review</a></li>
            </ul>

           
            <div class="hidden md:flex space-x-4 items-center absolute right-4 md:static">
        
                <a href="/register" class="px-4 py-1 rounded-full bg-green-700 text-white font-semibold hover:bg-green-600 transition">
                    Daftar
                </a>
                <a id="login-button" href="/login" class="px-4 py-1 rounded-full border border-white text-white font-semibold transition">
                    Login
                </a>
            </div>

            <!-- Hamburger Button (mobile only) -->
            <button id="menu-toggle" class="md:hidden text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <ul id="nav-mobile" class="md:hidden hidden flex-col space-y-2 px-4 pb-4 bg-white shadow-md">
            <li><a href="/#home" class="block py-2">Beranda</a></li>
            <li><a href="/misi" class="block py-2">Misi</a></li>
            <li><a href="/mitra" class="block py-2">Mitra</a></li>
            <li><a href="#tentang" class="block py-2">Tentang Kami</a></li>
            <li><a href="#review" class="block py-2">Review</a></li>
            <li><a href="/login" class="block py-2 text-gray-800">Login</a></li>
            <li><a href="/register" class="block py-2 text-green-700 font-semibold">Register</a></li>
        </ul>
    </nav>

    <div class="h-[90vh] w-full bg-[url({{ asset('images/landingcust1.png') }})] text-white relative" style="background-size: fill; background-repeat: no-repeat;" id="home">
        <div class="h-full w-full flex items-center px-20">
            <div class="flex-1 space-y-10">
                <h1 class="font-bold text-4xl">Makananmu berlebih? Ubah jadi kebaikan untuk sekitar</h1>
                <p>Jangan biarkan makanan berlebih terbuang sia-sia! Dengan GivEat, kamu bisa mendonasikan makanan yang masih layak konsumsi kepada mereka yang membutuhkan.</p>
            </div>
            <div class="flex-1"></div>
        </div>

        <section class="bg-white text-center py-16 shadow-md absolute text-black -bottom-24 -translate-x-[50%] left-[50%] rounded-lg px-10 w-[80%]">
            <div class="grid grid-cols-3 gap-4 max-w-4xl mx-auto">
                <div>
                    <h2 class="text-4xl font-bold">{{ $content['statistic_donatur'] ?? '0' }}</h2>
                    <p>Donatur Makanan</p>
                </div>
                <div>
                    <h2 class="text-4xl font-bold">{{ $content['statistic_penerima'] ?? '0' }}</h2>
                    <p>Penerima Makanan</p>
                </div>
                <div>
                    <h2 class="text-4xl font-bold">{{ $content['statistic_distribusi'] ?? '0' }}</h2>
                    <p>Makanan Terdistribusi</p>
                </div>
            </div>
        </section>
    </div>




    {{-- Misi Kami --}}
    <section class="bg-gray-50 py-16 mt-20" id="misi">
        <div class="text-center mb-10 flex flex-col justify-center items-center">
            <h2 class="text-3xl font-bold">{{ $content['misi_title'] ?? 'Misi Kami' }}</h2>
            <p class="text-gray-600 mt-2 w-[90%] md:w-[50%]">{{ $content['misi_subtitle'] ?? 'Subtitle misi kami' }}</p>
        </div>
        <div class="grid grid-cols-2 gap-6 max-w-5xl mx-auto text-left">
            <div class="rounded-md bg-gray-100 px-10 py-5">
                <h4 class="font-semibold">Komitmen Kami</h4>
                <p>{{ $content['misi_komitmen'] ?? 'Komitmen kami terhadap masyarakat.' }}</p>
            </div>
            <div class="rounded-md bg-gray-100 px-10 py-5">
                <h4 class="font-semibold">Dampaknya</h4>
                <p>{{ $content['misi_dampak'] ?? 'Dampak dari kegiatan ini sangat luas.' }}</p>
            </div>
      
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto text-left mt-10">
            <div class="rounded-md bg-gray-100 px-10 py-5">
                <h4 class="font-semibold">Pentingnya</h4>
                <p>{{ $content['misi_pentingnya'] ?? 'Penting untuk keberlanjutan kehidupan.' }}</p>
            </div>
            <div class="rounded-md bg-gray-100 px-10 py-5">
                <h4 class="font-semibold">Tekad Kami</h4>
                <p>{{ $content['misi_tekad'] ?? 'Tekad kami untuk selalu berbagi.' }}</p>
            </div>
            <div class="rounded-md bg-gray-100 px-10 py-5">
                <h4 class="font-semibold">Visi Kami</h4>
                <p>{{ $content['misi_visi'] ?? 'Visi kami adalah masyarakat yang peduli.' }}</p>
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    <div class="w-full py-8 md:py-20 px-1 md:px-16 object-contain bg-[url({{ asset('images/bg-about.png') }})]" style="object-fit: contain; background-repeat: no-repeat;" id="about">
        <div class="max-w-5xl mx-auto flex text-white">
            <div class="flex-1">
                <h2 class="text-3xl font-bold mb-2">{{ $content['tentang_title'] ?? 'Tentang GivEat' }}</h2>
                <p class="mb-6">{{ $content['tentang_subtitle'] ?? 'GivEat adalah platform berbagi makanan.' }}</p>
            </div>

            <div class="flex-1 space-y-5">
                <div class="p-10 backdrop-blur bg-white/30 rounded-lg border border-white hover:scale-105 duration-500">
                    <h1 class="font-bold text-2xl">Siapa Kami ?</h1>

                    <p class="mt-5">
                        <span class="font-bold">
                            "Misi Sosial untuk Menghubungkan Kelebihan dengan Kebutuhan" <br> 
                        </span>
                        GivEat adalah platform yang memfasilitasi donasi makanan berlebih agar dapat tersalurkan dengan tepat. Kami percaya bahwa setiap makanan yang masih layak konsumsi dapat membawa dampak positif bagi sesama.</p>
                </div>
                <div class="p-10 backdrop-blur bg-white/30 rounded-lg border border-white hover:scale-105 duration-500">
                    <h1 class="font-bold text-2xl">Bagaimana ini dimulai?</h1>

                    <p class="mt-5">
                        <span class="font-bold">
                            "Dari Masalah Pemborosan Pangan, Hadir Solusi Berbagi" <br> 
                        </span>
                       Kami melihat realitas di mana banyak makanan terbuang, sementara masih banyak orang yang kelaparan. Dari kepedulian ini, GivEat lahir untuk mengubah makanan berlebih menjadi kebaikan yang nyata.</p>
                </div>
                <div class="p-10 backdrop-blur bg-white/30 rounded-lg border border-white hover:scale-105 duration-500">
                    <h1 class="font-bold text-2xl">Apa yang kami lakukan?</h1>

                    <p class="mt-5">
                        <span class="font-bold">
                            "Mengurangi Limbah Pangan, Meningkatkan Kepedulian" <br> 
                        </span>
                        GivEat menghubungkan donatur makanan dengan mereka yang membutuhkan, menciptakan sistem berbagi yang mudah, aman, dan berdampak. Dengan setiap makanan yang diselamatkan, kita menciptakan dunia yang lebih baik.</p>
                </div>
                <div class="p-10 backdrop-blur bg-white/30 rounded-lg border border-white hover:scale-105 duration-500">
                    <h1 class="font-bold text-2xl">Membuat Perubahan</h1>

                    <p class="mt-5">
                        <span class="font-bold">
                            "Mengubah Kelebihan Menjadi Harapan" <br> 
                        </span>
                        Kami percaya bahwa setiap makanan yang terselamatkan bukan sekadar donasi, tetapi juga langkah kecil menuju perubahan besar. Dengan GivEat, kita bersama menciptakan dunia yang lebih peduli dan berkelanjutan.</p>
                </div>
             
            </div>
           
        </div>
    </div>

    {{-- Testimoni --}}
    <section class="bg-white py-16" id="review">
        <div class="text-center mb-10 flex flex-col justify-center items-center">
            <h2 class="text-3xl font-bold">Merita Mereka</h2>
            <p class="text-gray-600 mt-2 w-[90%] md:w-[50%]">
            Dari satu porsi makanan, lahir sejuta harapan. Simak cerita mereka yang hidupnya berubah karena kepedulian Anda melalui GivEat
            </p>
        </div>

        <div class="relative px-16">
            <!-- Tombol Kiri -->
            <button id="prevBtn" class="absolute left-16 top-1/2 -translate-y-1/2 z-10 bg-green-700 text-white px-2 py-1 rounded-full shadow-md">
            ‹
            </button>

            <!-- Container Scrollable -->
            <div id="slider" class="overflow-x-scroll scroll-smooth pl-4 pr-4 scrollbar-hide">
            <div class="flex gap-x-6 w-max">
                <!-- Card Testimoni -->
                <div class="w-[350px] shrink-0 bg-gray-100 px-6 py-16 rounded-lg shadow">
                    <p class="text-gray-700">GivEat membuat berbagi makanan jadi lebih mudah dan bermakna! Saya bisa mendonasikan makanan berlebih hanya dengan beberapa klik, dan saya merasa tenang karena makanan saya sampai ke tangan yang benar-benar membutuhkan</p>
                    <div class="mt-4 text-sm font-semibold flex items-center gap-2">
                        <img src="https://i.pravatar.cc/30?img=1" class="rounded-full" />
                        Hailey Williams
                    </div>
                </div>
                <div class="w-[350px] shrink-0 bg-gray-100 px-6 py-16 rounded-lg shadow">
                    <p class="text-gray-700">GivEat membuat berbagi makanan jadi lebih mudah dan bermakna! Saya bisa mendonasikan makanan berlebih hanya dengan beberapa klik, dan saya merasa tenang karena makanan saya sampai ke tangan yang benar-benar membutuhkan</p>
                    <div class="mt-4 text-sm font-semibold flex items-center gap-2">
                        <img src="https://i.pravatar.cc/30?img=1" class="rounded-full" />
                        Hailey Williams
                    </div>
                </div>
                <div class="w-[350px] shrink-0 bg-gray-100 px-6 py-16 rounded-lg shadow">
                    <p class="text-gray-700">GivEat membuat berbagi makanan jadi lebih mudah dan bermakna! Saya bisa mendonasikan makanan berlebih hanya dengan beberapa klik, dan saya merasa tenang karena makanan saya sampai ke tangan yang benar-benar membutuhkan</p>
                    <div class="mt-4 text-sm font-semibold flex items-center gap-2">
                        <img src="https://i.pravatar.cc/30?img=1" class="rounded-full" />
                        Hailey Williams
                    </div>
                </div>
                <div class="w-[350px] shrink-0 bg-gray-100 px-6 py-16 rounded-lg shadow">
                    <p class="text-gray-700">GivEat membuat berbagi makanan jadi lebih mudah dan bermakna! Saya bisa mendonasikan makanan berlebih hanya dengan beberapa klik, dan saya merasa tenang karena makanan saya sampai ke tangan yang benar-benar membutuhkan</p>
                    <div class="mt-4 text-sm font-semibold flex items-center gap-2">
                        <img src="https://i.pravatar.cc/30?img=1" class="rounded-full" />
                        Hailey Williams
                    </div>
                </div>

      
            </div>
            </div>

            <!-- Tombol Kanan -->
            <button id="nextBtn" class="absolute right-16 top-1/2 -translate-y-1/2 z-10 bg-green-700 text-white px-2 py-1 rounded-full shadow-md">
            ›
            </button>
        </div>
        </section>




    {{-- Footer --}}
    <footer class="bg-gray-900 text-white text-center py-6 text-sm">
        <p>© 2025 GivEat Food Cycle. All Rights Reserved.</p>
    </footer>


<script>
    const navbar = document.getElementById('navbar');
    const menuToggle = document.getElementById('menu-toggle');
    const navMobile = document.getElementById('nav-mobile');
    const loginButton = document.getElementById('login-button');
    const logo = document.getElementById('logo');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            navbar.classList.add('bg-white/90', 'shadow-md');
            navbar.classList.add('text-black');
            navbar.classList.remove('bg-transparent', 'text-white');
            
            // Ganti logo ke hitam
            logo.src = "{{ asset('images/logo.png') }}";

            // Ubah login button
            loginButton.classList.remove('text-white', 'border-white');
            loginButton.classList.add('text-green-700', 'border-green-500');
        } else {
            navbar.classList.remove('bg-white/90', 'shadow-md', 'text-black');
            navbar.classList.add('bg-transparent', 'text-white');

            // Ganti logo ke putih
            logo.src = "{{ asset('images/logowhite.png') }}";

            // Kembalikan login button
            loginButton.classList.remove('text-green-700', 'border-green-500');
            loginButton.classList.add('text-white', 'border-white');
        }
    });

    menuToggle.addEventListener('click', () => {
        navMobile.classList.toggle('hidden');
    });
</script>

<script>
  const slider = document.getElementById('slider');
  const nextBtn = document.getElementById('nextBtn');
  const prevBtn = document.getElementById('prevBtn');

  nextBtn.addEventListener('click', () => {
    slider.scrollBy({ left: 300, behavior: 'smooth' });
  });

  prevBtn.addEventListener('click', () => {
    slider.scrollBy({ left: -300, behavior: 'smooth' });
  });
</script>

</body>
</html>
