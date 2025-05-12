<!DOCTYPE html>
<html lang="id">

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Masuk - GivEat</title>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
		<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen items-center justify-center bg-white font-[Poppins]">
		<div class="mx-auto flex w-full max-w-6xl overflow-hidden rounded-2xl px-10">
				<!-- Left: Image -->
				<div class="hidden w-1/2 items-center justify-center bg-cover bg-center p-10 md:flex">
						<img src="{{ asset('images/login-image.png') }}" alt="GivEat" class="mx-auto mb-4">
				</div>

				<!-- Right: Form -->
				<div class="w-full p-10 md:w-1/2">
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
										<label class="block text-gray-700">Email</label>
										<input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email anda"
												class="w-full rounded-full border px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
										@error('email')
												<span class="text-sm text-red-600">{{ $message }}</span>
										@enderror
								</div>

								<div class="relative mb-4">
										<label class="block text-gray-700">Password</label>
										<input type="password" id="password" name="password"
												class="w-full rounded-full border px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-600"
												placeholder="JohnDoe123" required>
										<button type="button" onclick="togglePassword('password', 'togglePasswordIcon')"
												class="absolute right-3 top-9 text-gray-600">
												<svg id="togglePasswordIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill [Rest of SVG paths
														unchanged] </button>
								</div>
								<div class="mb-4">
										<a href="#" class="text-grey-300">Lupa Password?</a>
								</div>

								<button type="submit" class="w-full rounded-full bg-green-700 py-2 text-white transition hover:bg-green-800">
										Masuk
								</button>

								<p class="mt-4 text-center text-sm text-gray-700">Belum memiliki akun?
										<a href="/register" class="font-semibold text-green-700">Daftar</a>
								</p>
						</form>
				</div>
		</div>

		<script>
				function togglePassword(inputId, iconId) {
						const input = document.getElementById(inputId);
						const icon = document.getElementById(iconId);
						const isHidden = input.type === "password";
						input.type = isHidden ? "text" : "password";
				}
		</script>
</body>

</html>
