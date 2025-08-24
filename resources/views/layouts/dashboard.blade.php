<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>{{ env('APP_NAME') }} - @yield('title')</title>

		<!-- Styles / Scripts -->
		@vite(['resources/css/app.css', 'resources/js/app.js'])
		<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
	</head>

	<body>
		<x-toast />
		<div class="flex min-h-screen">
			<!-- Sidebar -->
			@include('components.sidebar')

			<!-- Main Content -->
			<div class="w-full flex-1 md:ml-64">
				<header class="sticky top-0 z-10 mb-3 border-b border-gray-200 bg-white/70 px-4 py-4 backdrop-blur-lg sm:px-6">
					<div class="flex items-center justify-between gap-2 pl-8 sm:items-center md:pl-0">
						<h1 class="truncate text-2xl font-bold">@yield('title')</h1>
						<a href="#profile"
							class="mt-2 max-w-32 truncate rounded-full bg-gray-200 px-4 py-1.5 text-center text-sm font-semibold text-gray-600 hover:bg-gray-300 sm:mt-0"
							title="{{ Auth::user()->name }}">
							{{ Auth::user()->name }}
						</a>
					</div>
				</header>

				<main class="mx-auto w-full max-w-7xl px-4 pb-6 sm:px-6">
					@yield('content')
				</main>
			</div>
		</div>

		@yield('scripts')
		<script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
	</body>

</html>
