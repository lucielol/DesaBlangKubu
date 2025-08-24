@extends('layouts.dashboard')
@section('title', 'Pengajuan Surat Keterangan Lahir')

@section('content')
	<form action="{{ route('letter.birth.store') }}" method="POST" class="space-y-4" onsubmit="return validateKTP()">
		@csrf

		{{-- Bagian Identitas Anak --}}
		<h2 class="text-lg font-semibold">Identitas Anak</h2>
		<div class="grid gap-4 md:grid-cols-2">
			<div>
				<label for="nama" class="mb-1 block font-medium">Nama Anak</label>
				<input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan nama anak">
			</div>

			<div>
				<label for="tempat_lahir" class="mb-1 block font-medium">Tempat Lahir</label>
				<input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan tempat lahir">
			</div>

			<div>
				<label for="tanggal_lahir" class="mb-1 block font-medium">Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>

			<div>
				<label for="jenis_kelamin" class="mb-1 block font-medium">Jenis Kelamin</label>
				<select name="jenis_kelamin" id="jenis_kelamin" required
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					<option value="">-- Pilih --</option>
					<option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
					<option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
				</select>
			</div>

			<div class="col-span-2">
				<label for="anak_ke" class="mb-1 block font-medium">Anak ke-</label>
				<input type="number" name="anak_ke" id="anak_ke" value="{{ old('anak_ke') }}" required
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="1">
			</div>
		</div>

		<hr class="my-6 border-gray-300">

		{{-- Bagian Orang Tua --}}
		<h2 class="text-lg font-semibold">Data Orang Tua</h2>
		<div class="grid gap-6 md:grid-cols-2">
			{{-- Kolom Ayah --}}
			<div>
				<h3 class="mb-2 font-semibold">Ayah</h3>
				<div class="space-y-3">
					<div>
						<label for="nama_ayah" class="block text-sm font-medium">Nama Ayah</label>
						<input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
							placeholder="Masukan nama ayah">
					</div>
					<div>
						<label for="nik_ktp_ayah" class="block text-sm font-medium">Nomor KTP</label>
						<input type="text" name="nomor_ktp_ayah" id="nik_ktp_ayah" value="{{ old('nomor_ktp_ayah') }}"
							oninput="validateKTP(this, 'ktp_ayah_error')" maxlength="16"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
							placeholder="Masukan nomor KTP">
						<div id="ktp_ayah_error" class="mt-1 hidden text-sm text-red-500">
							Nomor KTP harus 16 digit angka
						</div>
					</div>
					<div>
						<label for="tempat_lahir_ayah" class="block text-sm font-medium">Tempat Lahir</label>
						<input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah') }}"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
							placeholder="Masukan tempat lahir">
					</div>
					<div>
						<label for="tanggal_lahir_ayah" class="block text-sm font-medium">Tanggal Lahir</label>
						<input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" value="{{ old('tanggal_lahir_ayah') }}"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					</div>
					<div>
						<label for="agama_ayah" class="block text-sm font-medium">Agama</label>
						<select name="agama_ayah" id="agama_ayah"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
							<option value="">-- Pilih Agama --</option>
							<option value="Islam" {{ old('agama_ayah') == 'Islam' ? 'selected' : '' }}>Islam</option>
							<option value="Kristen" {{ old('agama_ayah') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
							<option value="Katolik" {{ old('agama_ayah') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
							<option value="Hindu" {{ old('agama_ayah') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
							<option value="Budha" {{ old('agama_ayah') == 'Budha' ? 'selected' : '' }}>Budha</option>
							<option value="Konghucu" {{ old('agama_ayah') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
							<option value="Lainnya" {{ old('agama_ayah') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
						</select>
					</div>

					<div>
						<label for="pekerjaan_ayah" class="block text-sm font-medium">Pekerjaan</label>
						<input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
							placeholder="Masukan pekerjaan ayah">
					</div>
					<div>
						<label for="alamat_ayah" class="block text-sm font-medium">Alamat</label>
						<textarea name="alamat_ayah" id="alamat_ayah" rows="2"
						 class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
						 placeholder="Masukan alamat lengkap">{{ old('alamat_ayah') }}</textarea>
					</div>
				</div>
			</div>

			{{-- Kolom Ibu --}}
			<div>
				<h3 class="mb-2 font-semibold">Ibu</h3>
				<div class="space-y-3">
					<div>
						<label for="nama_ibu" class="block text-sm font-medium">Nama Ibu</label>
						<input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
							placeholder="Masukan nama ibu">
					</div>
					<div>
						<label for="nik_ktp_ibu" class="block text-sm font-medium">Nomor KTP</label>
						<input id="nik_ktp_ibu" type="text" name="nomor_ktp_ibu" value="{{ old('nomor_ktp_ibu') }}"
							oninput="validateKTP(this, 'ktp_ibu_error')" maxlength="16"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
							placeholder="Masukan nomor KTP">
						<div id="ktp_ibu_error" class="mt-1 hidden text-sm text-red-500">
							Nomor KTP harus 16 digit angka
						</div>
					</div>
					<div>
						<label for="tempat_lahir_ibu" class="block text-sm font-medium">Tempat Lahir</label>
						<input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu') }}"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
							placeholder="Masukan tempat lahir">
					</div>
					<div>
						<label for="tanggal_lahir_ibu" class="block text-sm font-medium">Tanggal Lahir</label>
						<input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" value="{{ old('tanggal_lahir_ibu') }}"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					</div>
					<div>
						<label for="agama_ibu" class="block text-sm font-medium">Agama</label>
						<select name="agama_ibu" id="agama_ibu"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
							<option value="">-- Pilih Agama --</option>
							<option value="Islam" {{ old('agama_ibu') == 'Islam' ? 'selected' : '' }}>Islam</option>
							<option value="Kristen" {{ old('agama_ibu') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
							<option value="Katolik" {{ old('agama_ibu') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
							<option value="Hindu" {{ old('agama_ibu') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
							<option value="Budha" {{ old('agama_ibu') == 'Budha' ? 'selected' : '' }}>Budha</option>
							<option value="Konghucu" {{ old('agama_ibu') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
							<option value="Lainnya" {{ old('agama_ibu') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
						</select>
					</div>

					<div>
						<label for="pekerjaan_ibu" class="block text-sm font-medium">Pekerjaan</label>
						<input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}"
							class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
							placeholder="Masukan pekerjaan ibu">
					</div>
					<div>
						<label for="alamat_ibu" class="block text-sm font-medium">Alamat</label>
						<textarea name="alamat_ibu" id="alamat_ibu" rows="2"
						 class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
						 placeholder="Masukan alamat lengkap">{{ old('alamat_ibu') }}</textarea>
					</div>
				</div>
			</div>
		</div>

		<hr class="my-6 border-gray-300">

		{{-- Surat Pengantar --}}
		<div class="grid gap-6 md:grid-cols-2">
			<div>
				<label for="nomor_pengantar" class="mb-1 block font-medium">Nomor Surat Pengantar RT</label>
				<input type="text" name="nomor_pengantar" id="nomor_pengantar" value="{{ old('nomor_pengantar') }}"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan nomor surat pengantar dari RT">
			</div>
			<div>
				<label for="nama_pelapor" class="mb-1 block font-medium">Nama Pelapor</label>
				<input type="text" name="nama_pelapor" id="nama_pelapor" value="{{ old('nama_pelapor') }}"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan nama pelapor">
			</div>
		</div>

		{{-- Tombol Submit --}}
		<div class="flex justify-end gap-2 pt-6">
			<a href="{{ route('letter.index') }}"
				class="rounded-lg bg-gray-200 px-4 py-2 text-gray-700 hover:bg-gray-300">Batal</a>
			<button type="submit"
				class="rounded-lg bg-blue-600 px-4 py-2 font-bold text-white hover:bg-blue-700">Simpan</button>
		</div>
	</form>
@endsection

@section('scripts')
	<script>
		function validateKTP(inputElement, errorElementId) {
			const ktpValue = inputElement.value;
			const errorElement = document.getElementById(errorElementId);
			// Remove non-digit characters
			inputElement.value = ktpValue.replace(/\D/g, '');
			// Validate exactly 16 digits
			if (inputElement.value.length !== 16 && inputElement.value.length > 0) {
				errorElement.classList.remove('hidden');
			} else {
				errorElement.classList.add('hidden');
			}
		}
		// Add form submission validation
		document.querySelector('form').addEventListener('submit', function(e) {
			const ktpAyah = document.getElementById('nomor_ktp_ayah').value;
			const ktpIbu = document.getElementById('nomor_ktp_ibu').value;
			let isValid = true;
			if (ktpAyah.length !== 16) {
				document.getElementById('ktp_ayah_error').classList.remove('hidden');
				isValid = false;
			}
			if (ktpIbu.length !== 16) {
				document.getElementById('ktp_ibu_error').classList.remove('hidden');
				isValid = false;
			}
			if (!isValid) {
				e.preventDefault();
			}
		});
	</script>
@endsection
