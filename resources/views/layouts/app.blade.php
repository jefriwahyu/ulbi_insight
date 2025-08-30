<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>@yield('title')</title>
		<link href="{{ asset('portal-berita/src/output.css')}}" rel="stylesheet" />
		<link href="{{ asset('portal-berita/src/main.css')}}" rel="stylesheet" />
		<link rel="icon" href="{{ asset('storage/logo/ui.png') }}" type="image/png">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"rel="stylesheet" />
		<!-- CSS -->
		<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
		
		{{-- Vite Fallback --}}
		@if (app()->environment('production'))
			{{-- Cek apakah manifest.json ada --}}
			@if (file_exists(public_path('build/manifest.json')))
				@vite('resources/css/app.css')
			@else
				{{-- Fallback: skip vite jika manifest tidak ada --}}
				<link rel="stylesheet" href="{{ asset('css/app.css') }}">
			@endif
		@else
			{{-- Development mode --}}
			@vite('resources/css/app.css')
		@endif
		
		@livewireStyles
	</head>

	<body class="font-[Poppins]">
		@yield('content')
		@stack('scripts')
		<script src="{{ asset('src/js/two-lines-text.js') }}"></script>
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
		<script src="{{ asset('portal-berita/src/js/carousel.js') }}"></script>
		@livewireScripts
	</body>
	{{-- <footer>
		@yield('footer')
	</footer> --}}
</html>