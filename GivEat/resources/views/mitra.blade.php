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
    <nav id="navbar" class="sticky top-0 left-0 w-full z-50 transition-all duration-300 bg-white text-black">
        <div class="max-w-7xl mx-auto px-16 py-6 flex items-center justify-between relative">
            <!-- Logo -->
             <img src="{{ asset('images/logo.png')}}" alt="" class="h-full w-20 object-contain" id="logo">

            <!-- Center Menu (desktop only) -->
            <ul id="nav-menu" class="hidden md:flex space-x-6 justify-center w-full">
                <li><a href="/#home" class="hover:underline">Beranda</a></li>
                <li><a href="/#misi" class="hover:underline">Misi</a></li>
                <li><a href="/mitra" class="hover:underline">Mitra</a></li>
                <li><a href="/#about" class="hover:underline">Tentang Kami</a></li>
                <li><a href="/#review" class="hover:underline">Review</a></li>
            </ul>

           
            <div class="hidden md:flex space-x-4 items-center absolute right-4 md:static">
        
                <a href="/register" class="px-4 py-1 rounded-full bg-green-700 text-white font-semibold hover:bg-green-600 transition">
                    Daftar
                </a>
                <a id="login-button" href="/login" class="px-4 py-1 rounded-full border border-green-700 text-green-700 font-semibold transition">
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
            <li><a href="/#misi" class="block py-2">Misi</a></li>
            <li><a href="/mitra" class="block py-2">Mitra</a></li>
            <li><a href="/#about" class="block py-2">Tentang Kami</a></li>
            <li><a href="/#review" class="block py-2">Review</a></li>
            <li><a href="/login" class="block py-2 text-gray-800">Login</a></li>
            <li><a href="/register" class="block py-2 text-green-700 font-semibold">Register</a></li>
        </ul>
    </nav>

    <div class="h-[70vh] px-1 md:px-20 py-10">
        <div class="w-full h-full rounded-3xl flex flex-col justify-center items-center gap-16 text-center p-5 bg-[url({{ asset('images/bg-hero-mitra.png') }})] text-white relative" style="background-size: fill; background-repeat: no-repeat;" id="home">
            <h1 class="text-4xl font-semibold w-[50%]">Donaiskan Makanan Kurangi Kelaparan Bersama GivEat</h1>
            <p class="w-[50%]">
                Gabung dengan GivEat dan jadilah bagian dari gerakan berbagi makanan untuk kebaikan bersama! 🤝✨
            </p>

            <a href="#join_mitra" class="px-6 py-2 rounded-full font-semibold text-white bg-gradient-to-r from-green-600 via-green-500 to-green-400 shadow-md hover:brightness-110 transition">
            Mulai Sekarang!
            </a>
        </div>
    </div>


    <div class="w-full mx-auto">
        <div class="max-w-6xl flex gap-5 mx-auto justify-between py-10">
            <div class="w-[50%] py-10 px-5 space-y-7">
                <h1 class="text-3xl font-bold">
                    Stok makanan di tokomu sering <span class="text-green-700">tidak habis</span> terjual?
                </h1>

                <p class="text-[#666666]">Stok makanan di tokomu sering menumpuk dan mendekati tanggal kedaluwarsa? Produk yang masih layak konsumsi berisiko terbuang sia-sia, menyebabkan kerugian dan peningkatan limbah. Saatnya mengelola makanan berlebih dengan lebih bijak agar tetap bermanfaat!</p>
            </div>
            <div class="w-[40%]">
                <img src="{{ asset('images/mitra/rounded-people.png') }}" />
            </div>
        </div>
    </div>



    <div class="w-full mx-auto">
        <div class="max-w-6xl flex mx-auto gap-5 flex-col text-center py-16">
            <h1 class="font-bold text-4xl">
                <span class="text-green-700">GivEat</span>
                Hadir Menjadi Solusinya
            </h1>
            
            <div class="grid grid-cols-3 gap-5">
                <div class="bg-gray-100 rounded-lg p-10 space-y-8">
                    <img src="{{ asset('images/mitra/food-new.png') }}" alt="" class="mx-auto w-40 h-40 object-contain">
    
                    <div class="text-center">
                        <h1 class="font-bold text-lg">Donasi Mudah & Cepat</h1>
                        <p class="text-[#6666]">Bagikan makanan berlebih hanya beberapa langkah</p>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-lg p-10 space-y-8">
                    <img src="{{ asset('images/mitra/time.png') }}" alt="" class="mx-auto w-40 h-40 object-contain">
    
                    <div class="text-center">
                        <h1 class="font-bold text-lg">Alarm Interaktif</h1>
                        <p class="text-[#6666]">Kelola waktu agar makanan tetap layak konsumsih</p>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-lg p-10 space-y-8">
                    <img src="{{ asset('images/mitra/food2.png') }}" alt="" class="mx-auto w-40 h-40 object-contain">
    
                    <div class="text-center">
                        <h1 class="font-bold text-lg">Jual Stok Berlebih </h1>
                        <p class="text-[#6666]">Kelola menu aktif stok berlebih dalam 1 aplikasi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mx-auto" id="join_mitra">
        <div class="max-w-6xl flex mx-auto gap-5 flex-col py-16">
  
            
            <div class="grid grid-cols-2 gap-20">
                <div class="w-full h-full rounded-xl bg-no-repeat p-10 flex flex-col justify-end items-center bg-[url({{ asset('images/mitra/banner.png') }})]">
                    <img src="{{ asset('images/mitra/logo.png') }}"/>
                    <h1 class="font-bold text-white text-2xl text-center mt-5">Bersama Berbagi <br/> Bersama Peduli</h1>
                </div>

                <div class="w-full py-5">
                    <h1 class="font-bold text-5xl">Daftar Jadi Mitra</h1>
                    <p class="text-[#666666] mt-3">Beritahu apa yang kami bisa bantu!</p>

                    <form class="mt-10 flex flex-col gap-4" method="post" action="{{ route('mitra.request') }}">

                        @if (session('success'))
                            <span class="w-full bg-green-300 border border-green-800 rounded-md text-green-800 px-5 py-2">
                                {{ session('success') }}
                            </span>
                        @endif

                        @if (session('failed'))
                            <span class="w-full bg-red-300 border border-red-800 rounded-md text-red-800 px-5 py-2">
                                {{ session('failed') }}
                            </span>
                        @endif
                        @csrf
                        <div class="flex flex-col gap-1">
                            <label for="name">Nama</label>
                            <input 
                                type="text" 
                                placeholder="Masukkan nama"
                                class="w-full px-6 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-700"
                                name="nama"
                                />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="email">Email</label>
                            <input 
                                type="email" 
                                placeholder="Masukkan Email"
                                class="w-full px-6 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-700"
                                name="email"
                                required
                                />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="hp">Nomor HP</label>
                            <input 
                                type="number" 
                                placeholder="Masukkan HP: prefix 62"
                                name="phone"
                                class="w-full px-6 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-700"
                                required
                                />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="message">Pesan</label>
                            <textarea 
                                class="w-full px-6 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-700"
                                name="address"
                                required
                            ></textarea>
                        </div>
                        <div class="flex flex-col gap-1">
                            <button class="rounded-full w-full bg-green-800 hover:bg-green-700 text-white font-semibold py-3">Kirim</button>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>





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

    // window.addEventListener('scroll', () => {
    //     if (window.scrollY > 10) {
    //         navbar.classList.add('bg-white/90', 'shadow-md');
    //         navbar.classList.add('text-black');
    //         navbar.classList.remove('bg-transparent', 'text-white');
            
    //         // Ganti logo ke hitam
    //         logo.src = "{{ asset('images/logo.png') }}";

    //         // Ubah login button
    //         loginButton.classList.remove('text-white', 'border-white');
    //         loginButton.classList.add('text-green-700', 'border-green-500');
    //     } else {
    //         navbar.classList.remove('bg-white/90', 'shadow-md', 'text-black');
    //         navbar.classList.add('bg-transparent', 'text-white');

    //         // Ganti logo ke putih
    //         logo.src = "{{ asset('images/logowhite.png') }}";

    //         // Kembalikan login button
    //         loginButton.classList.remove('text-green-700', 'border-green-500');
    //         loginButton.classList.add('text-white', 'border-white');
    //     }
    // });

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
