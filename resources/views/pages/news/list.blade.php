@extends('layouts.dashboard')
@section('title', 'Daftar Berita')

@section('content')
	<div class="mb-3 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
		<a href="{{ route('news.create') }}"
			class="w-full rounded-lg bg-blue-600 px-3 py-1.5 text-center font-bold text-white hover:bg-blue-500 sm:w-auto">
			<i class="fa-solid fa-plus me-1"></i>
			Tambah Berita
		</a>

		<div class="relative w-full sm:w-64">
			<input type="text" name="search" id="search"
				class="focus:ring-3 w-full rounded-lg border border-gray-200 bg-gray-100 px-3 py-1.5 pr-10 outline-0 focus:border-blue-400 focus:ring-blue-400/50"
				placeholder="Cari judul berita...">
			<div id="loading-spinner" class="absolute right-3 top-1/2 hidden -translate-y-1/2">
				<svg class="h-5 w-5 animate-spin text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
					viewBox="0 0 24 24">
					<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
					<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
				</svg>
			</div>
		</div>
	</div>

	<div class="overflow-x-auto">
		<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
			@foreach ($news as $item)
				<div class="relative overflow-hidden rounded-lg border border-gray-200">
					<img src="{{ $item->thumbnail ? asset("storage/{$item->thumbnail}") : asset('images/placeholder.svg') }}"
						class="h-64 w-full object-cover">

					{{-- Overlay (selalu tampil) --}}
					<div class="absolute inset-0 flex flex-col justify-end bg-black/40 p-4">
						<h3 class="line-clamp-2 text-lg font-bold text-white drop-shadow">{{ $item->title }}</h3>
						<p class="mb-2 text-xs text-gray-200">
							{{ $item->published_at ? $item->published_at->format('d M Y') : '-' }}
						</p>

						{{-- Action Buttons: selalu tampil --}}
						<div class="mt-2 flex flex-wrap justify-center gap-2">
							<a href="{{ route('news.show', $item->slug) }}"
								class="rounded-full bg-yellow-500 px-4 py-1.5 text-center text-xs font-semibold text-white hover:bg-yellow-600 sm:text-sm">
								Lihat
							</a>
							<a href="{{ route('news.edit', $item->id) }}"
								class="rounded-full bg-blue-500 px-4 py-1.5 text-center text-xs font-semibold text-white hover:bg-blue-600 sm:text-sm">
								Edit
							</a>
							<form action="{{ route('news.destroy', $item->id) }}" method="POST"
								onsubmit="return confirm('Yakin hapus berita ini?')">
								@csrf
								@method('DELETE')
								<button type="submit"
									class="w-full rounded-full bg-red-500 px-4 py-1.5 text-center text-xs font-semibold text-white hover:bg-red-600 sm:w-auto sm:text-sm">
									Hapus
								</button>
							</form>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		<div class="border-t border-gray-300 p-3">
			{{ $news->links() }}
		</div>
	</div>
@endsection
