<!-- Sidebar Navigation -->
<div class="sidebar bg-white shadow-sm">
    <div class="d-flex flex-column h-100">
        <!-- Logo -->
        <div class="p-3 border-bottom">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center justify-content-center text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt="GivEat" class="logo-img">
            </a>
        </div>

        <!-- Menu Items -->
        <div class="p-3">
            <div class="nav flex-column">
                <a href="{{ route('admin.dashboard') }}" class="nav-link mb-2 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Admin Dashboard
                </a>
                <a href="{{ route('admin.faq.index') }}" class="nav-link mb-2 {{ request()->routeIs('admin.faq.index') ? 'active' : '' }}">
                    <i class="bi bi-question-circle me-2"></i> Input FAQ
                </a>
                <a href="{{ route('admin.berita.index') }}" class="nav-link mb-2 {{ request()->routeIs('admin.berita.index') ? 'active' : '' }}">
                    <i class="bi bi-newspaper me-2"></i> Input Berita
                </a>
                <a href="{{ route('admin.manajemenmitra.index') }}" class="nav-link mb-2 {{ request()->routeIs('admin.manajemenmitra.index') ? 'active' : '' }}">
                    <i class="bi bi-person-lines-fill me-2"></i> Manajemen Mitra
                </a>
                <a href="{{ route('admin.forum.index') }}" class="nav-link mb-2 {{ request()->routeIs('admin.forum.index') ? 'active' : '' }}">
                    <i class="bi bi-newspaper me-2"></i> Manage Forum
                </a>
            </div>
        </div>

        <!-- User Profile & Dropdown -->
        <div class="mt-auto p-3 border-top">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                        style="width: 40px; height: 40px;">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="ms-3">
                        <div class="fw-bold">{{ Auth::user()->name }}</div>
                        <small class="text-muted">Admin</small>
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

<!-- Custom Styles -->
<style>
.sidebar {
    width: 280px;
    height: 100vh;
    position: fixed;
    left: 0;
    top: 0;
    border-right: 1px solid #e5e7eb;
    z-index: 1000;
}

.nav-link {
    color: var(--giveat-text, #374151);
    border-radius: 0.5rem;
    padding: 0.75rem 1rem;
    transition: all 0.2s;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
}

.nav-link:hover {
    background-color: var(--giveat-hover, #f3f4f6);
    color: var(--giveat-primary, #2563eb);
}

.nav-link.active {
    background-color: var(--giveat-hover, #f3f4f6);
    color: var(--giveat-primary, #2563eb);
    font-weight: 500;
}

main {
    margin-left: 280px;
}

.logo-img {
    height: 45px;
    width: auto;
    object-fit: contain;
}
</style>
