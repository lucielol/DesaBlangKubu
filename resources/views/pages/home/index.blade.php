@extends('layouts.app')

@php
	$sotks = collect([
	    (object) [
	        'name' => 'Johan Ibrahim',
	        'position' => 'Kepala Desa',
	        'photo' => 'https://penguinui.s3.amazonaws.com/component-assets/card-img-1.webp',
	    ],
	    (object) [
	        'name' => 'Anisa Rahma',
	        'position' => 'Sekretaris',
	        'photo' => 'https://penguinui.s3.amazonaws.com/component-assets/card-img-1.webp',
	    ],
	    (object) [
	        'name' => 'Ahmad Rasyid',
	        'position' => 'Bendahara',
	        'photo' => 'https://penguinui.s3.amazonaws.com/component-assets/card-img-1.webp',
	    ],
	    (object) [
	        'name' => 'Siti Nurjanah',
	        'position' => 'Kasi Pelayanan',
	        'photo' => 'https://penguinui.s3.amazonaws.com/component-assets/card-img-1.webp',
	    ],
	]);

	$residents = collect([
	    (object) ['label' => 'Penduduk', 'value' => 1147],
	    (object) ['label' => 'Laki-Laki', 'value' => 605],
	    (object) ['label' => 'Kepala Keluarga', 'value' => 303],
	    (object) ['label' => 'Perempuan', 'value' => 542],
	    (object) ['label' => 'Penduduk Sementara', 'value' => 73],
	    (object) ['label' => 'Mutasi Penduduk', 'value' => 37],
	]);
@endphp

@section('carousel')
	<x-carousel :slides="[
	    [
	        'imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
	        'imgAlt' => 'Slide 1',
	    ],
	    [
	        'imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
	        'imgAlt' => 'Slide 2',
	    ],
	    [
	        'imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
	        'imgAlt' => 'Slide 3',
	    ],
	]" />
@endsection

@section('content')
	@include('pages.home.components.introduce')
	@include('pages.home.components.second')
	@include('pages.home.components.third')
	<x-sotk :items="$sotks" />
	<x-population-card :items="$residents" />
	<x-news :items="$news" />
@endsection
