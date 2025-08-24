<form method="POST" action="{{ route('complaint.store') }}" enctype="multipart/form-data">
	@csrf

	<div class="mb-3">
		<label class="mb-1 block text-sm font-medium">Nama</label>
		<input type="text" name="name" value="{{ old('name') }}"
			class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
			placeholder="Nama Anda" required>
	</div>
	<div class="mb-3">
		<label class="mb-1 block text-sm font-medium">No. HP</label>
		<input type="text" name="no_hp" value="{{ old('no_hp') }}"
			class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
			placeholder="08xxxxxxxxxx" required>
	</div>
	<div class="mb-3">
		<label class="mb-1 block text-sm font-medium">Kategori Pengaduan</label>
		<select name="status"
			class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
			required>
			<option value="">Pilih Kategori</option>
			<option value="umum" {{ old('status') == 'umum' ? 'selected' : '' }}>Umum</option>
			<option value="sosial" {{ old('status') == 'sosial' ? 'selected' : '' }}>Sosial</option>
			<option value="keamanan" {{ old('status') == 'keamanan' ? 'selected' : '' }}>Keamanan</option>
			<option value="kesehatan" {{ old('status') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
			<option value="kebersihan" {{ old('status') == 'kebersihan' ? 'selected' : '' }}>Kebersihan</option>
			<option value="permintaan" {{ old('status') == 'permintaan' ? 'selected' : '' }}>Permintaan</option>
		</select>
	</div>
	<div class="mb-3">
		<label class="mb-1 block text-sm font-medium">Isi Pengaduan</label>
		<textarea name="content"
		 class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
		 rows="4" placeholder="Tulis pengaduan Anda..." required>{{ old('content') }}</textarea>
	</div>
	<div class="mb-3">
		<label class="mb-1 block text-sm font-medium">Lampiran (opsional)</label>
		<input type="file" name="image"
			class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
			accept="image/*,application/pdf">
	</div>
	<div class="flex justify-end">
		<button type="submit"
			class="w-full rounded-lg bg-pink-600 px-4 py-2 text-white hover:cursor-pointer hover:bg-pink-700">Kirim</button>
	</div>
</form>
