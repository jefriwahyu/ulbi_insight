@extends('layouts.app')

	@section('title', 'Ulbi Insight')

	@section('content')

		@include('partials.navbar')
		<section id="Featured" class="mt-[30px]">
			<div class="main-carousel w-full">
				@foreach ($featuredPosts as $post)
					<div class="featured-news-card relative w-full h-[550px] flex shrink-0 overflow-hidden">
						<img src="{{ asset('storage/' . $post->thumbnail) }}" class="thumbnail absolute w-full h-full object-cover" alt="{{ $post->title }}" />
						<div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
						<div class="card-detail max-w-[1130px] w-full mx-auto flex items-end justify-between pb-10 relative z-20">
							<div class="flex flex-col gap-[10px]">
								<p class="inline-block rounded-full px-2 py-1 bg-[#FF6B18] text-white w-20 font-bold text-[13px] leading-tight">Featured</p>
								<a href="{{ url('/post/' . $post->slug) }}" style="text-decoration: none;" class="line-clamp-2 font-bold text-4xl leading-[45px] text-white two-lines hover:underline transition-all duration-300">
									{{ $post->title }}
								</a>
								<p class="text-white">{{ $post->created_at->diffForHumans() }} • {{ $post->category->name }}</p>
							</div>
							<div class="prevNextButtons flex items-center gap-4 mb-[60px]">
								<button class="button--previous appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:bg-[#FF6B18] hover:ring-[#FF6B18] transition-all duration-300">
									<img src="{{ asset('portal-berita/src/assets/images/icons/arrow.svg') }}" alt="arrow" />
								</button>
								<button class="button--next appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:bg-[#FF6B18] hover:ring-[#FF6B18] transition-all duration-300 rotate-180">
									<img src="{{ asset('portal-berita/src/assets/images/icons/arrow.svg') }}" alt="arrow" />
								</button>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</section>
	
		<section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
			<div class="flex justify-between items-center">
				<h2 class="text-[26px] leading-[39px] font-bold bg-gradient-to-r from-[#ff8a00] to-[#fc6e6e] bg-clip-text text-transparent">
					Latest Hot News <br />
					Good for Curiousity
				</h2>
				<p class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">UP TO DATE</p>
			</div>
			<div class="grid grid-cols-3 gap-[30px]">
				@foreach ($latestPost as $post)
				<a href="{{ url('/post/' . $post->slug) }}" class="card-news">
					<div class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
						<div class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<!-- Badge kategori -->
							<p class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
								{{ strtoupper($post->category->name) }}
							</p>
							<img src="{{ asset('storage/' . $post->thumbnail) }}" class="object-cover w-full h-full" alt="{{ $post->title }}" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px] line-clamp-2">
								{{ $post->title }}
							</h3>
							<p class="text-sm leading-[20px] text-[#A3A6AE]">
								{{ $post->created_at->diffForHumans() }}
							</p>
						</div>
					</div>
				</a>
				@endforeach
			</div>
		</section>		

		<section id="Best-authors" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
			<div class="flex flex-col text-center gap-[14px] items-center">
				<p class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">BEST AUTHORS</p>
				<h2 class="font-bold text-[26px] leading-[39px]">
					Explore All Masterpieces <br />
					Written by People
				</h2>
			</div>
			<div class="flex flex-wrap justify-center gap-[30px]">
				@foreach ($bestAuthors as $author)
					<a href="{{ url('/author/' . $author->name) }}" class="card-authors w-full sm:w-auto">
						<div class="rounded-[20px] border border-[#EEF0F7] p-[26px_20px] flex flex-col items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
							<div class="w-[70px] h-[70px] flex shrink-0 rounded-full overflow-hidden">
								<img src="{{ asset('storage/' . $author->photo) }}" class="object-cover w-full h-full" alt="{{ $author->name }}" />
							</div>
							<div class="flex flex-col gap-1 text-center">
								<p class="font-semibold">{{ $author->name }}</p>
								<p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $author->posts_count }} News</p>
							</div>
						</div>
					</a>
				@endforeach
			</div>
		</section>
		
		<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
			<div class="flex flex-col gap-3 shrink-0 w-fit">
				<a href="#">
					<div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
						<img src="{{ asset('portal-berita/src/assets/images/iklans/bannerWide1.png') }}" class="object-cover w-full h-full" alt="ads" />
					</div>
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img src="{{ asset('portal-berita/src/assets/images/icons/message-question.svg') }}" alt="icon" /></a>
				</p>
			</div>
		</section>

		<section id="Latest-entertainment" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] my-[70px]">
			<div class="flex justify-between items-center">
				<h2 class="font-bold text-[26px] leading-[39px]">
					Most Views Post <br />
					You can Explore
				</h2>
				<a href="{{ url('/allposts') }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
					Explore All
				</a>
			</div>

			<div class="flex justify-between items-center h-fit">
				<!-- Most Views Post -->
				@if ($mostViewPost)
				<div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
					<img src="{{ asset('storage/' . $mostViewPost->thumbnail) }}" 
						 class="thumbnail absolute w-full h-full object-cover" 
						 alt="{{ $mostViewPost->title }}" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
					<div class="card-detail w-full flex items-end p-[30px] relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="inline-flex w-20 rounded-full px-2 py-1 bg-[#FF6B18] text-white font-bold text-[10px] leading-tight whitespace-nowrap overflow-hidden">
								Most Viewed
							</p>
							<a href="{{ url('/post/' . $mostViewPost->slug) }}" 
							   style="text-decoration: none;" 
							   class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300 line-clamp-2">
								{{$mostViewPost->title}}
							</a>
							<!-- Container untuk waktu publikasi dan views -->
							<div class="flex items-center text-white text-[14px] font-medium gap-[10px]">
								<p>{{ $post->created_at->diffForHumans() }}</p>
								<div class="flex items-center gap-[5px] absolute right-8">
									<img src="{{ asset('portal-berita/src/assets/images/icons/eye.png') }}" alt="Views Icon" class="w-[16px] h-[16px]" />
									@if ($mostViewPost->views >= 1000000)
										{{ number_format($mostViewPost->views / 1000000, 1) }}M views
									@elseif ($mostViewPost->views >= 1000)
										{{ number_format($mostViewPost->views / 1000, 1) }}K views
									@else
										{{ $mostViewPost->views }} views
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				
				@endif
		
				<!-- Post News -->
				<div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
					<div class="w-[455px] flex flex-col gap-5 shrink-0">
						@foreach ($viewPost as $post)
						<a href="{{ url('/post/' . $post->slug) }}" class="card py-[2px]">
							<div class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
								<div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
									<img src="{{ asset('storage/' . $post->thumbnail) }}" class="object-cover w-full h-full" alt="{{ $post->title }}" />
								</div>
								<div class="flex flex-col justify-center gap-[6px]">
									<h3 class="font-bold text-lg leading-[27px] line-clamp-2">{{$post->title}}</h3>
									<div class="flex items-center justify-between text-sm leading-[21px] text-[#A3A6AE]">
										<p>{{ $post->created_at->diffForHumans() }}</p>
										<div class="flex items-center gap-[5px] absolute right-9">
											<img src="{{ asset('portal-berita/src/assets/images/icons/g-eye.png') }}" alt="Views Icon" class="w-[16px] h-[16px]" />
											<span>
												@if ($post->views >= 1000000)
													{{ number_format($post->views / 1000000, 1) }}M views
												@elseif ($post->views >= 1000)
													{{ number_format($post->views / 1000, 1) }}K views
												@else
													{{ $post->views }} views
												@endif
											</span>
										</div>
									</div>
								</div>
							</div>
						</a>						
						@endforeach
					</div>
					<div class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]"></div>
				</div>
			</div>
		</section>

	@endsection
