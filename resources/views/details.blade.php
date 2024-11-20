<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="{{ asset('portal-berita/src/output.css') }}" rel="stylesheet" />
	<link href="{{ asset('portal-berita/src/main.css')}}" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
		rel="stylesheet" />
	<!-- CSS -->
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
</head>

<body class="font-[Poppins]">
	@include('partials.navbar')
	<nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
		<a href="categoryPage.html"
			class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
			<div class="w-6 h-6 flex shrink-0">
				<img src="{{ asset('portal-berita/src/assets/images/icons/heart.svg') }}" alt="icon" />
			</div>
			<span>Health</span>
		</a>
		<a href="categoryPage.html"
			class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
			<div class="w-6 h-6 flex shrink-0">
				<img src="{{ asset('portal-berita/src/assets/images/icons/status-up.svg')}}" alt="icon" />
			</div>
			<span>Business</span>
		</a>
		<a href="categoryPage.html"
			class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
			<div class="w-6 h-6 flex shrink-0">
				<img src="{{ asset('portal-berita/src/assets/images/icons/car.svg')}}" alt="icon" />
			</div>
			<span>Automotive</span>
		</a>
		<a href="categoryPage.html"
			class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
			<div class="w-6 h-6 flex shrink-0">
				<img src="{{ asset('portal-berita/src/assets/images/icons/global.svg')}}" alt="icon" />
			</div>
			<span>Entertainment</span>
		</a>
		<a href="categoryPage.html"
			class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
			<div class="w-6 h-6 flex shrink-0">
				<img src="{{ asset('portal-berita/src/assets/images/icons/coffee.svg')}}" alt="icon" />
			</div>
			<span>Foods</span>
		</a>
		<a href="categoryPage.html"
			class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
			<div class="w-6 h-6 flex shrink-0">
				<img src="portal-berita/src/assets/images/icons/courthouse.svg" alt="icon" />
			</div>
			<span>Politic</span>
		</a>
		<a href="categoryPage.html"
			class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
			<div class="w-6 h-6 flex shrink-0">
				<img src="{{ asset('portal-berita/src/assets/images/icons/cup.svg')}}" alt="icon" />
			</div>
			<span>Sport</span>
		</a>
	</nav>
	<header class="flex flex-col items-center gap-[50px] mt-[70px]">
		<div id="Headline" class="max-w-[1130px] mx-auto flex flex-col gap-4 items-center">
			<p class="w-fit text-[#A3A6AE]">12 Jun, 2024 • Business</p>
			<h1 id="Title" class="font-bold text-[46px] leading-[60px] text-center two-lines">Peternak Jakarta
				Menggunakan Bantuan A.I Prexpeliangga</h1>
			<div class="flex items-center justify-center gap-[70px]">
				<a id="Author" href="author.html" class="w-fit h-fit">
					<div class="flex items-center gap-3">
						<div class="w-10 h-10 rounded-full overflow-hidden">
							<img src="{{ asset('portal-berita/src/assets/images/photos/photo3.png')}}" class="object-cover w-full h-full" alt="avatar">
						</div>
						<div class="flex flex-col">
							<p class="font-semibold text-sm leading-[21px]">Rita Putria</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">Sr Programmer</p>
						</div>
					</div>
				</a>
				<div id="Rating" class="flex items-center gap-1">
					<div class="flex items-center">
						<div class="w-4 h-4 flex shrink-0">
							<img src="{{ asset('portal-berita/src/assets/images/icons/Star 1.svg')}}" alt="star">
						</div>
						<div class="w-4 h-4 flex shrink-0">
							<img src="{{ asset('portal-berita/src/assets/images/icons/Star 1.svg')}}" alt="star">
						</div>
						<div class="w-4 h-4 flex shrink-0">
							<img src="{{ asset('portal-berita/src/assets/images/icons/Star 1.svg')}}" alt="star">
						</div>
						<div class="w-4 h-4 flex shrink-0">
							<img src="{{ asset('portal-berita/src/assets/images/icons/Star 1.svg')}}" alt="star">
						</div>
						<div class="w-4 h-4 flex shrink-0">
							<img src="{{ asset('portal-berita/src/assets/images/icons/Star 1.svg')}}" alt="star">
						</div>
					</div>
					<p class="font-semibold text-xs leading-[18px]">(12,490)</p>
				</div>
			</div>
		</div>
		<div class="w-full h-[500px] flex shrink-0 overflow-hidden">
			<img src="{{ asset('portal-berita/src/assets/images/thumbnails/cover1.jpg')}}" class="object-cover w-full h-full" alt="cover thumbnail">
		</div>
	</header>
	<section id="Article-container" class="max-w-[1130px] mx-auto flex gap-20 mt-[50px]">
		<article id="Content-wrapper">
			<p>I‘ll be real. I held out on AI as long as I could. I was convinced it was going to be humanity’s downfall
				from the first time my phone had the audacity to tell me I actually meant to say, “I have no ducking
				idea” — but desperate times call for desperate.</p>
			<p>Want to teach a course about real estate investing? Fantastic, but make sure you have experience as a
				real estate investor. Want to teach hair stylists how to successfully open their own salons? Do it. But
				you should have opened your own salon first.</p>
			<h3>So you should have known</h3>
			<p>I launched my first digital course without any prior experience in the niche I was teaching about. In my
				hurry to <ins>establish myself as an expert</ins>, I overlooked the importance of having hands-on
				experience. Can you guess how this turned out? Yep, my first course was a total flop:</p>
			<ul>
				<li>
					<p><strong>Credibility:</strong> To build trust with your future students, you need to show them
						that you're the real deal. Having actual experience in the subject matter is the first step to
						gaining their confidence.</p>
				</li>
			</ul>
			<ul>
				<li>
					<p><strong>Effective Teaching:</strong> When you have demonstrated experience, your teaching becomes
						more powerful. You can relate to the challenges your students might face and provide practical,
						real-world solutions for them.</p>
				</li>
			</ul>
			<figure>
				<img src="{{ asset('portal-berita/src/assets/images/thumbnails/article1.png')}}" alt="image">
				<figcaption></figcaption>
			</figure>
			<h3>What SEO Experts Recommend</h3>
			<p>For marketers, this means that previously high-ranking content may be outranked by a rich Reddit or Quora
				thread on the same topic. As a result, it’s becoming increasingly important for businesses to establish
				a presence on these community-aggregated sites to stay connected to users.</p>
			<ul>
				<li>
					<p><strong>Credibility:</strong> To build trust with your future students, you need to show them
						that you're the real deal. Having actual experience in the subject matter is the first step to
						gaining their confidence.</p>
				</li>
			</ul>
			<p>Published on both offline and online marketing materials, these claims boasted investment strategies that
				were powered by ‘expert AI-driven forecasts’ and that would ‘turn your data into an unfair investing
				advantage.’ One of them even claimed to be ‘the first regulated AI financial advisor.’</p>
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
				<a href="" class="card-from-author">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[14px] flex gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
						<div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden rounded-2xl">
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-demonstration.png')}}" class="object-cover w-full h-full"
								alt="thumbnail">
						</div>
						<div class="flex flex-col gap-[6px]">
							<p class="line-clamp-2 font-bold">Gaya pakaian pernikahan artis Lorem, ipsum dolor.</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">12 Jun, 2024 • Entertainment</p>
						</div>
					</div>
				</a>
				<a href="" class="card-from-author">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[14px] flex gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
						<div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden rounded-2xl">
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-cyclist.png')}}" class="object-cover w-full h-full"
								alt="thumbnail">
						</div>
						<div class="flex flex-col gap-[6px]">
							<p class="line-clamp-2 font-bold">Gaya pakaian pernikahan artis Lorem, ipsum dolor.</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">12 Jun, 2024 • Entertainment</p>
						</div>
					</div>
				</a>
				<a href="" class="card-from-author">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[14px] flex gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
						<div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden rounded-2xl">
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/model.png')}}" class="object-cover w-full h-full"
								alt="thumbnail">
						</div>
						<div class="flex flex-col gap-[6px]">
							<p class="line-clamp-2 font-bold">Gaya pakaian pernikahan artis Lorem, ipsum dolor.</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">12 Jun, 2024 • Entertainment</p>
						</div>
					</div>
				</a>
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
	<section id="Up-to-date" class="w-full flex justify-center mt-[70px] py-[50px] bg-[#F9F9FC]">
		<div class="max-w-[1130px] mx-auto flex flex-col gap-[30px]">
			<div class="flex justify-between items-center">
				<h2 class="font-bold text-[26px] leading-[39px]">
					Other News You <br />
					Might Be Interested
				</h2>
			</div>
			<div class="grid grid-cols-3 gap-[30px]">
				<a href="{{ url('details')}}" class="card-news">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
						<div
							class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<p
								class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
								SPORT</p>
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-cyclist.png')}}" class="object-cover w-full h-full"
								alt="thumbnail" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px]">Bersepeda dapat membuat diri menjadi lebih baik
								lagi</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
				<a href="details.html" class="card-news">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
						<div
							class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<p
								class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
								ENTERTAINMENT</p>
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/camp.png')}}" class="object-cover w-full h-full"
								alt="thumbnail" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px]">Beberapa artis ini merayakan ultah di tengah
								hutan raya</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
				<a href="details.html" class="card-news">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
						<div
							class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<p
								class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
								POLITIC</p>
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-demonstration.png')}}" class="object-cover w-full h-full"
								alt="thumbnail" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px]">Terjadi demo pada ibu kota jakarta membuat
								macet parah</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</section>

	<script src="{{ asset('portal-berita/src/js/two-lines-text.js') }}"></script>
</body>

</html>