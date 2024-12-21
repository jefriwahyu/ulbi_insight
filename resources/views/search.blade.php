<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('portal-berita/src/output.css') }}" rel="stylesheet" />
    <link href="{{ asset('portal-berita/src/main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
</head>
<body class="font-[Poppins]">
    @include('partials.navbar')
    <section id="heading" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
        <h1 class="text-4xl leading-[45px] font-bold text-center">
            Explore Hot Trending <br />
            Good News Today
        </h1>
    </section>
    <section id="search-result" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[70px] mb-[100px]">
        <h2 class="text-[26px] leading-[39px] font-bold">Search Result: <span>{{ $query }}</span></h2>
		@if($searchNews->isEmpty())
			<div class="">
				<h2 class="text-center font-bold">Maaf, berita yang kamu cari tidak ada, coba cari berita yang lain ya..</h2>
			</div>
		@else
			<div id="search-cards" class="grid grid-cols-3 gap-[30px]">
				@foreach($searchNews as $post)
				<a href="" class="card">
					<div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
						<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
							<div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
								<p class="text-xs leading-[18px] font-bold">{{ strtoupper($post->category->name) }}</p> <!-- Ganti dengan kategori yang sesuai -->
							</div>
							<img src="{{ asset('storage/' . $post->thumbnail) }}" alt="thumbnail photo" class="w-full h-full object-cover" />
						</div>
						<div class="flex flex-col gap-[6px]">
							<h3 class="text-lg leading-[27px] font-bold">{{ \Illuminate\Support\Str::words($post->title, 6, '...') }}</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $post->created_at->format('d M, Y') }}</p> <!-- Ganti dengan format tanggal yang sesuai -->
						</div>
					</div>
				</a>
				@endforeach
			</div>
		@endif
    </section>
</body>
</html>
