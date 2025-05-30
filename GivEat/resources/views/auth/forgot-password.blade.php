<x-guest-layout>
    <div class="text-center">
        <h2 class="mt-10 text-3xl font-bold text-gray-900">Lupa Password</h2>
        <p class="mb-10 text-gray-600">Masukkan email anda untuk mendapatkan link reset password</p>
    </div>

    @if (session('status'))
        <div class="mb-4 text-green-600">{{ session('status') }}</div>
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

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email anda"
                    class="w-full rounded-full border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 text-[14px]" required>
            @error('email')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full rounded-full bg-green-700 py-2 text-white transition hover:bg-green-800">
            Kirim Link Reset
        </button>

        <p class="mt-4 text-center text-sm text-gray-700">
            Sudah ingat password?
            <a href="{{ route('login') }}" class="font-semibold text-green-700">Masuk</a>
        </p>
    </form>
</x-guest-layout>
