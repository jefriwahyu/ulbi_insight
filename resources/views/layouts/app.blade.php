<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/logo/ui.png') }}" type="image/png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    
    <!-- External CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
    
    <!-- Custom CSS - Perbaikan Path -->
    @if(app()->environment('production'))
        <!-- Production: gunakan path yang lebih reliable -->
        <link href="{{ asset('portal-berita/src/output.css') }}" rel="stylesheet" />
        <link href="{{ asset('portal-berita/src/main.css') }}" rel="stylesheet" />
        
        <!-- Vite CSS untuk production -->
        @if(file_exists(public_path('build/manifest.json')))
            @php 
                $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
                $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
            @endphp
            @if($cssFile)
                <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
            @endif
        @else
            <!-- Fallback CSS jika manifest tidak ada -->
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @endif
    @else
        <!-- Development -->
        <link href="{{ asset('portal-berita/src/output.css') }}" rel="stylesheet" />
        <link href="{{ asset('portal-berita/src/main.css') }}" rel="stylesheet" />
        @viteReactRefresh
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    @endif
    
    @livewireStyles
</head>

<body class="font-[Poppins]">
    @yield('content')
    
    @stack('scripts')
    
    <!-- External Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    
    <!-- Custom Scripts -->
    <script src="{{ asset('src/js/two-lines-text.js') }}"></script>
    <script src="{{ asset('portal-berita/src/js/carousel.js') }}"></script>
    
    <!-- Vite JS untuk production -->
    @if(app()->environment('production'))
        @if(file_exists(public_path('build/manifest.json')))
            @php 
                $jsFile = $manifest['resources/js/app.js']['file'] ?? null;
            @endphp
            @if($jsFile)
                <script src="{{ asset('build/' . $jsFile) }}" defer></script>
            @endif
        @else
            <script src="{{ asset('js/app.js') }}" defer></script>
        @endif
    @endif
    
    @livewireScripts
</body>
</html>