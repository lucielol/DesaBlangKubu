@extends('layouts.dashboard')
@section('title', 'Edit Berita')

@section('content')
	<form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')

		<div class="mb-4">
			<label class="mb-1 block font-semibold">Judul Berita</label>
			<input type="text" name="title" value="{{ old('title', $news->title) }}"
				class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
				required>
		</div>

		<div class="mb-4">
			<label class="mb-1 block font-semibold">Isi Berita</label>
			<textarea id="content" name="content" rows="8"
			 class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			 {{ old('content', $news->content) }}
			</textarea>
		</div>

		<div class="mb-4">
			<label class="mb-1 block font-semibold">Thumbnail</label>
			@if ($news->thumbnail)
				<img src="{{ $news->thumbnail ? asset("storage/{$news->thumbnail}") : asset('images/placeholder.svg') }}"
					class="mb-2 h-32 rounded">
			@endif
			<input type="file" name="thumbnail" class="w-full rounded-lg border border-gray-200 px-3 py-2">
		</div>

		<input type="hidden" name="status" value="published">

		<div class="flex justify-end gap-2">
			<a href="{{ route('news.list') }}" class="rounded-lg bg-gray-200 px-4 py-2 text-gray-700 hover:bg-gray-300">Batal</a>
			<button type="submit" class="rounded-lg bg-blue-600 px-4 py-2 font-bold text-white hover:bg-blue-700">Simpan
				Perubahan</button>
		</div>
	</form>
@endsection

@section('scripts')
	<script src="https://cdn.tiny.cloud/1/aig3lbb8snjje9ua56sre26zhe4az80b8gtvxe3bmbd0b690/tinymce/8/tinymce.min.js"
		referrerpolicy="origin" crossorigin="anonymous"></script>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			if (window.tinymce) {
				tinymce.init({
					selector: '#content',
					plugins: 'lists link image table code preview anchor pagebreak autolink charmap fullscreen',
					toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code preview fullscreen',
					menubar: false,
					height: 550,
					branding: false,
					content_css: false
				});
			}

			document.querySelector('form').addEventListener('submit', function(e) {
				if (window.tinymce && tinymce.get('content')) {
					tinymce.get('content').save();
				}
			});
		});
	</script>
	<div id="autosave-indicator" class="mt-2 text-xs text-gray-500"></div>
@endsection
