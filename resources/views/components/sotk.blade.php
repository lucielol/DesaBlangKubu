<div class="w-full px-2 sm:px-4 md:px-0">
	<h1 class="text-3xl font-bold uppercase text-red-600 sm:text-4xl md:text-5xl">SOTK</h1>
	<span class="text-base sm:text-lg md:text-xl">Struktur Organisasi dan Tata Kerja Desa Blang Kubu</span>

	<div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4 md:grid-cols-3 lg:grid-cols-4">
		@foreach ($items as $sotk)
			<div class="rounded-xl border border-gray-200 bg-white">
				<a href="#">
					<img class="h-56 w-full rounded-t-lg object-cover sm:h-64 md:h-72 lg:h-80"
						src="{{ $sotk->image ?? 'https://penguinui.s3.amazonaws.com/component-assets/card-img-1.webp' }}"
						alt="{{ $sotk->name }}" />
				</a>
				<div class="p-4 text-center sm:p-5">
					<h5 class="mb-2 text-base font-bold uppercase tracking-tight text-gray-900 sm:text-lg md:text-xl">
						{{ $sotk->name }}</h5>
					<p class="mb-3 text-xs text-gray-700 sm:text-sm">{{ $sotk->position ?? 'Tidak ada deskripsi.' }}</p>
				</div>
			</div>
		@endforeach
	</div>
</div>
