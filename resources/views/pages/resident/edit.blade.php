@extends('layouts.dashboard')
@section('title', 'Edit Data Penduduk')

@section('content')
	<form action="{{ route('resident.update', $resident->id) }}" method="POST" class="space-y-4">
		@csrf
		@method('PUT')

		<div class="grid gap-4 md:grid-cols-2">
			<div>
				<label for="nik" class="mb-1 block font-medium">NIK</label>
				<input type="text" name="nik" id="nik" value="{{ old('nik', $resident->nik) }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,16)" placeholder="Masukan NIK Kependudukan"
					required>
			</div>

			<div>
				<label for="nama" class="mb-1 block font-medium">Nama</label>
				<input type="text" name="nama" id="nama" value="{{ old('nama', $resident->nama) }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan nama lengkap" required>
			</div>

			<div>
				<label for="jenis_kelamin" class="mb-1 block font-medium">Jenis Kelamin</label>
				<select name="jenis_kelamin" id="jenis_kelamin"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					required>
					<option value="">-- Pilih --</option>
					<option value="L" {{ old('jenis_kelamin', $resident->jenis_kelamin) == 'L' ? 'selected' : '' }}>
						Laki-laki</option>
					<option value="P" {{ old('jenis_kelamin', $resident->jenis_kelamin) == 'P' ? 'selected' : '' }}>
						Perempuan</option>
				</select>
			</div>

			<div>
				<label for="tempat_lahir" class="mb-1 block font-medium">Tempat Lahir</label>
				<input type="text" name="tempat_lahir" id="tempat_lahir"
					value="{{ old('tempat_lahir', $resident->tempat_lahir) }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan tempat lahir">
			</div>

			<div>
				<label for="tanggal_lahir" class="mb-1 block font-medium">Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" id="tanggal_lahir"
					value="{{ old('tanggal_lahir', $resident->tanggal_lahir) }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
			</div>

			<div>
				<label for="agama" class="mb-1 block font-medium">Agama</label>
				<select name="agama" id="agama"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					<option value="">-- Pilih --</option>
					@foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'] as $agama)
						<option value="{{ $agama }}" {{ old('agama', $resident->agama) == $agama ? 'selected' : '' }}>
							{{ $agama }}</option>
					@endforeach
				</select>
			</div>

			<div>
				<label for="status_perkawinan" class="mb-1 block font-medium">Status Perkawinan</label>
				<select name="status_perkawinan" id="status_perkawinan"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					<option value="">-- Pilih --</option>
					@foreach (['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $status)
						<option value="{{ $status }}"
							{{ old('status_perkawinan', $resident->status_perkawinan) == $status ? 'selected' : '' }}>
							{{ $status }}</option>
					@endforeach
				</select>
			</div>

			<div>
				<label for="pekerjaan" class="mb-1 block font-medium">Pekerjaan</label>
				<input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $resident->pekerjaan) }}"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
					placeholder="Masukan perkerjaan saat ini">
			</div>

			<div class="col-span-2">
				<label for="pendidikan" class="mb-1 block font-medium">Pendidikan</label>
				<select name="pendidikan" id="pendidikan"
					class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
					<option value="">-- Pilih Pendidikan --</option>
					@foreach (['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'] as $pendidikan)
						<option value="{{ $pendidikan }}"
							{{ old('pendidikan', $resident->pendidikan) == $pendidikan ? 'selected' : '' }}>{{ $pendidikan }}
						</option>
					@endforeach
				</select>
			</div>
		</div>

		<div>
			<label for="alamat" class="mb-1 block font-medium">Alamat</label>
			<textarea name="alamat" id="alamat" rows="3"
			 class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50"
			 placeholder="Masukan alamat lengkap">{{ old('alamat', $resident->alamat) }}</textarea>
		</div>

		<div class="grid grid-cols-2 gap-4 md:grid-cols-3">
			@foreach (['rt', 'rw', 'desa', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos'] as $field)
				<div>
					<label for="{{ $field }}"
						class="mb-1 block font-medium">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
					<input type="text" name="{{ $field }}" id="{{ $field }}"
						value="{{ old($field, $resident->$field) }}"
						class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
				</div>
			@endforeach
		</div>

		<div class="pt-4">
			<button type="submit"
				class="rounded-lg bg-blue-600 px-4 py-2 font-bold text-white hover:cursor-pointer hover:bg-blue-500">Simpan</button>
			<a href="{{ route('resident.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
		</div>
	</form>
@endsection
