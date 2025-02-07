
<nav id="Navbar" class="max-w-[1130px] mx-auto flex items-center mt-[30px]">
    <!-- Search Form -->
    <form action="{{ route('search') }}" method="GET" class="flex-1 flex items-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex shrink-0 mr-[20px]">
            <img src="{{ asset('storage/logo/ulbiinsight.png') }}" alt="Logo" class="h-[40px]" />
        </a>
        <div class="h-12 border border-[#E8EBF4]"></div>
        <!-- Search Box -->
        <div style="margin: 0 60px 0px 30px;"
            class="flex-1 flex items-center rounded-full border border-[#E8EBF4] p-[12px_20px] gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B18] transition-all duration-300 mx-[20px]">
            <button type="submit" class="w-5 h-5 flex shrink-0">
                <img src="{{ asset('portal-berita/src/assets/images/icons/search-normal.svg') }}" alt="icon" />
            </button>
            <input type="text" name="query"
                class="appearance-none outline-none w-full font-semibold placeholder:font-normal placeholder:text-[#A3A6AE]"
                placeholder="Search hot trendy news today..." />
        </div>

        <!-- Login Button -->
        <a href="{{ url('dashboard/login') }}"
            class="flex shrink-0 rounded-full p-[12px_22px] gap-[10px] font-bold transition-all duration-300 bg-[#FF6B18] text-white hover:shadow-[0_10px_20px_0_#FF6B1880] items-center ml-[20px]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="{{ asset('portal-berita/src/assets/images/icons/login.png') }}" alt="icon" />
            </div>
            <span>Login</span>
        </a>
    </form>
</nav>

<nav id="Category" class="max-w-[900px] mx-auto flex justify-center items-center gap-4 overflow-hidden mt-[30px]">
    <div class="category-carousel">
        @foreach ($categories as $category)
            <!-- Tambahkan div dengan class carousel-cell sebagai wrapper -->
            <div class="carousel-cell">
                <a href="{{ url('/category/' . $category->slug) }}"
                    class="rounded-full p-[14px_24px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
                    @if ($category->icon)
                        <div class="w-6 h-6 flex-shrink-0">
                            <img src="{{ asset('storage/icons/' . $category->icon) }}" alt="icon" />
                        </div>
                    @endif
                    <span>{{ $category->name }}</span>
                </a>
            </div>
        @endforeach
    </div>
</nav>