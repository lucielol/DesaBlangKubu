@extends('layouts.dashboard')
@section('title', 'Tambah Berita')

@section('content')
	<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
		@csrf

		<div class="mb-4">
			<label class="mb-1 block font-semibold">Judul Berita</label>
			<input type="text" name="title" value="{{ old('title') }}"
				class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
				required>
		</div>

		<div class="mb-4">
			<label class="mb-1 block font-semibold">Isi Berita</label>
			<textarea id="content" name="content" rows="8"
			 class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">{{ old('content') }}</textarea>
		</div>

		<div class="mb-4">
			<label class="mb-1 block font-semibold">Thumbnail</label>
			<input type="file" name="thumbnail" class="w-full rounded-lg border border-gray-200 px-3 py-2"
				placeholder="Pilih gambar thumbnail">
		</div>

		<input type="hidden" name="status" value="published">

		<div class="flex justify-end gap-2">
			<a href="{{ route('news.list') }}" class="rounded-lg bg-gray-200 px-4 py-2 text-gray-700 hover:bg-gray-300">Batal</a>
			<button type="submit" class="rounded-lg bg-blue-600 px-4 py-2 font-bold text-white hover:bg-blue-700">Simpan</button>
		</div>
	</form>
@endsection

@section('scripts')
	<script src="https://cdn.tiny.cloud/1/aig3lbb8snjje9ua56sre26zhe4az80b8gtvxe3bmbd0b690/tinymce/8/tinymce.min.js"
		referrerpolicy="origin" crossorigin="anonymous"></script>

	<script>
		let autosaveTimeout = null;
		let isSaving = false;
		let lastDraftId = null;

		function triggerAutosave() {
			if (autosaveTimeout) clearTimeout(autosaveTimeout);
			autosaveTimeout = setTimeout(autosaveDraft, 1200); // 1.2s debounce
		}

		function autosaveDraft() {
			if (isSaving) return;
			const title = document.querySelector('input[name="title"]').value;
			if (!title.trim()) {
				document.getElementById('autosave-indicator').textContent = '';
				return;
			}
			isSaving = true;
			document.getElementById('autosave-indicator').textContent = 'Menyimpan draf...';

			let content = '';
			if (window.tinymce && tinymce.get('content')) {
				content = tinymce.get('content').getContent();
			} else {
				content = document.querySelector('textarea[name="content"]').value;
			}

			fetch("{{ route('news.autosave') }}", {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
					},
					body: JSON.stringify({
						title,
						content
					})
				})
				.then(res => res.json())
				.then(data => {
					isSaving = false;
					if (data.success) {
						lastDraftId = data.draft_id;
						document.getElementById('autosave-indicator').textContent = 'Draf tersimpan otomatis';
					} else {
						document.getElementById('autosave-indicator').textContent = 'Gagal menyimpan draf';
					}
				})
				.catch(() => {
					isSaving = false;
					document.getElementById('autosave-indicator').textContent = 'Gagal menyimpan draf';
				});
		}

		document.addEventListener('DOMContentLoaded', function() {
			if (window.tinymce) {
				tinymce.init({
					selector: '#content',
					plugins: 'lists link image table code preview anchor pagebreak autolink charmap fullscreen',
					toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code preview fullscreen',
					menubar: false,
					height: 550,
					branding: false,
					content_css: false,
					setup: function(editor) {
						editor.on('change keyup', function() {
							triggerAutosave();
						});
					}
				});
			}

			document.querySelector('input[name="title"]').addEventListener('input', triggerAutosave);
			document.querySelector('textarea[name="content"]').addEventListener('input', triggerAutosave);
			document.querySelector('form').addEventListener('submit', function(e) {
				if (window.tinymce && tinymce.get('content')) {
					tinymce.get('content').save();
				}
			});
		});
	</script>
	<div id="autosave-indicator" class="mt-2 text-xs text-gray-500"></div>
@endsection
