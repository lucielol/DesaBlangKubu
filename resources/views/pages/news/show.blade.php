@extends('layouts.app')

@section('content')
	<div class="mx-auto grid w-full grid-cols-1 gap-8 md:grid-cols-3">
		<!-- Detail Berita -->

		<div class="md:col-span-2">
			<!-- Breadcrumb -->
			<nav class="mb-4 text-sm" aria-label="Breadcrumb">
				<ol class="inline-flex list-none items-center space-x-1 p-0">
					<li class="inline-flex items-center">
						<a href="/" class="text-gray-500 hover:text-blue-600"><i class="fa fa-home mr-1"></i> Beranda</a>
					</li>
					<li>
						<span class="mx-2 text-gray-400">/</span>
					</li>
					<li class="inline-flex items-center">
						<a href="{{ route('news.index') }}" class="text-gray-500 hover:text-blue-600">Berita Desa</a>
					</li>
					<li>
						<span class="mx-2 text-gray-400">/</span>
					</li>
					<li class="line-clamp-1 font-semibold text-gray-700">{{ \Illuminate\Support\Str::limit($news->title, 40) }}</li>
				</ol>
			</nav>

			<img src="{{ $news->thumbnail ? asset("storage/{$news->thumbnail}") : asset('images/placeholder.svg') }}"
				class="mb-6 h-96 w-full rounded-lg object-cover">

			<h1 class="mb-2 text-3xl font-bold text-gray-800">{{ $news->title }}</h1>
			<p class="mb-4 text-sm text-gray-500">
				<i class="fa-regular fa-clock me-1"></i> Dipublikasikan pada
				@if ($news->published_at)
					{{ $news->published_at->translatedFormat('d F Y') }}
				@elseif ($news->created_at)
					{{ $news->created_at->translatedFormat('d F Y') }}
				@else
					Tidak diketahui
				@endif
			</p>

			<div class="prose max-w-none">
				{!! $news->content !!}
			</div>
		</div>

		<!-- Berita Terbaru -->
		<aside class="h-[80vh] overflow-y-auto rounded-xl border border-gray-200 bg-white p-4">
			<h2 class="mb-4 text-xl font-bold">Berita Terbaru</h2>
			@foreach ($latestNews as $item)
				<a href="{{ route('news.show', $item->slug) }}"
					class="mb-2 flex items-start gap-3 rounded-lg p-2 transition hover:bg-blue-50">
					<img src="{{ $item->thumbnail ? asset("storage/{$item->thumbnail}") : asset('images/placeholder.svg') }}"
						alt="{{ $item->title }}" class="h-16 w-16 flex-shrink-0 rounded-md object-cover">
					<div>
						<div class="line-clamp-2 text-sm font-semibold">{{ $item->title }}</div>
						<div class="text-xs text-gray-500">
							<i class="fa-regular fa-clock me-1"></i>
							{{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : $item->created_at->translatedFormat('d F Y') }}
							<br>
							<i class="fa-regular fa-eye me-1"></i>
							Dilihat {{ $item->views ?? 0 }} kali
						</div>
					</div>
				</a>
			@endforeach
		</aside>
	</div>
@endsection
