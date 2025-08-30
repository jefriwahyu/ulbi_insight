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
		
		{{-- Vite Configuration for Different Environments --}}
		@php 
			$isProduction = app()->environment('production');
			$isVercel = isset($_ENV['VERCEL']) || str_contains(base_path(), '/var/task');
			
			if ($isProduction && $isVercel) {
				// Vercel path
				$manifestPath = '/var/task/user/public/build/manifest.json';
			} elseif ($isProduction) {
				// cPanel or other hosting
				$manifestPath = '../public_html/build/manifest.json';
			} else {
				// Local development
				$manifestPath = public_path('build/manifest.json');
			}
		@endphp

		@if ($isProduction && file_exists($manifestPath))
			{{-- Production dengan manifest tersedia --}}
			@php 
				$manifest = json_decode(file_get_contents($manifestPath), true);
				$cssFile = $manifest['resources/css/app.css']['file'] ?? null;
			@endphp
			@if ($cssFile)
				<link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
			@endif
		@elseif (!$isProduction)
			{{-- Development mode --}}
			@viteReactRefresh
			@vite(['resources/js/app.js', 'resources/css/app.css'])
		@else
			{{-- Production fallback jika manifest tidak ada --}}
			<link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
		
		{{-- Vite JS Configuration --}}
		@if ($isProduction && file_exists($manifestPath))
			{{-- Production dengan manifest tersedia --}}
			@php 
				$jsFile = $manifest['resources/js/app.js']['file'] ?? null;
			@endphp
			@if ($jsFile)
				<script src="{{ asset('build/' . $jsFile) }}" defer></script>
			@endif
		@elseif (!$isProduction)
			{{-- JS sudah di-load oleh @vite di atas --}}
		@else
			{{-- Production fallback jika manifest tidak ada --}}
			<script src="{{ asset('js/app.js') }}" defer></script>
		@endif
		
		@livewireScripts
	</body>
</html>