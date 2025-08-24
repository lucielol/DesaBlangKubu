@extends('layouts.dashboard')
@section('title', 'Data Penduduk')

@section('content')
	<div class="mb-3 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
		<a href="{{ route('resident.create') }}"
			class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
			<i class="fa-solid fa-plus me-2"></i>
			Tambah Penduduk
		</a>

		<div class="relative w-full sm:w-64">
			<input type="text" name="search" id="search"
				class="focus:ring-3 w-full rounded-lg border border-gray-200 bg-gray-100 px-3 py-1.5 pr-10 text-sm outline-0 focus:border-blue-400 focus:ring-blue-400/50"
				placeholder="Cari NIK / Nama...">

			<!-- Icon loading -->
			<div id="loading-spinner" class="absolute right-3 top-1/2 hidden -translate-y-1/2">
				<svg class="h-5 w-5 animate-spin text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
					viewBox="0 0 24 24">
					<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
					<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
				</svg>
			</div>
		</div>
	</div>

	<div class="overflow-x-auto rounded-lg border border-gray-300">
		<table class="min-w-full divide-y divide-gray-200 text-xs sm:text-sm md:table">
			<thead class="bg-gray-100">
				<tr>
					<th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">NO</th>
					<th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">NIK</th>
					<th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">Nama</th>
					<th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">JK</th>
					<th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">Tempat
						Tanggal Lahir</th>
					<th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">Alamat</th>
					<th class="px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">Aksi</th>
				</tr>
			</thead>
			<tbody id="resident-body" class="divide-y divide-gray-200 bg-white text-sm">
				@forelse($residents as $resident)
					<tr class="hover:bg-gray-50">
						<td class="border-r border-gray-200 px-4 py-2 text-center">{{ $residents->firstItem() + $loop->index }}</td>
						<td class="whitespace-nowrap border-r border-gray-200 px-4 py-2">{{ $resident->nik }}</td>
						<td class="whitespace-nowrap border-r border-gray-200 px-4 py-2">{{ $resident->nama }}</td>
						<td class="border-r border-gray-200 px-4 py-2">{{ $resident->jenis_kelamin }}</td>
						<td class="whitespace-nowrap border-r border-gray-200 px-4 py-2">
							{{ $resident->tempat_lahir }},
							{{ \Carbon\Carbon::parse($resident->tanggal_lahir)->translatedFormat('d M Y') }}
						</td>
						<td class="border-r border-gray-200 px-4 py-2">
							{{ $resident->desa ?? '-' }},
							{{ $resident->kecamatan ?? '-' }},
							{{ $resident->kabupaten ?? '-' }}
						</td>
						<td class="flex items-center justify-center px-4 py-2 text-center align-middle text-xs">
							<a href="{{ route('resident.edit', $resident->id) }}"
								class="rounded-l bg-blue-600 px-1 py-0.5 font-semibold uppercase text-white">Edit</a>
							<form action="{{ route('resident.destroy', $resident->id) }}" method="POST" class="inline">
								@csrf
								@method('DELETE')
								<button type="submit" class="rounded-r bg-red-600 px-1 py-0.5 font-semibold uppercase text-white"
									onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="7" class="py-4 text-center text-gray-500">Data penduduk belum tersedia.</td>
					</tr>
				@endforelse
			</tbody>
		</table>

		<div class="border-t border-gray-300 p-3" id="pagination-wrapper">
			{{ $residents->links() }}
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		const searchInput = document.getElementById('search');
		const residentBody = document.getElementById('resident-body');
		const spinner = document.getElementById('loading-spinner');
		const paginationWrapper = document.getElementById('pagination-wrapper');
		let debounceTimeout = null;

		searchInput.addEventListener('input', function() {
			clearTimeout(debounceTimeout);
			debounceTimeout = setTimeout(() => {
				const keyword = this.value.trim();

				if (keyword === "") {
					window.location.href = window.location.href;
					return;
				}

				spinner.classList.remove('hidden');

				axios.post("{{ route('resident.search') }}", {
						search: keyword
					})
					.then(response => {
						const residents = response.data.residents;
						residentBody.innerHTML = '';

						// Hide pagination if not present in response
						if (!response.data.pagination) {
							paginationWrapper.classList.add('hidden');
						} else {
							paginationWrapper.classList.remove('hidden');
							paginationWrapper.innerHTML = response.data.pagination;
						}

						if (residents.length > 0) {
							residents.forEach((res, index) => {
								residentBody.innerHTML += `
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border-r border-gray-200 text-center">${index + 1}</td>
                                    <td class="px-4 py-2 border-r border-gray-200">${res.nik}</td>
                                    <td class="px-4 py-2 border-r border-gray-200">${res.nama}</td>
                                    <td class="px-4 py-2 border-r border-gray-200">${res.jenis_kelamin}</td>
                                    <td class="px-4 py-2 border-r border-gray-200">${res.tempat_lahir}, ${res.tanggal_lahir}</td>
                                    <td class="px-4 py-2 border-r border-gray-200">${res.desa ?? '-'}, ${res.kecamatan ?? '-'}, ${res.kabupaten ?? '-'}</td>
                                    <td class="flex items-center align-middle justify-center px-4 py-2 text-xs text-center">
                                        <a href="/resident/${res.id}/edit"
                                            class="bg-blue-600 text-white px-1 py-0.5 rounded-l font-semibold uppercase">Edit</a>
                                        <form action="/resident/${res.id}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white px-1 py-0.5 rounded-r font-semibold uppercase">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            `;
							});
						} else {
							residentBody.innerHTML = `
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">Data penduduk tidak ditemukan.</td>
                            </tr>
                        `;
						}
					})
					.catch(error => {
						console.error(error);
					})
					.finally(() => {
						spinner.classList.add('hidden');
					});
			}, 400);
		});
	</script>
@endsection
