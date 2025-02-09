@extends('layouts.app')

	@section('title', '' . $post->title)

	@section('content')

	@include('partials.navbar')
	<header class="flex flex-col items-center gap-[50px] mt-[70px]">
		<div id="Headline" class="max-w-[1130px] mx-auto flex flex-col gap-4 items-center">
			<p class="w-fit text-[#A3A6AE]">{{ $post->created_at->format('d M, Y') }} • {{ $post->category->name }}</p>
			<h1 id="Title" class="font-bold text-[46px] leading-[60px] text-center two-lines">{{ $post->title }}</h1>
			<div class="flex items-center justify-center gap-[70px]">
				<a id="Author" href="{{ url('/author/' . $post->author->name) }}" class="w-fit h-fit">
					<div class="flex items-center gap-3">
						<div class="w-10 h-10 rounded-full overflow-hidden">
							<img src="{{ asset('storage/' . $post->author->photo) }}" class="object-cover w-full h-full" alt="avatar">
						</div>
						<div class="flex flex-col">
							<p class="font-semibold text-sm leading-[21px]">{{ $post->author->name }}</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">Author</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="w-full h-[500px] flex shrink-0 overflow-hidden">
			<img src="{{ asset('storage/' . $post->thumbnail) }}" class="object-cover w-full h-full" alt="cover thumbnail">
		</div>
	</header>
	<section id="Article-container" class="max-w-[1130px] mx-auto flex gap-20 mt-[50px]">
		<article id="Content-wrapper">
			{!! $post->body !!}
	<h5>Share this post : </h5>
	<!-- Social Share Buttons Container -->
	<div class="flex items-center gap-3 mt-4">
		<!-- WhatsApp Share -->
		<a style="text-decoration: none;" href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' ' . url()->current()) }}" 
		target="_blank"
		class="rounded-full px-5 py-3 flex items-center gap-2 font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#059212] text-[#059212]">
			<img src="{{asset('whatsapp.png')}}" alt="wa" class="w-5 h-5">
			<span class="text-[#059212]">WhatsApp</span>
		</a>
    	<!-- Copy Link -->
		<button id="copyButton" 
		onclick="copyLink()" 
		class="rounded-full px-5 py-3 flex items-center gap-2 font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] text-[#FF6B18]">
			<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
			</svg>
			<span id="copyText">Copy Link</span>
		</button>
	</div>
			
		</article>

		<div class="side-bar flex flex-col w-[300px] shrink-0 gap-10">
			<div class="ads flex flex-col gap-3 w-full">
				<a href="">
					<img src="{{ asset('portal-berita/src/assets/images/iklans/banner.png')}}" class="object-contain w-full h-full" alt="ads" />
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
							src="{{ asset('portal-berita/src/assets/images/icons/message-question.svg')}}" alt="icon" /></a>
				</p>
			</div>
			<div id="More-from-author" class="flex flex-col gap-4">
				<p class="font-bold">More From Author</p>
				@foreach ($authorPost as $post)
				<a href="{{ url('/post/' . $post->slug) }}" class="card-from-author">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[14px] flex gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
						<div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden rounded-2xl">
							<img src="{{ asset('storage/' . $post->thumbnail) }}" class="object-cover w-full h-full"
								alt="thumbnail">
						</div>
						<div class="flex flex-col gap-[6px]">
							<p class="line-clamp-2 font-bold">{{ $post->title }}</p>
							<p class="text-sm leading-[20px] text-[#A3A6AE]">
								{{ Str::limit($post->created_at->diffForHumans() . ' • ' . $post->category->name, 24, '...') }}
							</p>
						</div>
					</div>
				</a>
				@endforeach
			</div>
			<div class="ads flex flex-col gap-3 w-full">
				<a href="">
					<img src="{{ asset('portal-berita/src/assets/images/iklans/banner1.png')}}" class="object-contain w-full h-full" alt="ads" />
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
							src="{{ asset('portal-berita/src/assets/images/icons/message-question.svg')}}" alt="icon" /></a>
				</p>
			</div>
		</div>
	</section>
	<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
		<div class="flex flex-col gap-3 shrink-0 w-fit">
			<a href="#">
				<div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
					<img src="{{ asset('portal-berita/src/assets/images/iklans/bannerWide.png')}}" class="object-cover w-full h-full" alt="ads" />
				</div>
			</a>
			<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
				Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
						src="{{ asset('portal-berita/src/assets/images/icons/message-question.svg')}}" alt="icon" /></a>
			</p>
		</div>
	</section>
	@livewire('comments', ['postId' => $post->id])
		<section id="Up-to-date" class="w-full flex justify-center mt-[70px] py-[50px] bg-[#F9F9FC] mb-0">
			<div class="max-w-[1130px] mx-auto flex flex-col gap-[30px]">
				<div class="flex justify-between items-center">
					<h2 class="font-bold text-[20px] leading-[39px] badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] text-[#FF6B18] w-fit">
						Other News You Might Be Interested...
					</h2>
				</div>
				<div class="grid grid-cols-3 gap-[30px]">
					@foreach ($allPosts as $post)
					<a href="{{ url('/post/' . $post->slug) }}" class="card-news">
						<div
							class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
							<div
								class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
								<p
									class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
									{{ strtoupper($post->category->name) }}</p>
								<img src="{{ asset('storage/' . $post->thumbnail) }}" class="object-cover w-full h-full"
									alt="thumbnail" />
							</div>
							<div class="card-info flex flex-col gap-[6px]">
								<h3 class="font-bold text-lg leading-[27px] line-clamp-2">{{ $post->title }}</h3>
								<p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $post->created_at->format('d M, Y') }}</p>
							</div>
						</div>
					</a>
					@endforeach
				</div>
			</div>
		</section>

@endsection

		@push('scripts')
		<script>
			function copyLink() {
				const copyButton = document.getElementById('copyButton');
				const copyText = document.getElementById('copyText');

				// Copy URL ke clipboard
				navigator.clipboard.writeText(window.location.href).then(() => {
					// Ubah teks tombol menjadi "Copied"
					copyText.textContent = 'Copied';

					// Tambahkan kelas untuk menunjukkan bahwa tombol telah diklik
					copyButton.classList.add('bg-[#FF6B18]', 'text-white');
					copyButton.classList.remove('text-[#4F46E5]');

					// Kembalikan teks tombol ke "Copy Link" setelah 3 detik
					setTimeout(() => {
						copyText.textContent = 'Copy Link';
						copyButton.classList.remove('bg-[#FF6B18]', 'text-white');
						copyButton.classList.add('text-[#4F46E5]');
					}, 3000);
				});
			}
		</script>
		@endpush
