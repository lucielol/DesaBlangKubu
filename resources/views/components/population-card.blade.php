@props(['items'])

<div class="flex flex-col items-center justify-between gap-8 px-2 sm:px-4 md:flex-row md:px-0">
	<div class="mb-8 w-full md:mb-0 md:w-1/2">
		<h1 class="text-3xl font-bold uppercase text-red-600 sm:text-4xl md:text-5xl">Penduduk</h1>
		<span class="text-base text-gray-600 sm:text-lg md:text-xl">
			Sistem digital yang berfungsi mempermudah pengelolaan data dan informasi terkait dengan kependudukan dan
			pendayagunaannya untuk pelayanan publik yang efektif dan efisien
		</span>
	</div>

	<div class="w-full md:w-1/2">
		<div class="grid grid-cols-2 gap-3 sm:gap-4">
			@foreach ($items as $resident)
				<div class="flex items-center justify-between overflow-hidden rounded-lg border border-gray-200">
					<div class="flex items-center justify-center bg-gradient-to-r from-red-600 to-pink-400 px-4 py-3 sm:px-6 sm:py-4">
						<span class="text-2xl font-bold text-white sm:text-3xl">{{ number_format($resident->value, 0, ',', '.') }}</span>
					</div>
					<div class="flex items-center justify-start bg-white px-4 py-3 sm:px-6 sm:py-4">
						<span class="text-base font-semibold text-gray-800 sm:text-lg">{{ $resident->label }}</span>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
