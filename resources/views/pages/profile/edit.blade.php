@extends('layouts.dashboard')
@section('title', 'Edit Profil Desa')

@section('content')
  <div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-600">Kelola informasi profil desa yang ditampilkan di website</p>
      </div>
    </div>

    <!-- Form -->
    <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <!-- Basic Information -->
      <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Dasar</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="village_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Desa</label>
            <input type="text" name="village_name" id="village_name"
              value="{{ old('village_name', $villageProfile->village_name ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('village_name')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="district" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
            <input type="text" name="district" id="district"
              value="{{ old('district', $villageProfile->district ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('district')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="regency" class="block text-sm font-medium text-gray-700 mb-2">Kabupaten</label>
            <input type="text" name="regency" id="regency"
              value="{{ old('regency', $villageProfile->regency ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('regency')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="province" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
            <input type="text" name="province" id="province"
              value="{{ old('province', $villageProfile->province ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('province')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <!-- Vision & Mission -->
      <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Visi & Misi</h3>
        <div class="space-y-6">
          <div>
            <label for="vision" class="block text-sm font-medium text-gray-700 mb-2">Visi</label>
            <textarea name="vision" id="vision" rows="3"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('vision', $villageProfile->vision ?? '') }}</textarea>
            @error('vision')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="mission" class="block text-sm font-medium text-gray-700 mb-2">Misi</label>
            <textarea name="mission" id="mission" rows="6"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('mission', $villageProfile->mission ?? '') }}</textarea>
            <p class="text-sm text-gray-500 mt-1">Gunakan • untuk membuat bullet points</p>
            @error('mission')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <!-- History -->
      <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Sejarah Desa</h3>
        <div>
          <label for="history" class="block text-sm font-medium text-gray-700 mb-2">Sejarah</label>
          <textarea name="history" id="history" rows="6"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('history', $villageProfile->history ?? '') }}</textarea>
          @error('history')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Geographic Information -->
      <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Geografis</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="area_size" class="block text-sm font-medium text-gray-700 mb-2">Luas Wilayah</label>
            <input type="text" name="area_size" id="area_size"
              value="{{ old('area_size', $villageProfile->area_size ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('area_size')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="topography" class="block text-sm font-medium text-gray-700 mb-2">Topografi</label>
            <input type="text" name="topography" id="topography"
              value="{{ old('topography', $villageProfile->topography ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('topography')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="climate" class="block text-sm font-medium text-gray-700 mb-2">Iklim</label>
            <input type="text" name="climate" id="climate"
              value="{{ old('climate', $villageProfile->climate ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('climate')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="google_maps_url" class="block text-sm font-medium text-gray-700 mb-2">URL Google Maps</label>
            <input type="url" name="google_maps_url" id="google_maps_url"
              value="{{ old('google_maps_url', $villageProfile->google_maps_url ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('google_maps_url')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="mt-6">
          <label for="boundaries" class="block text-sm font-medium text-gray-700 mb-2">Batas Wilayah</label>
          <textarea name="boundaries" id="boundaries" rows="4"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('boundaries', $villageProfile->boundaries ?? '') }}</textarea>
          <p class="text-sm text-gray-500 mt-1">Gunakan • untuk membuat bullet points</p>
          @error('boundaries')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mt-6">
          <label for="geographic_info" class="block text-sm font-medium text-gray-700 mb-2">Informasi Geografis
            Detail</label>
          <textarea name="geographic_info" id="geographic_info" rows="3"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('geographic_info', $villageProfile->geographic_info ?? '') }}</textarea>
          @error('geographic_info')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Village Officials -->
      <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Struktur Pemerintahan Desa</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="head_village_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Kepala
              Desa</label>
            <input type="text" name="head_village_name" id="head_village_name"
              value="{{ old('head_village_name', $villageProfile->head_village_name ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('head_village_name')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="secretary_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Sekretaris
              Desa</label>
            <input type="text" name="secretary_name" id="secretary_name"
              value="{{ old('secretary_name', $villageProfile->secretary_name ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('secretary_name')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="treasurer_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Kaur
              Keuangan</label>
            <input type="text" name="treasurer_name" id="treasurer_name"
              value="{{ old('treasurer_name', $villageProfile->treasurer_name ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('treasurer_name')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="bpd_chairman" class="block text-sm font-medium text-gray-700 mb-2">Nama Ketua BPD</label>
            <input type="text" name="bpd_chairman" id="bpd_chairman"
              value="{{ old('bpd_chairman', $villageProfile->bpd_chairman ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bpd_chairman')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="bpd_vice_chairman" class="block text-sm font-medium text-gray-700 mb-2">Nama Wakil Ketua
              BPD</label>
            <input type="text" name="bpd_vice_chairman" id="bpd_vice_chairman"
              value="{{ old('bpd_vice_chairman', $villageProfile->bpd_vice_chairman ?? '') }}"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bpd_vice_chairman')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <!-- Logo Upload -->
      <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Logo Desa</h3>
        <div>
          <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Upload Logo</label>
          <input type="file" name="logo" id="logo" accept="image/*"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          @error('logo')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror

          @if ($villageProfile->logo ?? false)
            <div class="mt-2">
              <p class="text-sm text-gray-600 mb-2">Logo saat ini:</p>
              <img src="{{ Storage::url($villageProfile->logo) }}" alt="Logo Desa"
                class="w-32 h-32 object-contain border border-gray-300 rounded-lg">
            </div>
          @endif
        </div>
      </div>

      <!-- Submit Button -->
      <div class="flex justify-end space-x-4">
        <a href="{{ route('dashboard') }}"
          class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
          Batal
        </a>
        <button type="submit"
          class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
@endsection
