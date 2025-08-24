<form method="POST" action="{{ route('login') }}" class="flex w-full flex-col items-center text-center">
	@csrf

	<h1 class="mb-6 text-2xl font-semibold">MASUK</h1>

	<div class="mb-4 w-full">
		<label for="email" class="mb-1 block text-left text-sm font-medium">Email</label>
		<input type="email" id="email" name="email" required
			class="w-full rounded-lg border border-gray-300 bg-white/50 px-3 py-2 text-sm text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
			placeholder="Masukkan Email" />
	</div>

	<div class="mb-5 flex w-full flex-col gap-1">
		<label for="password" class="mb-1 block text-left text-sm font-medium">Password</label>
		<div x-data="{ showPassword: false }" class="relative">
			<input x-bind:type="showPassword ? 'text' : 'password'" type="password" id="password" name="password" required
				class="w-full rounded-lg border border-gray-300 bg-white/50 px-3 py-2 text-sm text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
				placeholder="Masukkan Password" />
			<button type="button" x-on:click="showPassword = !showPassword"
				class="absolute right-2.5 top-1/2 -translate-y-1/2 hover:cursor-pointer" aria-label="Show password">
				<i x-show="!showPassword" class="fa-regular fa-eye"></i>
				<i x-show="showPassword" class="fa-regular fa-eye-slash"></i>
			</button>
		</div>
	</div>

	<button type="submit"
		class="w-full rounded-lg bg-blue-400 px-5 py-2 text-sm font-semibold text-white hover:bg-blue-500">
		Login
	</button>

	@if (Route::has('register'))
		<p class="mt-4 text-sm text-gray-700">
			Belum punya akun?
			<a href="#" @click.prevent="tab = 'register'" class="text-blue-600 hover:underline">Daftar</a>
		</p>
	@endif
</form>
