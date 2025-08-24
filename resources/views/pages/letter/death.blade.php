@extends('layouts.dashboard')
@section('title', 'Pengajuan Surat Kematian')

@section('content')
	<form action="{{ route('letter.death.store') }}" method="POST" class="space-y-4">
		@csrf

		<div class="grid gap-4 md:grid-cols-2">
			<div>
				<label for="nama" class="mb-1 block font-medium">Nama</label>
				<input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>

			<div>
				<label for="tempat_tanggal_lahir" class="mb-1 block font-medium">Tempat, Tanggal Lahir</label>
				<input type="text" name="tempat_tanggal_lahir" id="tempat_tanggal_lahir" value="{{ old('tempat_tanggal_lahir') }}"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>

			<div>
				<label for="agama" class="mb-1 block font-medium">Agama</label>
				<select name="agama" id="agama"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					<option value="">-- Pilih Agama --</option>
					<option value="Islam">Islam</option>
					<option value="Kristen">Kristen</option>
					<option value="Katolik">Katolik</option>
					<option value="Hindu">Hindu</option>
					<option value="Buddha">Buddha</option>
					<option value="Konghucu">Konghucu</option>
				</select>
			</div>

			<div>
				<label for="nik" class="mb-1 block font-medium">NIK</label>
				<input type="text" name="nik" id="nik" value="{{ old('nik') }}"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>

			<div>
				<label for="status_perkawinan" class="mb-1 block font-medium">Status Perkawinan</label>
				<select name="status_perkawinan" id="status_perkawinan"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					<option value="">-- Pilih Status --</option>
					<option value="Belum Kawin">Belum Kawin</option>
					<option value="Kawin">Kawin</option>
					<option value="Cerai Hidup">Cerai Hidup</option>
					<option value="Cerai Mati">Cerai Mati</option>
				</select>
			</div>

			<div>
				<label for="pekerjaan" class="mb-1 block font-medium">Pekerjaan</label>
				<input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>

			<div class="col-span-2">
				<label for="alamat" class="mb-1 block font-medium">Alamat</label>
				<input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>
		</div>

		<hr class="my-6 border-gray-200">

		<div class="grid gap-4 md:grid-cols-2">
			<div>
				<label for="tanggal_meninggal" class="mb-1 block font-medium">Hari, Tanggal Meninggal</label>
				<input type="text" name="tanggal_meninggal" id="tanggal_meninggal" value="{{ old('tanggal_meninggal') }}"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Contoh: Jumat, 08 Juli 2022">
			</div>

			<div>
				<label for="sebab_meninggal" class="mb-1 block font-medium">Sebab Meninggal Dunia</label>
				<input type="text" name="sebab_meninggal" id="sebab_meninggal" value="{{ old('sebab_meninggal') }}"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Contoh: Sakit Menahun">
			</div>

			<div class="col-span-2">
				<label for="lokasi_meninggal" class="mb-1 block font-medium">Lokasi Meninggal</label>
				<input type="text" name="lokasi_meninggal" id="lokasi_meninggal" value="{{ old('lokasi_meninggal') }}"
					class="w-full rounded-lg border border-gray-200 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Contoh: Gampong Lamsiteh">
			</div>
		</div>

		<div class="flex justify-end gap-2 pt-6">
			<a href="{{ route('letter.death.index') }}"
				class="rounded-lg bg-gray-200 px-4 py-2 text-gray-700 hover:bg-gray-300">Batal</a>
			<button type="submit" class="rounded-lg bg-blue-600 px-4 py-2 font-bold text-white hover:bg-blue-700">Simpan</button>
		</div>
	</form>
@endsection
