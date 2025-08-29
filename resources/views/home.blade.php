@extends('layouts.app')

@section('title', 'Ulbi Insight')

@section('content')

    @include('partials.navbar')
    <section id="Featured" class="sm:max-2xl:mt-[30px] mt-[0px]">
        <div class="main-carousel w-full">
            @foreach ($featuredPosts as $post)
                <div class="featured-news-card relative w-full h-[250px] sm:max-2xl:h-[550px] flex shrink-0 overflow-hidden">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                        class="thumbnail absolute w-full h-full object-cover" alt="{{ $post->title }}" />
                    <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                    </div>
                    <div
                        class="card-detail max-w-[1130px] mx-[10px] w-full sm:max-xl:mx-[50px] xl:mx-auto flex items-end justify-between sm:max-2xl:pb-10 pb-3 relative z-20 ">
                        <div class="flex flex-col gap-[10px]">
                            <p
                                class="inline-block rounded-full px-2 py-1 bg-[#FF6B18] text-white w-fit font-bold sm:max-2xl:text-[13px] text-[10px] leading-tight">
                                Featured</p>
                            <a href="{{ url('/post/' . $post->slug) }}" style="text-decoration: none;"
                                class="leading-relaxed line-clamp-2 font-bold text-[16px] lg:max-2xl:text-4xl sm:text-xl md:max-lg:text-2xl text-white two-lines hover:underline transition-all duration-300">
                                {{ $post->title }}
                            </a>
                            <p class="text-white text-sm sm:max-2xl:text-md">{{ $post->created_at->diffForHumans() }} •
                                {{ $post->category->name }}</p>
                        </div>
                        <div class="prevNextButtons flex items-center gap-4 mb-[60px]">
                            <button
                                class="button--previous appearance-none w-[25px] h-[25px] sm:max-2xl:w-[38px] sm:max-2xl:h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:bg-[#FF6B18] hover:ring-[#FF6B18] transition-all duration-300">
                                <img src="{{ asset('portal-berita/src/assets/images/icons/arrow.svg') }}" alt="arrow" />
                            </button>
                            <button
                                class="button--next appearance-none w-[25px] h-[25px] sm:max-2xl:w-[38px] sm:max-2xl:h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:bg-[#FF6B18] hover:ring-[#FF6B18] transition-all duration-300 rotate-180">
                                <img src="{{ asset('portal-berita/src/assets/images/icons/arrow.svg') }}" alt="arrow" />
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="Up-to-date" class="max-w-[1130px] mx-[10px] sm:max-xl:mx-[50px] xl:mx-auto flex flex-col gap-[30px] sm:max-2xl:mt-[70px] mt-[40px]">
        <div class="flex justify-between items-center">
            <h2
                class="sm:max-2xl:text-[26px] text-[17px] leading-relaxed font-bold bg-gradient-to-r from-[#ff8a00] to-[#fc6e6e] bg-clip-text text-transparent">
                Latest Hot News <br />
                Good for Curiousity
            </h2>
            <p
                class="badge-orange rounded-full sm:max-2xl:p-[8px_18px] p-[5px_15px] bg-[#FFECE1] font-bold sm:max-2xl:text-sm text-[10px] leading-relaxed text-[#FF6B18] w-fit">
                UP TO DATE</p>
        </div>
        <div class="grid sm:max-2xl:grid-cols-3 grid-cols-1 gap-[30px] mx-[13px] sm:max-2xl:mx-[0px]">
            @foreach ($latestPost as $post)
                <a href="{{ url('/post/' . $post->slug) }}">
                    <div
                        class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
                        <div
                            class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
                            <!-- Badge kategori -->
                            <p
                                class="badge-white absolute top-5 left-5 rounded-full sm:max-2xl:p-[8px_18px] p-[5px_13px] bg-white font-bold sm:max-2xl:text-xs text-[11px] leading-[18px]">
                                {{ strtoupper($post->category->name) }}
                            </p>
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="object-cover w-full h-full"
                                alt="{{ $post->title }}" />
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
            <p
                class="badge-orange rounded-full sm:max-2xl:p-[8px_18px] p-[5px_13px] bg-[#FFECE1] font-bold sm:max-2xl:text-sm text-[12px] leading-[21px] text-[#FF6B18] w-fit">
                BEST AUTHORS</p>
            <h2 class="font-bold sm:max-2xl:text-[26px] text-[22px] leading-relaxed">
                Explore All Masterpieces <br />
                Written by People
            </h2>
        </div>
        <div class="flex flex-wrap justify-center gap-[30px]">
            @foreach ($bestAuthors as $author)
                <a href="{{ url('/author/' . $author->name) }}" class="card-authors w-fit sm:max-2xl:w-fit">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[26px_20px] flex flex-col items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[70px] h-[70px] flex shrink-0 rounded-full overflow-hidden">
                            <img src="{{ asset('storage/' . $author->photo) }}" class="object-cover w-full h-full"
                                alt="{{ $author->name }}" />
                        </div>
                        <div class="flex flex-col gap-1 text-center">
                            <p class="font-semibold">{{ $author->name }}</p>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $author->published_posts_count }} News</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
        <div class="flex flex-col gap-1 shrink-0 w-fit">
            <a href="#">
                <div class="sm:max-xl:w-[600px] sm:max-xl:h-[70px] xl:w-full xl:h-full h-[50px] w-[350px] flex shrink-0 border border-[#EEF0F7] sm:max-2xl:rounded-2xl rounded-xl overflow-hidden">
                    <img src="{{ asset('portal-berita/src/assets/images/iklans/bannerWide1.png') }}"
                        class="object-cover w-full h-full" alt="ads" />
                </div>
            </a>
            <p class="font-medium sm:max-2xl:text-sm text-[7px] sm:max-2xl:leading-[21px] text-[#A3A6AE] flex gap-1">
                Our Advertisement <a href="#" class="sm:max-2xl:w-[18px] sm:max-2xl:h-[18px] w-[11px] h-[11px]"><img
                        src="{{ asset('portal-berita/src/assets/images/icons/message-question.svg') }}"
                        alt="icon" /></a>
            </p>
        </div>
    </section>

    <section id="Latest-entertainment" class="max-w-[1130px] mx-[10px] sm:max-xl:mx-[50px] xl:mx-auto flex flex-col gap-[30px] my-[70px]">
        <div class="flex justify-between items-center">
            <h2 class="font-bold sm:max-2xl:text-[26px] text-[22px] leading-relaxed">
                Most Views Post <br />
                You can Explore
            </h2>
            <a href="{{ url('/allposts') }}"
                class="rounded-full sm:max-2xl:p-[12px_22px] p-[5px_11px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
                Explore All
            </a>
        </div>

        <div class="lg:flex sm:max-2xl:mx-[0px] mx-[10px] justify-between place-items-center h-fit">
            <!-- Most Views Post -->
            @if ($mostViewPost)
                <div class="featured-news-card relative w-full sm:max-2xl:h-[424px] h-[250px] flex flex-1 rounded-[20px] overflow-hidden">
                    <img src="{{ asset('storage/' . $mostViewPost->thumbnail) }}"
                        class="thumbnail absolute w-full h-full object-cover" alt="{{ $mostViewPost->title }}" />
                    <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                    </div>
                    <div class="card-detail w-full flex items-end sm:max-2xl:p-[30px] p-[20px] relative z-20">
                        <div class="flex flex-col gap-[10px]">
                            <p
                                class="inline-flex w-fit rounded-full px-2 py-1 bg-[#FF6B18] text-white font-bold text-[10px] leading-tight whitespace-nowrap overflow-hidden">
                                Most Viewed
                            </p>
                            <a href="{{ url('/post/' . $mostViewPost->slug) }}" style="text-decoration: none;"
                                class="font-bold sm:max-2xl:text-[30px] text-[16px] leading-relaxed text-white hover:underline transition-all duration-300 line-clamp-2">
                                {{ $mostViewPost->title }}
                            </a>
                            <!-- Container untuk waktu publikasi dan views -->
                            <div class="flex items-center text-white text-[14px] font-medium gap-[10px]">
                                <p>{{ $post->created_at->diffForHumans() }}</p>
                                <div class="flex items-center gap-[5px] absolute right-8">
                                    <img src="{{ asset('portal-berita/src/assets/images/icons/eye.png') }}"
                                        alt="Views Icon" class="w-[16px] h-[16px]" />
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
                <div class="sm:max-2xl:w-[455px] w-fit flex flex-col gap-5 shrink-0">
                    @foreach ($viewPost as $post)
                        <a href="{{ url('/post/' . $post->slug) }}" class="card py-[2px]">
                            <div
                                class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                                <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                        class="object-cover w-full h-full" alt="{{ $post->title }}" />
                                </div>
                                <div class="flex flex-col justify-center gap-[2px]">
                                    <h3 class="font-bold sm:max-2xl:text-lg text-sm leading-relaxed line-clamp-2">{{ $post->title }}</h3>
                                    <div class="sm:max-2xl:flex items-center justify-between sm:max-2xl:text-sm text-[12px] leading-[21px] text-[#A3A6AE]">
                                        <p>{{ $post->created_at->diffForHumans() }}</p>
                                        <div class="flex items-center gap-[5px] sm:max-2xl:absolute sm:max-2xl:right-9">
                                            <img src="{{ asset('portal-berita/src/assets/images/icons/g-eye.png') }}"
                                                alt="Views Icon" class="sm:max-2xl:w-[16px] sm:max-2xl:h-[16px] w-[11px] h-[11px]" />
                                            <span class="sm:max-2xl:text-sm text-[11px] font-medium">
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
                <div
                    class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
                </div>
            </div>
        </div>
    </section>

@endsection
