
<nav id="Navbar" class="max-w-[1130px] mx-[10px] sm:max-xl:mx-[50px] xl:mx-auto flex items-center mt-[30px]">
    <!-- Search Form -->
    <form action="{{ route('search') }}" method="GET" class="flex-1 flex items-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex shrink-0 sm:max-2xl:mr-[20px] mr-[7px]">
            <img src="{{ asset('storage/logo/ulbiinsight.png') }}" alt="Logo" class="sm:max-2xl:h-[40px] h-[25px]" />
        </a>
        <div class="sm:max-2xl:h-12 h-8 border border-[#E8EBF4]"></div>
        <!-- Search Box -->
        <div
            class="flex-1 flex items-center rounded-full border border-[#E8EBF4] sm:max-2xl:p-[12px_20px] p-[7px_10px] gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B18] transition-all duration-300 sm:max-2xl:mx-[20px] mx-[8px]">
            <button type="submit" class="sm:max-2xl:w-5 sm:max-2xl:h-5 w-3 h-3 flex shrink-0">
                <img src="{{ asset('portal-berita/src/assets/images/icons/search-normal.svg') }}" alt="icon" />
            </button>
            <input type="text" name="query"
                class="appearance-none outline-none sm:max-2xl:w-full w-[110px] font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] sm:max-2xl:placeholder:text-lg placeholder:text-[10px]"
                placeholder="Search hot trendy news today..." />
        </div>

        <!-- Login Button -->
        <a href="{{ url('dashboard/login') }}"
            class="flex shrink-0 rounded-full p-[7px_10px] sm:max-2xl:p-[12px_22px] gap-[10px] font-bold transition-all duration-300 bg-[#FF6B18] text-white hover:shadow-[0_10px_20px_0_#FF6B1880] items-center ml-[10px] sm:max-2xl:ml-[20px]">
            <div class="h-3 w-3 sm:max-2xl:h-6 sm:max-2xl:w-6 flex shrink-0">
                <img src="{{ asset('portal-berita/src/assets/images/icons/login.png') }}" alt="icon" />
            </div>
            <span class="sm:max-2xl:text-[15px] text-[9px]">Login</span>
        </a>
    </form>
</nav>

<nav id="Category" class="max-w-[900px] mx-auto flex justify-center items-center gap-4 overflow-hidden sm:max-2xl:my-[30px] my-[10px]">
    <div class="category-carousel">
        @foreach ($categories as $category)
            <div class="carousel-cell">
                <a href="{{ url('/category/' . $category->slug) }}"
                    class="rounded-full p-[7px_10px] sm:max-2xl:p-[14px_24px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
                    @if ($category->icon)
                        <div class="w-6 h-6 flex-shrink-0">
                            <img src="{{ asset('storage/icons/' . $category->icon) }}" alt="icon" />
                        </div>
                    @endif
                    <span class="sm:max-2xl:text-[15px] text-[9px]">{{ $category->name }}</span>
                </a>
            </div>
        @endforeach
    </div>
</nav>
