<!DOCTYPE html>
<html lang="id">

<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Profil Saya - GivEat</title>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
		<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-[Poppins]">

		<div class="flex min-h-screen">
				<!-- Sidebar -->
				<aside class="w-80 py-8">
						<div class="mb-10 ml-20 flex items-center">
								<a href="{{ route('donation.show', 1) }}">
										<img src="{{ asset('images/logo-giveat-hitam.png') }}" alt="Logo" class="h-auto w-40">
								</a>
						</div>
						<div class="ml-10 rounded-[50px] bg-white px-6 py-8">
								<nav class="space-y-3">
										<!-- Menu Profile -->
										<a id="btnProfile" href="{{ route('profile') }}"
												class="menu-item {{ Route::is('profile') ? 'bg-[#EEF6F3] px-4 py-3 font-semibold text-green-700' : 'px-4 py-3 text-[#666]' }} flex w-full items-center gap-4 rounded-[40px]">
												<!-- default aktif -->
												<svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
														<path fill-rule="evenodd" clip-rule="evenodd"
																d="M12 15.3c-3.87 0-7.17.59-7.17 2.93 0 2.34 3.28 2.94 7.17 2.94s7.17-.6 7.17-2.94c0-2.34-3.29-2.93-7.17-2.93Zm0-3.34a4.59 4.59 0 1 0 0-9.17 4.59 4.59 0 0 0 0 9.17Z" />
												</svg>
												<span>Profile</span>
										</a>
										<!-- Menu Ganti Password -->
										<a id="btnPassword" href="{{ route('password.change') }}"
												class="menu-item {{ Route::is('password.change') ? 'bg-[#EEF6F3] px-4 py-3 font-semibold text-green-700' : 'px-4 py-3 text-[#666]' }} flex w-full items-center gap-4 rounded-[40px]">
												<svg class="h-8 w-8 stroke-current" viewBox="0 0 25 25" fill="none">
														<path
																d="M12.5 10.4v4.17m-1.8-2.7 3.6 2.08m0-2.08-3.61 2.08M7 10.4v4.17M5.2 11.46l3.61 2.08m0-2.08-3.61 2.08M18 10.4v4.17m-1.8-2.7 3.61 2.08m0-2.08-3.61 2.08M22.92 12.5c0 3.93 0 5.89-1.22 7.11-1.22 1.22-3.18 1.22-7.11 1.22h-4.17c-3.93 0-5.88 0-7.11-1.22C2.08 18.39 2.08 16.43 2.08 12.5c0-3.93 0-5.88 1.23-7.11C4.53 4.17 6.48 4.17 10.42 4.17h4.16c3.94 0 5.89 0 7.12 1.22.68.68.98 1.58 1.11 2.94"
																stroke-width="1.5" stroke-linecap="round" />
												</svg>
												<span>Ganti Password</span>
										</a>
										<!-- Menu Keluar -->
										<form action="{{ route('logout') }}" method="POST">
												@csrf
												<button type="submit" class="ap-4 flex w-full items-center rounded-[40px] px-4 py-3 text-red-600">
														<!-- <img src="{{ asset('images/logout-icon.png') }}" alt="Logout Icon" class="mr-4 h-auto w-6"> -->
														<svg viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-4 h-8 w-8">
																<path
																		d="M13.2812 11.458C13.2812 11.2508 13.1989 11.0521 13.0524 10.9056C12.9059 10.7591 12.7072 10.6768 12.5 10.6768C12.2928 10.6768 12.0941 10.7591 11.9476 10.9056C11.8011 11.0521 11.7188 11.2508 11.7188 11.458V13.5413C11.7188 13.7485 11.8011 13.9473 11.9476 14.0938C12.0941 14.2403 12.2928 14.3226 12.5 14.3226C12.7072 14.3226 12.9059 14.2403 13.0524 14.0938C13.1989 13.9473 13.2812 13.7485 13.2812 13.5413V11.458Z"
																		fill="#BF0000" />
																<path fill-rule="evenodd" clip-rule="evenodd"
																		d="M14.2969 2.11104L16.8323 2.53396C18.0354 2.73396 19.0115 2.89646 19.774 3.12354C20.5687 3.36104 21.225 3.69229 21.7302 4.28812C22.2354 4.88396 22.4552 5.58708 22.5573 6.41C22.6562 7.19958 22.6562 8.18916 22.6562 9.41V15.5902C22.6562 16.81 22.6562 17.7985 22.5573 18.5892C22.4552 19.4121 22.2354 20.1142 21.7302 20.711C21.225 21.3069 20.5687 21.6381 19.774 21.8746C19.0115 22.1027 18.0354 22.2652 16.8323 22.4652L14.2969 22.8881C13.2208 23.0673 12.3302 23.2162 11.6198 23.2329C10.874 23.2506 10.1833 23.1308 9.60625 22.6423C9.11979 22.2308 8.87917 21.6944 8.75208 21.0933H8.27708C7.09792 21.0933 6.13333 21.0933 5.37083 20.9912C4.57604 20.884 3.88646 20.6527 3.33542 20.1017C2.78437 19.5506 2.55313 18.8621 2.44583 18.0652C2.34375 17.3048 2.34375 16.3402 2.34375 15.159V9.84021C2.34375 8.66 2.34375 7.69646 2.44583 6.93396C2.55313 6.13916 2.78437 5.44958 3.33542 4.89854C3.88646 4.3475 4.575 4.11625 5.37188 4.00896C6.13229 3.90687 7.09687 3.90687 8.27812 3.90687H8.75312C8.87812 3.30583 9.11979 2.76937 9.60729 2.35791C10.1833 1.86833 10.874 1.74958 11.6198 1.76729C12.3302 1.78396 13.2208 1.93291 14.2969 2.11208M8.59375 18.0569C8.59375 18.5944 8.59375 19.086 8.60521 19.5308H8.33333C7.08333 19.5308 6.225 19.5287 5.58021 19.4423C4.95729 19.359 4.65312 19.209 4.44062 18.9965C4.22812 18.784 4.07812 18.4798 3.99479 17.8569C3.90833 17.2121 3.90625 16.3537 3.90625 15.1037V9.89541C3.90625 8.64541 3.90833 7.78708 3.99479 7.14229C4.07812 6.51937 4.22812 6.21521 4.44062 6.00271C4.65312 5.79021 4.95729 5.64021 5.58021 5.55687C6.225 5.47041 7.08333 5.46833 8.33333 5.46833H8.60521C8.59375 5.91312 8.59375 6.40479 8.59375 6.94229V18.0569ZM11.5823 3.32771C11.0167 3.31416 10.7771 3.41312 10.6167 3.54854C10.4563 3.68396 10.3198 3.90479 10.2406 4.46521C10.1573 5.04541 10.1562 5.83604 10.1562 7.00166V17.9975C10.1562 19.1631 10.1583 19.9537 10.2406 20.535C10.3198 21.0944 10.4563 21.3152 10.6167 21.4506C10.7771 21.586 11.0167 21.684 11.5823 21.6704C12.1687 21.6569 12.949 21.5287 14.0979 21.3371L16.525 20.9329C17.7906 20.7215 18.6698 20.5735 19.3281 20.3777C19.9656 20.1881 20.3031 19.9777 20.5385 19.7006C20.774 19.4225 20.924 19.0558 21.0073 18.3954C21.0927 17.7142 21.0938 16.8225 21.0938 15.5381V9.46104C21.0938 8.17666 21.0927 7.285 21.0073 6.60375C20.924 5.94333 20.7729 5.57562 20.5385 5.29854C20.3031 5.02146 19.9656 4.81104 19.3281 4.62146C18.6698 4.42562 17.7906 4.27771 16.524 4.06625L14.0979 3.66208C12.949 3.47041 12.1687 3.34229 11.5823 3.32875"
																		fill="#BF0000" />
														</svg>
														<span>Keluar</span>
												</button>
										</form>

								</nav>
						</div>
				</aside>

				<!-- Main Content -->
				<main class="flex-1 p-10">
						<h1 class="mb-1 text-2xl font-semibold">Ganti Password </h1>
						<p class="mb-8 text-gray-500">Atur ulang password kamu.</p>


						<!-- Ganti Password Section -->
						<div id="passwordContent" class="max-w-6xl rounded-[50px] bg-white p-8">
								<h2 class="mb-6 text-xl font-semibold">Ganti Password</h2>
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
								<form method="POST" action="{{ route('password.update') }}" class="space-y-6">
										@csrf
										<div class="relative">
												<label class="mb-1 block text-sm font-medium">Password Saat Ini</label>
												<input type="password" name="current_password" id="current_password"
														class="w-full rounded-full border border-gray-300 px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-800"
														required />
												<button type="button"
														onclick="togglePassword('current_password', 'current_eye_open', 'current_eye_closed')"
														class="absolute right-3 top-9 text-gray-500">
														<svg id="current_eye_open" class="hidden h-5 w-5" fill="none" stroke="currentColor"
																viewBox="0 0 24 24">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
														</svg>
														<svg id="current_eye_closed" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
														</svg>
												</button>
												@error('current_password')
														<span class="text-sm text-red-600">{{ $message }}</span>
												@enderror
										</div>
										<div class="relative">
												<label class="mb-1 block text-sm font-medium">Password Baru</label>
												<input type="password" name="new_password" id="new_password"
														class="w-full rounded-full border border-gray-300 px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-800"
														required />
												<button type="button" onclick="togglePassword('new_password', 'new_eye_open', 'new_eye_closed')"
														class="absolute right-3 top-9 text-gray-500">
														<svg id="new_eye_open" class="hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
														</svg>
														<svg id="new_eye_closed" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
														</svg>
												</button>
												@error('new_password')
														<span class="text-sm text-red-600">{{ $message }}</span>
												@enderror
										</div>
										<div class="relative">
												<label class="mb-1 block text-sm font-medium">Konfirmasi Password Baru</label>
												<input type="password" name="new_password_confirmation" id="new_password_confirmation"
														class="w-full rounded-full border border-gray-300 px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-green-800"
														required />
												<button type="button"
														onclick="togglePassword('new_password_confirmation', 'confirm_eye_open', 'confirm_eye_closed')"
														class="absolute right-3 top-9 text-gray-500">
														<svg id="confirm_eye_open" class="hidden h-5 w-5" fill="none" stroke="currentColor"
																viewBox="0 0 24 24">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
														</svg>
														<svg id="confirm_eye_closed" class="h-5 w-5" fill="none" stroke="currentColor"
																viewBox="0 0 24 24">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
														</svg>
												</button>
												@error('new_password_confirmation')
														<span class="text-sm text-red-600">{{ $message }}</span>
												@enderror
										</div>
										<div class="pt-6">
												<button type="submit"
														class="w-full rounded-full bg-green-800 py-3 text-white hover:bg-green-900">Simpan</button>
										</div>
								</form>
						</div>
				</main>
		</div>







		<!-- Toggle Script -->
		<script>
				function togglePassword(inputId, openEyeId, closedEyeId) {
						const input = document.getElementById(inputId);
						const openEye = document.getElementById(openEyeId);
						const closedEye = document.getElementById(closedEyeId);

						if (input.type === 'password') {
								input.type = 'text';
								openEye.classList.remove('hidden');
								closedEye.classList.add('hidden');
						} else {
								input.type = 'password';
								openEye.classList.add('hidden');
								closedEye.classList.remove('hidden');
						}
				}
		</script>



</body>

</html>
