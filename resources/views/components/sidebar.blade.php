@php
	$submenuActive = request()->routeIs('news.*') || request()->routeIs('complaint.*');
	$suratSubmenuActive = request()->routeIs('letter.birth*') || request()->routeIs('letter.death*');
@endphp

<div x-data="{ open: false, activeSubmenu: '{{ $submenuActive ? 'desa' : ($suratSubmenuActive ? 'surat' : '') }}' }" class="fixed top-1 z-50 md:z-auto">
	<!-- Toggle Button (Mobile Only) -->
	<div class="mt-1 p-4 md:hidden">
		<button @click="open = !open" class="text-gray-800 hover:cursor-pointer focus:outline-none">
			<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
				<path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
			</svg>
		</button>
	</div>

	<!-- Sidebar -->
	<div :class="{ 'translate-x-0': open, '-translate-x-full': !open }"
		class="fixed left-0 top-0 z-50 h-full w-64 transform border-r border-gray-200 bg-white transition-transform duration-300 ease-in-out md:fixed md:translate-x-0">
		<!-- Tombol Close (Mobile Only) -->
		<button @click="open = false"
			class="absolute right-3 top-3 z-50 flex h-9 w-9 items-center justify-center rounded-full bg-gray-100 text-gray-700 hover:bg-gray-200 focus:outline-none md:hidden"
			x-show="open" x-transition.opacity>
			<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
			</svg>
		</button>
		<div class="flex h-full flex-col justify-between">

			<!-- Logo & Navigasi -->
			<div>
				<h1 class="p-5 text-2xl font-bold">Logo</h1>
				<div class="mx-1.5 space-y-1 font-medium">
					<a href="{{ route('dashboard') }}"
						class="{{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700' }} group flex items-center rounded-lg px-4 py-2 hover:bg-gray-100">
						<div
							class="{{ request()->routeIs('dashboard') ? 'bg-blue-300 border-blue-400/40' : 'bg-gray-300' }} me-2 rounded-lg border border-gray-400/40 px-1.5 py-1 group-hover:border-blue-400/40 group-hover:bg-blue-200">
							<i class="fa-solid fa-gauge h-5 w-5"></i>
						</div>
						Dashboard
					</a>

					<a href="{{ route('resident.index') }}"
						class="{{ request()->routeIs('resident*') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700' }} group flex items-center rounded-lg px-4 py-2 hover:bg-gray-100">
						<div
							class="{{ request()->routeIs('resident*') ? 'bg-blue-300 border-blue-400/40' : 'bg-gray-300' }} me-2 rounded-lg border border-gray-400/40 px-1.5 py-1 group-hover:border-blue-400/40 group-hover:bg-blue-200">
							<i class="fa-solid fa-users h-5 w-5"></i>
						</div>
						Penduduk
					</a>

					<a href="{{ route('letter.index') }}"
						class="{{ request()->routeIs('letter*') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700' }} group flex items-center rounded-lg px-4 py-2 hover:bg-gray-100">
						<div
							class="{{ request()->routeIs('letter*') ? 'bg-blue-300 border-blue-400/40' : 'bg-gray-300' }} me-2 rounded-lg border border-gray-400/40 px-1.5 py-1 group-hover:border-blue-400/40 group-hover:bg-blue-200">
							<i class="fa-solid fa-file h-5 w-5"></i>
						</div>
						Daftar Surat
					</a>

					<!-- Submenu Informasi Desa -->
					<div class="font-medium">
						<button @click="activeSubmenu === 'desa' ? activeSubmenu = '' : activeSubmenu = 'desa'"
							:class="{ 'bg-blue-100 text-blue-700': activeSubmenu === 'desa', 'hover:bg-gray-100 text-gray-700': activeSubmenu !== 'desa' }"
							class="group flex w-full items-center rounded-lg px-4 py-2 transition hover:cursor-pointer focus:outline-none">
							<div
								:class="{ 'bg-blue-300 border-blue-400/40': activeSubmenu === 'desa', 'bg-gray-300 border-gray-400/40 group-hover:bg-blue-200 group-hover:border-blue-400/40': activeSubmenu !== 'desa' }"
								class="me-2 rounded-lg border px-1.5 py-1 transition">
								<i class="fa-solid fa-bars-progress h-5 w-5"></i>
							</div>
							<span class="flex-1 text-left">Informasi Desa</span>
							<svg class="h-4 w-4 transform transition-transform duration-200"
								:class="{ 'rotate-90': activeSubmenu === 'desa' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
							</svg>
						</button>
						<div x-show="activeSubmenu === 'desa'" x-collapse
							class="my-1 ml-4 space-y-1 rounded-lg border border-gray-200 bg-gray-200/50 px-2 py-2">
							<a href="{{ route('news.list') }}"
								class="{{ request()->routeIs('news.*') ? 'bg-blue-200 text-blue-700 font-semibold' : 'text-gray-700' }} block rounded px-2 py-1 text-sm transition hover:bg-gray-200">
								<i class="fa-solid fa-newspaper me-2"></i> Berita
							</a>
							<a href="{{ route('complaint.index') }}"
								class="{{ request()->routeIs('complaint.*') ? 'bg-blue-200 text-blue-700 font-semibold' : 'text-gray-700' }} block rounded px-2 py-1 text-sm transition hover:bg-gray-200">
								<i class="fa-solid fa-address-book me-2"></i> Pengaduan Masyarakat
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Logout -->
			<div class="mx-1.5 mb-4">
				<a href="{{ route('logout') }}"
					class="group flex items-center rounded-lg px-4 py-2 font-medium text-red-600 hover:bg-red-100">
					<div class="me-2 rounded-lg border border-red-300 bg-red-200 px-1.5 py-1 group-hover:bg-red-300">
						<i class="fa-solid fa-arrow-right-from-bracket h-5 w-5"></i>
					</div>
					Logout
				</a>
			</div>
		</div>
	</div>

	<!-- Overlay (Mobile Only) -->
	<div x-show="open" @click="open = false" class="fixed inset-0 z-40 bg-black/30 bg-opacity-20 md:hidden"
		x-transition.opacity></div>
</div>
