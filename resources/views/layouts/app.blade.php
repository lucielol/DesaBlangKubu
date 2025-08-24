<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>{{ env('APP_NAME', 'Laravel') }}</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

		<!-- Styles / Scripts -->
		@vite(['resources/css/app.css', 'resources/js/app.js'])
		<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
	</head>

	<body class="bg-[#FDFDFC]">
		<header>
			@include('components.navbar')
		</header>

		<x-toast />

		@yield('carousel')

		<main class="mx-auto my-24 w-full max-w-7xl space-y-36 px-4 sm:px-8 md:px-12 lg:px-14">
			@yield('content')
		</main>

		<x-complaint />
		<x-footer />
	</body>

</html>
