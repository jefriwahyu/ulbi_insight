@extends('layouts.app')

	@section('title', $author->name . ' News')

	@section('content')

	@include('partials.navbar')
	<section id="author" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
		<div id="title" class="flex items-center gap-[30px]">
			<h1 class="text-4xl leading-[45px] font-bold">Author News</h1>
			<h1 class="text-4xl leading-[45px] font-bold">/</h1>
			<div class="flex gap-3 items-center">
				<div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
					<img src="{{ asset('storage/' . $author->photo) }}" alt="profile photo" />
				</div>
				<div class="flex flex-col">
					<p class="text-lg leading-[27px] font-semibold">{{ $author->name }}</p>
					<p class="rounded-full p-[2px_8px] font-bold text-xs leading-[18px] w-fit
					@if ($author->posts->count() > 0)
						bg-gray-100 text-gray-600
					@elseif ($author->posts->count() > 300)
						bg-blue-100 text-blue-600  
					@elseif ($author->posts->count() > 1000)
						bg-[#FFECE1] text-[#FF6B18]
					@endif">
					@if ($author->posts->count() > 0)
						Beginner
					@elseif ($author->posts->count() > 300)
						Intermediate
					@elseif ($author->posts->count() > 1000)
						Advanced
					@endif
				</p>
				</div>
			</div>
		</div>
		<div id="content-cards" class="grid grid-cols-3 gap-[30px]">
			@foreach ($postsByAuthor as $post)
			<a href="{{ url('/post/' . $post->slug) }}" class="card">
				<div
					class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
					<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
						<div
							class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
							<p class="text-xs leading-[18px] font-bold">{{ strtoupper($post->category->name) }}</p>
						</div>
						<img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
							class="w-full h-full object-cover" />
					</div>
					<div class="flex flex-col gap-[6px]">
						<h3 class="text-lg leading-[27px] font-bold line-clamp-2">{{ $post->title }}</h3>
						<p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $post->created_at->format('d M, Y') }}</p>
					</div>
				</div>
			</a>
			@endforeach
		</div>
		<div class="w-full flex justify-center mt-8">
			{{ $postsByAuthor->withQueryString()->links() }}
        </div>
	</section>
	<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px] pb-[70px]">
		<div class="flex flex-col gap-3 shrink-0 w-fit">
			<a href="#">
				<div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
					<img src="{{ asset('portal-berita/src/assets/images/iklans/bannerWide.png') }}" class="object-cover w-full h-full" alt="ads" />
				</div>
			</a>
			<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
				Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
						src="{{ asset('portal-berita/src/assets/images/icons/message-question.svg') }}" alt="icon" /></a>
			</p>
		</div>
	</section>
@endsection