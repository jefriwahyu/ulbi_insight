@extends('layouts.app')

@section('title', 'Search ' . $query)
@section('content')
    @include('partials.navbar')
    <section id="heading" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
        <h1 class="text-4xl leading-[45px] font-bold text-center">
            Explore Hot Trending <br />
            Good News Today
        </h1>
    </section>
    <section id="search-result" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[70px] mb-[100px]">
		<h2 class="text-[26px] leading-[39px] font-bold flex items-center gap-3">
			Search Result: <span class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit inline-flex items-center">{{ $query }}</span>
		</h2>
        @if($searchPost->count() > 0)
        <div id="search-cards" class="grid grid-cols-3 gap-[30px]">
            @foreach($searchPost as $post)
            <a href="{{ url('/post/' . $post->slug) }}" class="card">
                <div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
                    <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
                        <div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
                            <p class="text-xs leading-[18px] font-bold">{{ strtoupper($post->category->name) }}</p> <!-- Ganti dengan kategori yang sesuai -->
                        </div>
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="thumbnail photo" class="w-full h-full object-cover" />
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <h3 class="text-lg leading-[27px] font-bold line-clamp-2">{{ $post->title }}</h3>
                        <p class="text-sm leading-[20px] text-[#A3A6AE]">
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
		<div class="w-full flex justify-center mt-8">
			{{ $searchPost->withQueryString()->links() }}
        </div>
        @else
        <div class="flex items-center justify-center w-full min-h-[200px]">
            <h2 class="text-center font-bold text-lg text-gray-600">
                No results found for "{{ $query }}"
            </h2>
        </div>
        @endif
    </section>
@endsection
