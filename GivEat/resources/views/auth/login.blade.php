<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center">
        <h2 class="mb-5 mt-10 text-3xl font-bold text-gray-900">Selamat Datang Kembali</h2>
        <p class="mb-10 text-gray-600">Selamat datang kembali, ayo lanjutkan hal-hal baik kamu disini!</p>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif
    @if ($errors->has('email'))
        <div class="mb-4 text-red-600">{{ $errors->first('email') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
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
        </div>

        <div class="mb-4">
            <a href="{{ route('password.request') }}" class="text-gray-600" style="font-size: 14px;">Lupa Password?</a>
        </div>

        <button type="submit" class="w-full rounded-full bg-green-700 py-2 text-white transition hover:bg-green-800">
            Masuk
        </button>

        <p class="mt-4 text-center text-sm text-gray-700">Belum memiliki akun?
            <a href="{{ route('register') }}" class="font-semibold text-green-700">Daftar</a>
        </p>
    </form>
</x-guest-layout>
