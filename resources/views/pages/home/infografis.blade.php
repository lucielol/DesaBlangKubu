@extends('layouts.app')

@section('content')
  <div class="min-h-screen pt-10">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-600 to-green-800 border-green-700 text-white rounded-t-xl">
      <div class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-center mb-4">Infografis Desa Blang Kubu</h1>
        <p class="text-xl text-center text-green-100">Data Demografi dan Statistik Penduduk</p>
      </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="bg-white border border-t-0 border-gray-300 rounded-b-xl">
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap gap-2 py-4">
          <a href="#penduduk" class="px-4 py-2 bg-green-600 text-white rounded-xl font-semibold">Penduduk</a>
          <a href="#apbdes" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-semibold">APBDes</a>
          <a href="#stunting" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-semibold">Stunting</a>
          <a href="#bansos" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-semibold">Bansos</a>
          <a href="#idm" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-semibold">IDM</a>
          <a href="#sdgs" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-semibold">SDGs</a>
        </div>
      </div>
    </div>

    <!-- Content Sections -->
    <div class="container mx-auto px-4 py-12">
      <!-- Demografi Penduduk Section -->
      <div id="penduduk" class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Demografi Penduduk</h2>
          <p class="text-gray-600 max-w-3xl mx-auto">
            Memberikan informasi lengkap mengenai karakteristik demografi penduduk Desa Blang Kubu.
            Mulai dari jumlah penduduk, usia, jenis kelamin, tingkat pendidikan, pekerjaan, agama,
            dan aspek penting lainnya yang menggambarkan komposisi populasi secara rinci.
          </p>
        </div>

        <!-- Statistik Utama -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
          <div class="bg-white rounded-xl p-6 text-center border-l-4 border border-blue-600">
            <div class="w-12 h-12 bg-blue-100 rounded-full mx-auto mb-3 flex items-center justify-center">
              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
              </svg>
            </div>
            <div class="text-3xl font-bold text-blue-600 mb-2">{{ number_format($totalPenduduk) }}</div>
            <p class="text-gray-600 font-semibold">Total Penduduk</p>
          </div>
          <div class="bg-white rounded-xl p-6 text-center border-l-4 border border-green-600">
            <div class="w-12 h-12 bg-green-100 rounded-full mx-auto mb-3 flex items-center justify-center">
              <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                </path>
              </svg>
            </div>
            <div class="text-3xl font-bold text-green-600 mb-2">{{ number_format($kepalaKeluarga) }}</div>
            <p class="text-gray-600 font-semibold">Kepala Keluarga</p>
          </div>
          <div class="bg-white rounded-xl p-6 text-center border-l-4 border border-purple-600">
            <div class="w-12 h-12 bg-purple-100 rounded-full mx-auto mb-3 flex items-center justify-center">
              <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
            </div>
            <div class="text-3xl font-bold text-purple-600 mb-2">{{ number_format($lakiLaki) }}</div>
            <p class="text-gray-600 font-semibold">Laki-Laki</p>
          </div>
          <div class="bg-white rounded-xl p-6 text-center border-l-4 border border-pink-600">
            <div class="w-12 h-12 bg-pink-100 rounded-full mx-auto mb-3 flex items-center justify-center">
              <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
            </div>
            <div class="text-3xl font-bold text-pink-600 mb-2">{{ number_format($perempuan) }}</div>
            <p class="text-gray-600 font-semibold">Perempuan</p>
          </div>
        </div>

        <!-- Grafik dan Chart -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
          <!-- Grafik Kelompok Umur -->
          <div class="bg-white rounded-xl border border-gray-300 p-6">
            <div class="flex items-center mb-4">
              <div class="w-8 h-8 bg-blue-100 rounded-lg mr-3 flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                  </path>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800">Berdasarkan Kelompok Umur</h3>
            </div>
            <div class="space-y-4">
              @foreach ($kelompokUmur as $umur => $jumlah)
                @php
                  $persentase = $totalPenduduk > 0 ? round(($jumlah / $totalPenduduk) * 100, 1) : 0;
                @endphp
                <div class="flex items-center justify-between">
                  <span class="text-sm text-gray-600">{{ $umur }} tahun</span>
                  <div class="flex items-center">
                    <div class="w-32 bg-gray-200 rounded-full h-2 mr-2">
                      <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $persentase }}%"></div>
                    </div>
                    <span class="text-sm font-semibold">{{ number_format($jumlah) }} ({{ $persentase }}%)</span>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <!-- Grafik Berdasarkan Dusun -->
          <div class="bg-white rounded-xl border border-gray-300 p-6">
            <div class="flex items-center mb-4">
              <div class="w-8 h-8 bg-green-100 rounded-lg mr-3 flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800">Berdasarkan RT</h3>
            </div>
            <div class="space-y-4">
              @foreach ($berdasarkanDusun as $rt => $jumlah)
                @php
                  $persentase = $totalPenduduk > 0 ? round(($jumlah / $totalPenduduk) * 100, 1) : 0;
                @endphp
                <div class="flex items-center justify-between">
                  <span class="text-sm text-gray-600">RT {{ $rt }}</span>
                  <div class="flex items-center">
                    <div class="w-32 bg-gray-200 rounded-full h-2 mr-2">
                      <div class="bg-green-600 h-2 rounded-full" style="width: {{ $persentase }}%"></div>
                    </div>
                    <span class="text-sm font-semibold">{{ number_format($jumlah) }} ({{ $persentase }}%)</span>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Tabel Detail -->
        <div class="grid md:grid-cols-2 gap-8">
          <!-- Berdasarkan Pendidikan -->
          <div class="bg-white rounded-xl border border-gray-300 p-6">
            <div class="flex items-center mb-4">
              <div class="w-8 h-8 bg-yellow-100 rounded-lg mr-3 flex items-center justify-center">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z">
                  </path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                  </path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                  </path>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800">Berdasarkan Pendidikan</h3>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-sm">
                <thead>
                  <tr class="border-b border-gray-300">
                    <th class="text-left py-2 font-semibold">Tingkat Pendidikan</th>
                    <th class="text-right py-2 font-semibold">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($berdasarkanPendidikan as $pendidikan => $jumlah)
                    <tr class="border-b border-gray-300">
                      <td class="py-2">{{ $pendidikan ?: 'Tidak Diketahui' }}</td>
                      <td class="text-right py-2">{{ number_format($jumlah) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <!-- Berdasarkan Pekerjaan -->
          <div class="bg-white rounded-xl border border-gray-300 p-6">
            <div class="flex items-center mb-4">
              <div class="w-8 h-8 bg-indigo-100 rounded-lg mr-3 flex items-center justify-center">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6">
                  </path>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800">Berdasarkan Pekerjaan</h3>
            </div>

            <div class="overflow-x-auto">
              <table class="w-full text-sm">
                <thead>
                  <tr class="border-b border-gray-300">
                    <th class="text-left py-2 font-semibold">Jenis Pekerjaan</th>
                    <th class="text-right py-2 font-semibold">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($berdasarkanPekerjaan as $pekerjaan => $jumlah)
                    <tr class="border-b border-gray-300">
                      <td class="py-2">{{ $pekerjaan }}</td>
                      <td class="text-right py-2">{{ number_format($jumlah) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Berdasarkan Agama dan Perkawinan -->
        <div class="grid md:grid-cols-2 gap-8 mt-8">
          <!-- Berdasarkan Agama -->
          <div class="bg-white rounded-xl border border-gray-300 p-6">
            <div class="flex items-center mb-4">
              <div class="w-8 h-8 bg-purple-100 rounded-lg mr-3 flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                  </path>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800">Berdasarkan Agama</h3>
            </div>
            <div class="space-y-3">
              @foreach ($berdasarkanAgama as $agama => $jumlah)
                @php
                  $persentase = $totalPenduduk > 0 ? round(($jumlah / $totalPenduduk) * 100, 1) : 0;
                @endphp
                <div class="flex items-center justify-between">
                  <span class="text-sm text-gray-600">{{ $agama ?: 'Tidak Diketahui' }}</span>
                  <div class="flex items-center">
                    <div class="w-32 bg-gray-200 rounded-full h-2 mr-2">
                      <div class="bg-purple-600 h-2 rounded-full" style="width: {{ $persentase }}%"></div>
                    </div>
                    <span class="text-sm font-semibold">{{ number_format($jumlah) }} ({{ $persentase }}%)</span>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <!-- Berdasarkan Perkawinan -->
          <div class="bg-white rounded-xl border border-gray-300 p-6">
            <div class="flex items-center mb-4">
              <div class="w-8 h-8 bg-pink-100 rounded-lg mr-3 flex items-center justify-center">
                <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                  </path>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800">Berdasarkan Perkawinan</h3>
            </div>
            <div class="space-y-3">
              @foreach ($berdasarkanPerkawinan as $status => $jumlah)
                @php
                  $persentase = $totalPenduduk > 0 ? round(($jumlah / $totalPenduduk) * 100, 1) : 0;
                @endphp
                <div class="flex items-center justify-between">
                  <span class="text-sm text-gray-600">{{ $status ?: 'Tidak Diketahui' }}</span>
                  <div class="flex items-center">
                    <div class="w-32 bg-gray-200 rounded-full h-2 mr-2">
                      <div class="bg-pink-600 h-2 rounded-full" style="width: {{ $persentase }}%"></div>
                    </div>
                    <span class="text-sm font-semibold">{{ number_format($jumlah) }} ({{ $persentase }}%)</span>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <!-- APBDes Section -->
      <div id="apbdes" class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Anggaran Pendapatan dan Belanja Desa (APBDes)</h2>
          <p class="text-gray-600">Informasi anggaran desa tahun 2024</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-300 p-8">
          <div class="text-center">
            <p class="text-gray-500 mb-4">Data APBDes sedang dalam proses pengumpulan</p>
            <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
              <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- Stunting Section -->
      <div id="stunting" class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Data Stunting</h2>
          <p class="text-gray-600">Informasi kasus stunting di Desa Blang Kubu</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-300 p-8">
          <div class="text-center">
            <p class="text-gray-500 mb-4">Data stunting sedang dalam proses pengumpulan</p>
            <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
              <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- Bansos Section -->
      <div id="bansos" class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Bantuan Sosial (Bansos)</h2>
          <p class="text-gray-600">Informasi penerima bantuan sosial</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-300 p-8">
          <div class="text-center">
            <p class="text-gray-500 mb-4">Data bantuan sosial sedang dalam proses pengumpulan</p>
            <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
              <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- IDM Section -->
      <div id="idm" class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Indeks Desa Membangun (IDM)</h2>
          <p class="text-gray-600">Indeks pembangunan desa berdasarkan aspek sosial, ekonomi, dan ekologi</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-300 p-8">
          <div class="text-center">
            <p class="text-gray-500 mb-4">Data IDM sedang dalam proses pengumpulan</p>
            <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
              <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                </path>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- SDGs Section -->
      <div id="sdgs" class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Sustainable Development Goals (SDGs)</h2>
          <p class="text-gray-600">Tujuan pembangunan berkelanjutan desa</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-300 p-8">
          <div class="text-center">
            <p class="text-gray-500 mb-4">Data SDGs sedang dalam proses pengumpulan</p>
            <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
              <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9m0 9c-5 0-9-4-9-9s4-9 9-9"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript for smooth scrolling -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const links = document.querySelectorAll('a[href^="#"]');

      links.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();

          const targetId = this.getAttribute('href');
          const targetSection = document.querySelector(targetId);

          if (targetSection) {
            targetSection.scrollIntoView({
              behavior: 'smooth',
              block: 'start'
            });
          }
        });
      });
    });
  </script>
@endsection
