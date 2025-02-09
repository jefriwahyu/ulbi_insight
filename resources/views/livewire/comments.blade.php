<div class="max-w-[1130px] mx-auto mt-[50px]">
    <h3 class="font-bold text-lg">Komentar</h3>

    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="submitComment" class="mt-4">
        @csrf
    
        @guest
            <!-- Form hanya untuk visitor -->
            <input type="text" wire:model.defer="name" class="w-full border p-2 rounded" placeholder="Nama Anda *">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    
            <input type="email" wire:model.defer="email" class="w-full border p-2 rounded mt-2" placeholder="Email (opsional)">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        @endguest
    
        <textarea wire:model.defer="content" class="w-full border p-2 rounded mt-2"
                  rows="4" placeholder="Tulis komentar Anda di sini..."></textarea>
        @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    
        <button type="submit" class="mt-3 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Kirim Komentar
        </button>
    </form>
    

    <!-- Daftar Komentar -->
    <div class="mt-8 space-y-4">
        @foreach ($comments as $comment)
            <div class="border p-4 rounded-lg bg-white shadow-sm" wire:key="comment-{{ $comment->id }}">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="font-semibold">
                            @if ($comment->user)
                                {{ $comment->user->name }}
                                @if ($comment->user->hasRole('super_admin'))
                                    <span
                                        class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full ml-2">Admin</span>
                                @elseif($comment->user->hasRole('author'))
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full ml-2">Author</span>
                                @endif
                            @else
                                {{ $comment->name }}
                            @endif
                        </div>
                        <div class="text-gray-500 text-sm">
                            {{ $comment->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                <div class="mt-2 text-gray-700">
                    {{ $comment->content }}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Load More Button -->
    @if ($comments->hasMorePages())
        <div class="mt-4 text-center">
            <button wire:click="loadMore" wire:loading.attr="disabled"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition duration-200">
                <span wire:loading.remove wire:target="loadMore">Load More</span>
                <span wire:loading wire:target="loadMore">Loading...</span>
            </button>
        </div>
    @endif

</div>
