<nav x-data="{ scrolled: false }" 
     @scroll.window="scrolled = window.scrollY > 10" 
     :class="{ 'navbar-scrolled': scrolled }" 
     class="navbar">
  <div class="navbar-container">
    <!-- Logo -->
    <a href="#" class="logo">
      <img :src="scrolled ? '{{ asset('images/logo-giveat-hitam.png') }}' : '{{ asset('images/logowhite.png') }}'" 
           alt="GivEats" 
           class="h-8 transition-all duration-300">
    </a>

    <!-- Menu Tengah -->
    <div class="nav-links">
      <a href="#" class="nav-link">Beranda</a>
      <a href="#misi" class="nav-link">Misi</a>
      <a href="#mitra" class="nav-link">Mitra</a>
      <a href="#tentang" class="nav-link">Tentang Kami</a>
      <a href="#testimoni" class="nav-link">Review</a>
    </div>

    <!-- Tombol Login/Register -->
    <div class="auth-buttons">
      <a href="{{ route('login') }}" class="login-btn">Masuk</a>
      <a href="{{ route('register') }}" class="register-btn">Daftar</a>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<style>
.navbar {
  width: 100%;
  padding: 30px 5%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1000;
  transition: all 0.3s ease;
}

.navbar-scrolled {
  background-color: white !important;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  padding: 15px 5% !important;
}

.navbar-scrolled .nav-link,
.navbar-scrolled .login-btn {
  color: #006837 !important;
}

.navbar-scrolled .login-btn {
  border-color: #006837 !important;
}

.navbar-scrolled .login-btn:hover {
  background-color: rgba(29, 29, 29, 0.1) !important;
}

.navbar-scrolled .register-btn {
  background-color: #006837 !important;
  color: white !important;
}

.navbar-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  width: 100%;
  margin: 0 auto;
  padding: 0 20px;
}

.logo {
  flex-shrink: 0;
}

.nav-links {
  display: flex;
  gap: 25px;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
}

.login-btn {
  color: white;
  text-decoration: none;
  padding: 8px 20px;
  border-radius: 20px;
  transition: all 0.3s ease;
  border: 1px solid white;
}
.register-btn {
  background-color: #006837;
  color: white;
  text-decoration: none;
  padding: 8px 20px;
  border-radius: 20px;
  transition: all 0.3s ease;
}

.navbar-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

.logo {
  display: flex;
  align-items: center;
  gap: 10px;
  color: white;
  font-weight: 700;
  font-size: 1.5rem;
  text-decoration: none;
}

.nav-links {
  display: flex;
  gap: 25px;
  align-items: center;
}

.logo img {
  height: 32px;
  width: auto;
}

.nav-link {
  color: white;
  text-decoration: none;
  position: relative;
}

.nav-link:hover,
.nav-link.active {
  color: #006837;
}

.nav-link::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  bottom: -2px;
  left: 0;
  background-color: #006837;
  transition: width 0.3s ease;
}

.nav-link:hover::after,
.nav-link.active::after {
  width: 100%;
}

.btn-daftar {
  background-color: #006837;
  color: white;
  padding: 6px 18px;
  border-radius: 20px;
  font-weight: 500;
  transition: background-color 0.3s ease;
  margin-left: 20px;
}

.btn-masuk {
  border: 1px solid white;
  color: white;
  padding: 6px 18px;
  border-radius: 20px;
  font-weight: 500;
  transition: all 0.3s ease;
}
</style>
