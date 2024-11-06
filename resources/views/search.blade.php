<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="{{ asset('portal-berita/src/output.css')}}" rel="stylesheet" />
		<link href="{{ asset('portal-berita/src/main.css')}}" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
	</head>
	<body class="font-[Poppins]">
		<nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
			<a href="{{ url('home')}}">
				<div class="flex shrink-0">
					<img src="{{ asset('portal-berita/src/assets/images/logos/logo.svg')}}" alt="Maga Logo" />
				</div>
			</a>
			<div class="flex items-center gap-3">
				<a href="" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Upgrade Pro</a>
				<a href="" class="rounded-full p-[12px_22px] flex gap-[10px] font-bold transition-all duration-300 bg-[#FF6B18] text-white hover:shadow-[0_10px_20px_0_#FF6B1880]">
					<div class="w-6 h-6 flex shrink-0">
						<img src="{{ asset('portal-berita/src/assets/images/icons/favorite-chart.svg')}}" alt="icon" />
					</div>
					<span>Post Ads</span>
				</a>
			</div>
		</nav>
		<nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
			<a href="{{ url('category')}}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{ asset('portal-berita/src/assets/images/icons/heart.svg')}}" alt="icon" />
				</div>
				<span>Health</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{ asset('portal-berita/src/assets/images/icons/status-up.svg')}}" alt="icon" />
				</div>
				<span>Business</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{ asset('portal-berita/src/assets/images/icons/car.svg')}}" alt="icon" />
				</div>
				<span>Automotive</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{ asset('portal-berita/src/assets/images/icons/global.svg')}}" alt="icon" />
				</div>
				<span>Entertainment</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{ asset('portal-berita/src/assets/images/icons/coffee.svg')}}" alt="icon" />
				</div>
				<span>Foods</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{ asset('portal-berita/src/assets/images/icons/courthouse.svg')}}" alt="icon" />
				</div>
				<span>Politic</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{ asset('portal-berita/src/assets/images/icons/cup.svg')}}" alt="icon" />
				</div>
				<span>Sport</span>
			</a>
		</nav>
		<section id="heading" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
			<h1 class="text-4xl leading-[45px] font-bold text-center">
				Explore Hot Trending <br />
				Good News Today
			</h1>
			<form action="#">
				<label for="search-bar" class="w-[500px] flex p-[12px_20px] transition-all duration-300 gap-[10px] ring-1 ring-[#E8EBF4] focus-within:ring-2 focus-within:ring-[#FF6B18] rounded-[50px] group">
					<div class="w-5 h-5 flex shrink-0">
						<img src="{{ asset('portal-berita/src/assets/images/icons/search-normal.svg')}}" alt="icon" />
					</div>
					<input
						autocomplete="off"
						type="text"
						id="search-bar"
						name="search-bar"
						placeholder="Search hot trendy news today..."
						class="appearance-none font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] outline-none focus:ring-0 w-full"
					/>
				</label>
			</form>
		</section>
		<section id="search-result" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[70px] mb-[100px]">
			<h2 class="text-[26px] leading-[39px] font-bold">Search Result: <span>Sepeda</span></h2>
			<div id="search-cards" class="grid grid-cols-3 gap-[30px]">
				<a href="details.html" class="card">
					<div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
						<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
							<div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
								<p class="text-xs leading-[18px] font-bold">ENTERTAINMENT</p>
							</div>
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-building.png')}}" alt="thumbnail photo" class="w-full h-full object-cover" />
						</div>
						<div class="flex flex-col gap-[6px]">
							<h3 class="text-lg leading-[27px] font-bold">Beberapa artis ini merayakan ultah di tengah hutan raya</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
				<a href="details.html" class="card">
					<div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
						<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
							<div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
								<p class="text-xs leading-[18px] font-bold">ENTERTAINMENT</p>
							</div>
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-sunbathe.png')}}" alt="thumbnail photo" class="w-full h-full object-cover" />
						</div>
						<div class="flex flex-col gap-[6px]">
							<h3 class="text-lg leading-[27px] font-bold">Terjadi demo pada ibu kota jakarta membuat macet parah</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
				<a href="details.html" class="card">
					<div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
						<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
							<div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
								<p class="text-xs leading-[18px] font-bold">ENTERTAINMENT</p>
							</div>
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-cyclist.png')}}" alt="thumbnail photo" class="w-full h-full object-cover" />
						</div>
						<div class="flex flex-col gap-[6px]">
							<h3 class="text-lg leading-[27px] font-bold">Bersepeda dapat membuat diri menjadi lebih baik lagi</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
				<a href="details.html" class="card">
					<div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
						<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
							<div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
								<p class="text-xs leading-[18px] font-bold">ENTERTAINMENT</p>
							</div>
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-bulldozer.png')}}" alt="thumbnail photo" class="w-full h-full object-cover" />
						</div>
						<div class="flex flex-col gap-[6px]">
							<h3 class="text-lg leading-[27px] font-bold">Bersepeda dapat membuat diri menjadi lebih baik lagi</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
				<a href="details.html" class="card">
					<div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
						<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
							<div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
								<p class="text-xs leading-[18px] font-bold">ENTERTAINMENT</p>
							</div>
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-key.png')}}" alt="thumbnail photo" class="w-full h-full object-cover" />
						</div>
						<div class="flex flex-col gap-[6px]">
							<h3 class="text-lg leading-[27px] font-bold">Beberapa artis ini merayakan ultah di tengah hutan raya</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
				<a href="details.html" class="card">
					<div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
						<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
							<div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
								<p class="text-xs leading-[18px] font-bold">POLITIC</p>
							</div>
							<img src="{{ asset('portal-berita/src/assets/images/thumbnails/th-demonstration.png')}}" alt="thumbnail photo" class="w-full h-full object-cover" />
						</div>
						<div class="flex flex-col gap-[6px]">
							<h3 class="text-lg leading-[27px] font-bold">Terjadi demo pada ibu kota jakarta membuat macet parah</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
			</div>
		</section>
	</body>
</html>