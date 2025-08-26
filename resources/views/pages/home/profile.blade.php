@extends('layouts.app')

@section('content')
  <div class="min-h-screen pt-10">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-xl border border-blue-500">
      <div class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold text-center mb-4">Profil {{ $villageProfile->village_name ?? 'Desa Blang Kubu' }}
        </h1>
        <p class="text-xl text-center text-blue-100">{{ $villageProfile->district ?? 'Peudada' }},
          {{ $villageProfile->regency ?? 'Bireuen' }}, {{ $villageProfile->province ?? 'Aceh' }}</p>
      </div>
    </div>

    <!-- Content Sections -->
    <div class="container mx-auto px-4 py-12">
      <!-- Visi Misi Section -->
      <div class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Visi & Misi</h2>
          <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
          <!-- Visi -->
          <div class="bg-white rounded-xl p-8 border-l-4 border border-blue-600">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                  </path>
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-800">Visi</h3>
            </div>
            <p class="text-gray-600 leading-relaxed">
              "{{ $villageProfile->vision ?? 'Terwujudnya Desa Blang Kubu yang Maju, Mandiri, dan Sejahtera dengan Masyarakat yang Berakhlak Mulia, Berbudaya, dan Berwawasan Lingkungan' }}"
            </p>
          </div>

          <!-- Misi -->
          <div class="bg-white rounded-xl p-8 border-l-4 border border-green-600">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-800">Misi</h3>
            </div>
            <ul class="text-gray-600 space-y-2">
              @if ($villageProfile && $villageProfile->mission)
                @foreach (explode("\n", $villageProfile->mission) as $mission)
                  @if (trim($mission))
                    <li class="flex items-start">
                      <span class="text-green-600 mr-2">•</span>
                      {{ trim(str_replace('•', '', $mission)) }}
                    </li>
                  @endif
                @endforeach
              @else
                <li class="flex items-start">
                  <span class="text-green-600 mr-2">•</span>
                  Meningkatkan kualitas pendidikan dan kesehatan masyarakat
                </li>
                <li class="flex items-start">
                  <span class="text-green-600 mr-2">•</span>
                  Mengembangkan perekonomian desa berbasis potensi lokal
                </li>
                <li class="flex items-start">
                  <span class="text-green-600 mr-2">•</span>
                  Membangun infrastruktur desa yang berkelanjutan
                </li>
                <li class="flex items-start">
                  <span class="text-green-600 mr-2">•</span>
                  Meningkatkan pelayanan publik yang transparan dan akuntabel
                </li>
                <li class="flex items-start">
                  <span class="text-green-600 mr-2">•</span>
                  Melestarikan nilai-nilai budaya dan adat istiadat
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>

      <!-- Bagan Desa Section -->
      <div class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Struktur Organisasi Desa</h2>
          <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
        </div>

        <div class="bg-white rounded-xl border border-gray-300 p-8">
          <div class="grid md:grid-cols-3 gap-8">
            <!-- Kepala Desa -->
            <div class="text-center">
              <div class="w-24 h-24 bg-blue-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Kepala Desa</h3>
              <p class="text-gray-600">{{ $villageProfile->head_village_name ?? 'Ahmad Syafiq' }}</p>
            </div>

            <!-- Sekretaris Desa -->
            <div class="text-center">
              <div class="w-24 h-24 bg-green-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                  </path>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Sekretaris Desa</h3>
              <p class="text-gray-600">{{ $villageProfile->secretary_name ?? 'Muhammad Rizki' }}</p>
            </div>

            <!-- Kaur Keuangan -->
            <div class="text-center">
              <div class="w-24 h-24 bg-yellow-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                  </path>
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Kaur Keuangan</h3>
              <p class="text-gray-600">{{ $villageProfile->treasurer_name ?? 'Siti Aminah' }}</p>
            </div>
          </div>

          <!-- Badan Permusyawaratan Desa -->
          <div class="mt-12 pt-8 border-t border-gray-300">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-6">Badan Permusyawaratan Desa (BPD)</h3>
            <div class="grid md:grid-cols-2 gap-6">
              <div class="text-center">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Ketua BPD</h4>
                <p class="text-gray-600">{{ $villageProfile->bpd_chairman ?? 'Abdul Rahman' }}</p>
              </div>
              <div class="text-center">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Wakil Ketua BPD</h4>
                <p class="text-gray-600">{{ $villageProfile->bpd_vice_chairman ?? 'Fatimah Zahra' }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sejarah Desa Section -->
      <div class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Sejarah Desa</h2>
          <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
        </div>

        <div class="bg-white rounded-xl border border-gray-300 p-8">
          <div class="prose max-w-none">
            <p class="text-gray-600 leading-relaxed mb-6">
              {{ $villageProfile->history ?? 'Desa Blang Kubu memiliki sejarah yang panjang dan menarik. Berdasarkan cerita turun-temurun dari para tetua desa, nama "Blang Kubu" berasal dari dua kata dalam bahasa Aceh: "Blang" yang berarti sawah/ladang dan "Kubu" yang berarti benteng/pertahanan.' }}
            </p>

            <div class="grid md:grid-cols-3 gap-6 mt-8">
              <div class="text-center p-4 bg-blue-50 rounded-xl border border-blue-300">
                <div class="text-3xl font-bold text-blue-600 mb-2">1920</div>
                <p class="text-gray-700">Tahun Berdiri</p>
              </div>
              <div class="text-center p-4 bg-green-50 rounded-xl border border-green-300">
                <div class="text-3xl font-bold text-green-600 mb-2">1,250</div>
                <p class="text-gray-700">Jumlah Penduduk</p>
              </div>
              <div class="text-center p-4 bg-yellow-50 rounded-xl border border-yellow-300">
                <div class="text-3xl font-bold text-yellow-600 mb-2">15</div>
                <p class="text-gray-700">Dusun</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Peta Lokasi Section -->
      <div class="mb-16">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Peta Lokasi Desa</h2>
          <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
        </div>

        <div class="bg-white rounded-xl border border-gray-300">
          <div class="grid md:grid-cols-2">
            <!-- Peta -->
            <div class="w-full">
              <iframe
                class="w-full h-64 sm:h-80 md:h-96 lg:h-[400px] xl:h-[450px] rounded-t-xl md:rounded-l-xl md:rounded-t-none"
                src="{{ $villageProfile->google_maps_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7946.752966207239!2d96.577174!3d5.20337945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30474ff7f25f4faf%3A0x6219631d6c85562b!2sBlang%20Kubu%2C%20Kec.%20Peudada%2C%20Kabupaten%20Bireuen%2C%20Aceh!5e0!3m2!1sid!2sid!4v1756108848179!5m2!1sid!2sid' }}"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- Informasi Lokasi -->
            <div class="p-8">
              <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Geografis</h3>

              <div class="space-y-4">
                <div class="flex items-start">
                  <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-4 mt-1">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800">Luas Wilayah</h4>
                    <p class="text-gray-600 text-sm">{{ $villageProfile->area_size ?? '2.5 km²' }}</p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-4 mt-1">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                      </path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800">Batas Wilayah</h4>
                    <ul class="text-gray-600 text-sm space-y-1">
                      @if ($villageProfile && $villageProfile->boundaries)
                        @foreach (explode("\n", $villageProfile->boundaries) as $boundary)
                          @if (trim($boundary))
                            <li>{{ trim(str_replace('•', '', $boundary)) }}</li>
                          @endif
                        @endforeach
                      @else
                        <li>• Utara: Desa Seunudon</li>
                        <li>• Selatan: Desa Cot Kruet</li>
                        <li>• Barat: Desa Blang Cut</li>
                        <li>• Timur: Desa Meunasah Dayah</li>
                      @endif
                    </ul>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="w-8 h-8 bg-yellow-600 rounded-full flex items-center justify-center mr-4 mt-1">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800">Topografi</h4>
                    <p class="text-gray-600 text-sm">
                      {{ $villageProfile->topography ?? 'Dataran rendah dengan ketinggian 5-15 meter di atas permukaan laut' }}
                    </p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center mr-4 mt-1">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z">
                      </path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800">Iklim</h4>
                    <p class="text-gray-600 text-sm">
                      {{ $villageProfile->climate ?? 'Tropis basah dengan curah hujan 2000-3000 mm per tahun' }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
