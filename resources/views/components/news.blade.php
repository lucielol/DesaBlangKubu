@props(['items'])

<div class="w-full">
	<div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
		<div>
			<h1 class="text-2xl font-bold uppercase text-red-600 sm:text-4xl md:text-5xl">Berita Desa</h1>
			<span class="text-base text-gray-600 sm:text-lg md:text-xl">
				Berbagai informasi terkini dari desa Anda.
			</span>
		</div>
		<a href="{{ route('news.index') }}"
			class="flex w-full items-center justify-center text-base font-semibold sm:w-auto sm:justify-start sm:text-lg">
			<i class="fa-solid fa-newspaper me-2"></i>
			Lihat Berita Lebih Banyak
		</a>
	</div>

	<div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
		@forelse ($items as $item)
			<a href="{{ route('news.show', $item->slug) }}"
				class="group overflow-hidden rounded-xl border border-gray-200 bg-white transition duration-300 hover:border-blue-200 hover:bg-blue-100">
				<img src="{{ $item->thumbnail ? asset("storage/{$item->thumbnail}") : asset('images/placeholder.svg') }}"
					class="h-64 w-full object-cover transition-transform duration-300 group-hover:scale-105">

				<div class="p-4">
					<h2 class="mb-2 text-lg font-bold text-gray-800">{{ $item->title }}</h2>

					<p class="mb-1 text-xs text-gray-500">
						<i class="fa-regular fa-clock me-1"></i>
						{{ \Carbon\Carbon::parse($item->published_at ?? $item->created_at)->translatedFormat('d F Y') }}
					</p>

					<p class="mb-4 text-sm text-gray-600">
						{!! \Illuminate\Support\Str::limit(strip_tags($item->content), 120) !!}
					</p>
				</div>
			</a>
		@empty
			<div class="col-span-3 py-10 text-center text-gray-500">
				Tidak ada berita yang tersedia saat ini.
			</div>
		@endforelse
	</div>
</div>
