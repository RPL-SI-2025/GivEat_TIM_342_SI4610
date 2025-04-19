<div class="sidebar bg-white shadow-sm">
    <div class="d-flex flex-column h-100">
        <!-- Logo -->
        <div class="p-3 border-bottom">
            <a href="{{ route('dashboard') }}" class="d-flex align-items-center justify-content-center text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt="GivEat" height="40">
            </a>
        </div>

        <!-- Menu Items -->
        <div class="p-3">
            <div class="nav flex-column">
                <a href="{{ route('dashboard') }}" class="nav-link mb-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door me-2"></i> Beranda
                </a>
                <a href="{{ route('donations.index') }}" class="nav-link mb-2 {{ request()->routeIs('donations.*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam me-2"></i> Donasi
                </a>
                <a href="#" class="nav-link mb-2">
                    <i class="bi bi-star me-2"></i> Review
                </a>
                <a href="#" class="nav-link mb-2">
                    <i class="bi bi-clock-history me-2"></i> Riwayat
                </a>
            </div>
        </div>

        <!-- User Profile -->
        <div class="mt-auto p-3 border-top">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" 
                     style="width: 40px; height: 40px;">
                    <i class="bi bi-person"></i>
                </div>
                <div class="ms-3">
                    <div class="fw-bold">{{ auth()->user()->name ?? 'User' }}</div>
                    <small class="text-muted">Mitra</small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.sidebar {
    width: 280px;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    border-right: 1px solid #e5e7eb;
}

.nav-link {
    color: var(--giveat-text);
    border-radius: 0.5rem;
    padding: 0.75rem 1rem;
    transition: all 0.2s;
    font-size: 0.95rem;
}

.nav-link:hover {
    background-color: var(--giveat-hover);
    color: var(--giveat-primary);
}

.nav-link.active {
    background-color: var(--giveat-hover);
    color: var(--giveat-primary);
    font-weight: 500;
}

main {
    margin-left: 280px;
}
</style>
