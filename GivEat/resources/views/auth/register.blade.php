<x-guest-layout>
    <div class="text-center">
        <h2 class="mt-10 text-3xl font-bold text-gray-900">Daftar Sekarang</h2>
        <p class="mb-10 text-gray-600">Ayo buat akun dan mulai langkah besarmu sekarang</p>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap"
                    class="w-full rounded-full border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 text-[14px]" required>
            @error('name')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email anda"
                    class="w-full rounded-full border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 text-[14px]" required>
            @error('email')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="relative mb-4">
            <label class="block text-gray-700 mb-2">Password</label>
            <input type="password" id="password" name="password"
                    class="w-full rounded-full border px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-600 text-[14px]"
                    placeholder="Masukkan password anda" required>
            <button type="button" onclick="togglePassword('password', 'togglePasswordIcon')"
                    class="absolute right-3 top-10 text-gray-600">
                <svg id="togglePasswordIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>
            @error('password')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="relative mb-4">
            <label class="block text-gray-700 mb-2">Konfirmasi Password</label>
            <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Konfirmasi password anda"
                    class="w-full rounded-full border px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-600 text-[14px]"
                    required>
            <button type="button" onclick="togglePassword('confirmPassword', 'toggleConfirmIcon')"
                    class="absolute right-3 top-10 text-gray-600">
                <svg id="toggleConfirmIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>
            @error('password_confirmation')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="terms" class="rounded-xl w-4 h-4 text-green-600 border-gray-300 focus:ring-green-500"
                        {{ old('terms') ? 'checked' : '' }}>
                <span class="ml-3 text-sm text-gray-700">Saya menyetujui semua syarat dan kondisi.</span>
            </label>
            @error('terms')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full rounded-full bg-green-700 py-2 text-white transition hover:bg-green-800">
            Daftar
        </button>

        <p class="mt-4 text-center text-sm text-gray-700">Sudah memiliki akun?
            <a href="{{ route('login') }}" class="font-semibold text-green-700">Masuk</a>
        </p>
    </form>
</x-guest-layout>
