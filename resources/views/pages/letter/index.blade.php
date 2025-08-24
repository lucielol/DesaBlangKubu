@extends('layouts.dashboard')
@section('title', 'Daftar Surat')

@section('content')
	<div x-data="{ activeTab: 'birth' }" class="space-y-4">
		<div class="flex flex-col space-y-4">
			<div class="flex">
				<div class="flex rounded-lg bg-gray-100 p-1 transition hover:bg-gray-200">
					<nav class="group flex gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
						<button @click="activeTab = 'birth'" type="button"
							:class="{
							    'bg-white text-gray-700': activeTab === 'birth',
							    'bg-transparent text-gray-500 hover:text-gray-700': activeTab !== 'birth'
							}"
							class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg px-4 py-3 text-sm font-medium hover:text-blue-600 disabled:pointer-events-none disabled:opacity-50 group-hover:cursor-pointer">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd"
									d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
									clip-rule="evenodd" />
							</svg>
							<span>Surat Kelahiran</span>
						</button>
						<button @click="activeTab = 'death'" type="button"
							:class="{
							    'bg-white text-gray-700': activeTab === 'death',
							    'bg-transparent text-gray-500 hover:text-gray-700': activeTab !== 'death'
							}"
							class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg px-4 py-3 text-sm font-medium hover:text-blue-600 disabled:pointer-events-none disabled:opacity-50 group-hover:cursor-pointer">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd"
									d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
									clip-rule="evenodd" />
							</svg>
							<span>Surat Kematian</span>
						</button>
					</nav>
				</div>
			</div>
		</div>

		<!-- Notifikasi -->
		@if (session('success'))
			<div class="rounded-md bg-green-50 p-4">
				<div class="flex">
					<div class="flex-shrink-0">
						<svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd"
								d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
								clip-rule="evenodd" />
						</svg>
					</div>
					<div class="ml-3">
						<p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
					</div>
				</div>
			</div>
		@endif

		<!-- Konten Tab Kelahiran -->
		<div x-show="activeTab === 'birth'" x-transition>
			<div class="mb-6 flex items-center justify-between">
				<h2 class="text-lg font-medium text-gray-900">Daftar Surat Kelahiran</h2>
				<a href="{{ route('letter.birth.create') }}"
					class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
					<i class="fa-solid fa-plus me-2"></i>
					Tambah Surat
				</a>
			</div>

			@if ($birthLetters->count() > 0)
				<div class="overflow-x-auto rounded-lg border border-gray-200">
					<table class="min-w-full divide-y divide-gray-200">
						<thead class="bg-gray-50">
							<tr>
								<th scope="col" class="px-4 py-3 text-center text-xs font-medium uppercase tracking-wider text-gray-500">No
								</th>
								<th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Nama
									Anak</th>
								<th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Orang
									Tua</th>
								<th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
									Tanggal Lahir</th>
								<th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Aksi
								</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-gray-200 bg-white text-sm">
							@foreach ($birthLetters as $letter)
								<tr>
									<td class="w-0 whitespace-nowrap px-4 py-2 text-center text-gray-500">{{ $loop->iteration }}</td>
									<td class="whitespace-nowrap px-4 py-2">
										<div class="flex items-center">
											<h1 class="me-3 text-3xl"><i class="fa-solid fa-baby"></i></h1>
											<div>
												<div class="font-medium text-gray-900">{{ $letter->nama }}</div>
												<div class="flex items-center text-xs text-gray-500">
													@if ($letter->jenis_kelamin === 'L')
														<i class="fa-solid fa-mars me-1"></i> Laki-laki
													@else
														<i class="fa-solid fa-venus me-1"></i> Perempuan
													@endif
												</div>
											</div>
										</div>
									</td>
									<td class="whitespace-nowrap px-4 py-2">
										<div class="text-gray-900">Ayah: {{ $letter->nama_ayah }}</div>
										<div class="text-xs text-gray-500">Ibu: {{ $letter->nama_ibu }}</div>
									</td>
									<td class="whitespace-nowrap px-4 py-2">
										<div class=text-gray-900">{{ $letter->tempat_lahir }}</div>
										<div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($letter->tanggal_lahir)->isoFormat('D MMMM Y') }}
										</div>
									</td>
									<td class="whitespace-nowrap px-4 py-2 font-medium">
										<div class="flex space-x-2">
											<a href="{{ route('letter.download', ['type' => 'birth', 'id' => $letter->id]) }}"
												class="item-center flex rounded bg-green-500 px-2 py-1 text-xs text-white">
												<i class="fa-solid fa-download me-2"></i> Unduh
											</a>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<div class="border-t border-gray-200 bg-gray-50 px-6 py-3">
						{{ $birthLetters->links() }}
					</div>
				</div>
			@else
				<div class="py-12 text-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
						stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
					</svg>
					<h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data surat kelahiran</h3>
					<p class="mt-1 text-sm text-gray-500">Mulai dengan membuat surat kelahiran baru.</p>
					<div class="mt-6">
						<a href="{{ route('letter.birth.create') }}"
							class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
							<svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd"
									d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
									clip-rule="evenodd" />
							</svg>
							Tambah Surat
						</a>
					</div>
				</div>
			@endif
		</div>

		<div x-show="activeTab === 'death'" x-transition>
			<div class="mb-6 flex items-center justify-between">
				<h2 class="text-lg font-medium text-gray-900">Daftar Surat Kematian</h2>
				<a href="{{ route('letter.death.create') }}"
					class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
					<i class="fa-solid fa-plus me-2"></i>
					Tambah Surat
				</a>
			</div>

			{{-- @if ($deathLetters->count() > 0)
				<div class="overflow-x-auto">
					<table class="min-w-full divide-y divide-gray-200">
						<thead class="bg-gray-50">
							<tr>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">No
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
									Nama Almarhum</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
									Tanggal Meninggal</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
									Pelapor</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
									Aksi</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-gray-200 bg-white">
							@foreach ($deathLetters as $letter)
								<tr>
									<td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $loop->iteration }}</td>
									<td class="whitespace-nowrap px-6 py-4">
										<div class="text-sm font-medium text-gray-900">{{ $letter->nama }}</div>
									</td>
									<td class="whitespace-nowrap px-6 py-4">
										<div class="text-sm text-gray-900">
											{{ \Carbon\Carbon::parse($letter->tanggal_meninggal)->isoFormat('D MMMM Y') }}</div>
										<div class="text-sm text-gray-500">{{ $letter->tempat_meninggal }}</div>
									</td>
									<td class="whitespace-nowrap px-6 py-4">
										<div class="text-sm text-gray-900">{{ $letter->nama_pelapor }}</div>
										<div class="text-sm text-gray-500">{{ $letter->hubungan }}</div>
									</td>
									<td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
										<div class="flex space-x-2">
											<a href="{{ route('letter.death.download', $letter->id) }}" class="text-blue-600 hover:text-blue-900">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd"
														d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
														clip-rule="evenodd" />
												</svg>
											</a>
											<a href="{{ route('letter.death.show', $letter->id) }}" class="text-gray-600 hover:text-gray-900">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
													<path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
													<path fill-rule="evenodd"
														d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
														clip-rule="evenodd" />
												</svg>
											</a>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="border-t border-gray-200 bg-gray-50 px-6 py-3">
					{{ $deathLetters->links() }}
				</div>
			@else
				<div class="py-12 text-center">
					<svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none"
						viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
					</svg>
					<h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data surat kematian</h3>
					<p class="mt-1 text-sm text-gray-500">Mulai dengan membuat surat kematian baru.</p>
					<div class="mt-6">
						<a href="{{ route('letter.death.create') }}"
							class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
							<svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd"
									d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
									clip-rule="evenodd" />
							</svg>
							Tambah Surat
						</a>
					</div>
				</div>
			@endif --}}
		</div>
	</div>
@endsection

@push('scripts')
	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.data('tabState', () => ({
				activeTab: 'birth',

				init() {
					// Check URL hash for active tab
					if (window.location.hash) {
						const hash = window.location.hash.substring(1);
						if (['birth', 'death'].includes(hash)) {
							this.activeTab = hash;
						}
					}

					// Update URL hash when tab changes
					this.$watch('activeTab', (value) => {
						window.location.hash = value;
					});
				}
			}));
		});
	</script>
@endpush
