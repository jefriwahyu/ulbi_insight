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
		@vite('resources/css/app.css')
	</head>

	<body class="font-[Poppins] pb-[72px]">
		@yield('content')
		<script src="{{ asset('src/js/two-lines-text.js') }}"></script>
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
		<script src="{{ asset('portal-berita/src/js/carousel.js') }}"></script>
	</body>
</html>