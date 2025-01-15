
@extends('layouts.app')

	@section('title', $category->name)

	@section('content')
		@include('partials.navbar')
		<section id="Category-result" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
			<h1 class="text-4xl leading-[45px] font-bold text-center">
				Explore Our <br/>
				{{$category->name}} News
			</h1>
			<div id="search-cards" class="grid grid-cols-3 gap-[30px]">
				@foreach ($postsByCategory as $post)
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
				{{ $postsByCategory->withQueryString()->links() }}
			</div>
		</section>

		<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px] pb-[70px]">
			<div class="flex flex-col gap-3 shrink-0 w-fit">
				<a href="#">
					<div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
						<img src="{{ asset('portal-berita/src/assets/images/iklans/bannerWide1.png') }}" class="object-cover w-full h-full" alt="ads" />
					</div>
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]">
					<img src="{{ asset('portal-berita/src/assets/images/icons/message-question.svg') }}" alt="icon" /></a>
				</p>
			</div>
		</section>
	@endsection