@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
	<div class="grid grid-cols-1 gap-6 md:grid-cols-3">
		<!-- Card 1 -->
		<div class="flex items-center justify-between rounded-xl border border-blue-200 bg-blue-100 p-4">
			<div>
				<h2 class="text-xl font-semibold text-blue-700">Penduduk</h2>
				<p class="text-3xl font-bold text-blue-700">{{ $totalResidents }}</p>
			</div>
			<h1 class="text-3xl font-bold text-blue-700">
				<i class="fa-solid fa-users"></i>
			</h1>
		</div>

		<!-- Card 2 -->
		<div class="flex items-center justify-between rounded-xl border border-green-200 bg-green-100 p-4">
			<div>
				<h2 class="text-lg font-semibold text-green-700">Laporan keluhan</h2>
				<p class="text-3xl font-bold text-green-700">{{ $totalComplains }}</p>
			</div>
			<h1 class="text-3xl font-bold text-green-700">
				<i class="fa-solid fa-address-book"></i>
			</h1>
		</div>

		<!-- Card 3 -->
		<div class="flex items-center justify-between rounded-xl border border-yellow-200 bg-yellow-100 p-4">
			<div>
				<h2 class="text-xl font-semibold text-yellow-600">Pengaduan</h2>
				<p class="text-3xl font-bold text-yellow-600">78</p>
			</div>
			<h1 class="text-3xl font-bold text-yellow-600">
				<i class="fa-solid fa-comments"></i>
			</h1>
		</div>
	</div>
@endsection
