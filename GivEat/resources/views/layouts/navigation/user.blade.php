<nav x-data="{ open: false }" class="bg-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-16 w-full">
            <!-- Logo kiri -->
            <div class="shrink-0 flex items-center" style="min-width:180px;">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="GivEat" class="logo-img" style="max-width: 150px; height: auto;">
                </a>
            </div>
            <!-- Menu utama center -->
            <style>
                .center-navbar {
                    flex: 1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .center-navbar .nav-link, .center-navbar .nav-link > a, .center-navbar x-nav-link, .center-navbar a {
                    transition: color 0.2s, background 0.2s;
                    font-size: 1rem;
                }
                .center-navbar .nav-link:hover, .center-navbar .nav-link > a:hover, .center-navbar x-nav-link:hover, .center-navbar a:hover {
                    color: #00602B !important;
                    background: transparent !important;
                }
            </style>
            <div class="center-navbar">
                <div class="space-x-8 flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('forum.index')" :active="request()->routeIs('forum.index')">
                        {{ __('Forum') }}
                    </x-nav-link>
                    <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')" class="nav-link">
                        {{ __('Berita') }}
                    </x-nav-link>
                    <x-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.index')" class="nav-link">
                        {{ __('FAQ') }}
                    </x-nav-link>
                    <x-nav-link :href="route('reviews.index')" :active="request()->routeIs('reviews.index')" class="nav-link">
                        {{ __('Review') }}
                    </x-nav-link>
                    <x-nav-link :href="route('claim.history')" :active="request()->routeIs('claim.history')" class="nav-link">
                        {{ __('Riwayat') }}
                    </x-nav-link>
                    <!-- Tambahkan menu lain di sini jika perlu -->
                </div>
            </div>
            <!-- User dropdown kanan -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="profile flex items-center space-x-2">
                                <span>{{ Auth::user()->name }}</span>
                                <a href="{{ route('profile.edit') }}">
                                    <img src="{{ Auth::user()->image ? Storage::url(Auth::user()->image) : asset('profile/default.png') }}"
                                        alt="Profile"
                                        class="w-8 h-8 rounded-full object-cover ml-2">
                                </a>
                            </div>
                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>