<div class="sidebar bg-white shadow-sm">
    <div class="d-flex flex-column h-100">
        <!-- Logo -->
        <div class="p-3 border-bottom">
            <a href="{{ route('mitra.dashboard') }}" class="d-flex align-items-center justify-content-center text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt="GivEat" class="logo-img">
            </a>
        </div>

        <!-- Menu Items -->
        <div class="p-3">
            <div class="nav flex-column">
                <a href="{{ route('mitra.dashboard') }}" class="nav-link mb-2 {{ request()->routeIs('mitra.dashboard.index') ? 'active' : '' }}">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
                <a href="{{ route('mitra.donations.index') }}" class="nav-link mb-2 {{ request()->routeIs('mitra.donations.index') ? 'active' : '' }}">
                    <i class="bi bi-box-seam me-2"></i> Donations
                </a>
            </div>
        </div>

        <!-- User Profile -->
        <div class="mt-auto p-3 border-top">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" 
                        style="width: 40px; height: 40px;">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="ms-3">
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                        <small class="text-muted">Mitra</small>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person-gear me-2"></i> Profile
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
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

.dropdown-item {
    padding: 0.5rem 1rem;
    font-size: 0.95rem;
}

.dropdown-item i {
    width: 1.2rem;
}

/* Add this to your existing styles */
.logo-img {
    height: 45px;
    width: auto;
    object-fit: contain;
}
</style>
