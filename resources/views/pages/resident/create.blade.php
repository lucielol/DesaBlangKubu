@extends('layouts.dashboard')
@section('title', 'Tambah Penduduk')

@section('content')
	<form action="{{ route('resident.store') }}" method="POST" class="space-y-4">
		@csrf

		<div class="grid gap-4 md:grid-cols-2">
			<div>
				<label for="nik" class="mb-1 block font-medium">NIK</label>
				<input type="text" name="nik" id="nik" value="{{ old('nik') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,16)" placeholder="Masukan NIK Kependudukan"
					required>
			</div>

			<div>
				<label for="nama" class="mb-1 block font-medium">Nama</label>
				<input type="text" name="nama" id="nama" value="{{ old('nama') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan nama lengkap" required>
			</div>

			<div>
				<label for="jenis_kelamin" class="mb-1 block font-medium">Jenis Kelamin</label>
				<select name="jenis_kelamin" id="jenis_kelamin"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					required>
					<option value="">-- Pilih --</option>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</div>

			<div>
				<label for="tempat_lahir" class="mb-1 block font-medium">Tempat Lahir</label>
				<input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan tempat lahir">
			</div>

			<div>
				<label for="tanggal_lahir" class="mb-1 block font-medium">Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>

			<div>
				<label for="agama" class="mb-1 block font-medium">Agama</label>
				<select name="agama" id="agama"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					<option value="">-- Pilih --</option>
					<option value="Islam">Islam</option>
					<option value="Kristen">Kristen</option>
					<option value="Katolik">Katolik</option>
					<option value="Hindu">Hindu</option>
					<option value="Budha">Budha</option>
					<option value="Konghucu">Konghucu</option>
				</select>
			</div>

			<div>
				<label for="status_perkawinan" class="mb-1 block font-medium">Status Perkawinan</label>
				<select name="status_perkawinan" id="status_perkawinan"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					<option value="">-- Pilih --</option>
					<option value="Belum Kawin">Belum Kawin</option>
					<option value="Kawin">Kawin</option>
					<option value="Cerai Hidup">Cerai Hidup</option>
					<option value="Cerai Mati">Cerai Mati</option>
				</select>
			</div>

			<div>
				<label for="pekerjaan" class="mb-1 block font-medium">Pekerjaan</label>
				<input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan perkerjaan saat ini">
			</div>

			<div class="col-span-2">
				<label for="pendidikan" class="mb-1 block font-medium">Pendidikan</label>
				<select name="pendidikan" id="pendidikan"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					<option value="" disabled {{ old('pendidikan') ? '' : 'selected' }}>-- Pilih Pendidikan --</option>
					<option value="Tidak Sekolah" {{ old('pendidikan') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah
					</option>
					<option value="SD" {{ old('pendidikan') == 'SD' ? 'selected' : '' }}>SD</option>
					<option value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected' : '' }}>SMP</option>
					<option value="SMA" {{ old('pendidikan') == 'SMA' ? 'selected' : '' }}>SMA</option>
					<option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>D3</option>
					<option value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>S1</option>
					<option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
					<option value="S3" {{ old('pendidikan') == 'S3' ? 'selected' : '' }}>S3</option>
				</select>
			</div>

		</div>

		<div>
			<label for="alamat" class="mb-1 block font-medium">Alamat</label>
			<textarea name="alamat" id="alamat" rows="3"
			 class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
			 placeholder="Masukan alamat lengkap">{{ old('alamat') }}</textarea>
		</div>

		<div class="grid grid-cols-2 gap-4 md:grid-cols-3">
			<div>
				<label for="rt" class="mb-1 block font-medium">RT</label>
				<input type="text" name="rt" id="rt" value="{{ old('rt') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>
			<div>
				<label for="rw" class="mb-1 block font-medium">RW</label>
				<input type="text" name="rw" id="rw" value="{{ old('rw') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>
			<div>
				<label for="desa" class="mb-1 block font-medium">Desa</label>
				<input type="text" name="desa" id="desa" value="{{ old('desa') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>
			<div>
				<label for="kecamatan" class="mb-1 block font-medium">Kecamatan</label>
				<input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>
			<div>
				<label for="kabupaten" class="mb-1 block font-medium">Kabupaten</label>
				<input type="text" name="kabupaten" id="kabupaten" value="{{ old('kabupaten') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>
			<div>
				<label for="provinsi" class="mb-1 block font-medium">Provinsi</label>
				<input type="text" name="provinsi" id="provinsi" value="{{ old('provinsi') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>
			<div>
				<label for="kode_pos" class="mb-1 block font-medium">Kode Pos</label>
				<input type="text" name="kode_pos" id="kode_pos" value="{{ old('kode_pos') }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>
		</div>

		<div class="pt-4">
			<button type="submit"
				class="rounded-lg bg-blue-600 px-4 py-2 font-bold text-white hover:bg-blue-500">Simpan</button>
			<a href="{{ route('resident.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
		</div>
	</form>
@endsection
