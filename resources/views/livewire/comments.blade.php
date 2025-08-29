<div class="max-w-[1130px] sm:max-lg:mx-[40px] lg:mx-auto mx-[30px] mt-[50px] ">
    <h3 class="font-bold text-lg">Komentar</h3>

    @if (session()->has('success'))
        <div class="text-green-500 p-2 rounded mb-1">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="text-red-500 p-2 rounded mb-1">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form Tambah Komentar -->
    <form wire:submit.prevent="submitComment" class="mt-4">
        @csrf
        @guest
            @if(!Session::has('visitor_name'))
                <input type="text" wire:model.defer="name" class="w-full p-3 mb-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Nama Anda *">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <input type="email" wire:model.defer="email" class="w-full p-3 mb-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Email (opsional)">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            @else
                <div class="mb-4 text-sm text-gray-600">
                    Commenting as: {{ Session::get('visitor_name') }}
                </div>
            @endif
        @endguest

        <textarea wire:model.defer="content" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                  rows="4" placeholder="Tulis komentar Anda di sini..."></textarea>
        @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <button type="submit" class="rounded-full font-bold mt-3 bg-[#FF6B18] hover:bg-orange-600 text-white px-4 py-2 rounded">
            Kirim
        </button>
    </form>

    <!-- Daftar Komentar -->
    <div class="mt-8 space-y-4">
        @foreach ($comments as $comment)
            @include('livewire.comment-item', ['comment' => $comment, 'indent' => 0])
        @endforeach
    </div>

<!-- Tombol Load More -->
@if ($comments->total() > $comments->count())
    <div class="mt-4 text-center">
        <button wire:click="loadMore" wire:loading.attr="disabled"
            class="rounded-full bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-200">
            <span wire:loading.remove wire:target="loadMore">Load More</span>
            <span wire:loading wire:target="loadMore">Loading...</span>
        </button>
    </div>
@endif

</div>
