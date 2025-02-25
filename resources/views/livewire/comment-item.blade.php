<div class="border p-4 rounded-lg bg-white shadow-sm mt-2 {{ $comment->parent_id ? 'ml-6' : '' }}"
    wire:key="comment-{{ $comment->id }}">
    <div class="flex items-start justify-between">
        <div>
            <div class="font-semibold flex items-center gap-2">
                {{ $comment->user ? $comment->user->name : $comment->name }}
                @if ($comment->user)
                    @if ($comment->user->hasRole('super_admin'))
                        <span class="text-xs px-2 py-0.5 bg-green-500 text-white rounded-full">Admin</span>
                    @elseif ($comment->user->hasRole('validator'))
                        <span class="text-xs px-2 py-0.5 bg-red-500 text-white rounded-full">Validator</span>
                    @elseif ($comment->user->hasRole('author'))
                        <span class="text-xs px-2 py-0.5 bg-blue-500 text-white rounded-full">Author</span>
                    @endif
                @endif
                @if ($comment->parent)
                    <span class="text-sm text-gray-500">membalas
                        {{ $comment->parent->user ? $comment->parent->user->name : $comment->parent->name }}</span>
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

    <div class="mt-2">
        <button
            wire:click="setReplyTo({{ $comment->id }}, '{{ addslashes($comment->user ? $comment->user->name : $comment->name) }}')"
            class="text-blue-500 text-sm hover:underline">
            Reply
        </button>
    </div>

    <!-- Form Balasan Komentar -->
    @if ($replyTo === $comment->id)
        <div class="mt-4">
            <form wire:submit.prevent="submitReply({{ $comment->id }})">

                <!-- Tampilkan input nama dan email jika user belum login -->
                @guest
                    @if (!Session::has('visitor_name'))
                        <input type="text" wire:model.defer="name" class="w-full p-2 mb-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Nama Anda *">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <input type="email" wire:model.defer="email" class="w-full p-2 mb-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Email (opsional)">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    @else
                    @endif
                @endguest

                <textarea wire:model.defer="replyContent" class="w-full p-2 mb-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="3"
                    placeholder="Tulis balasan Anda..."></textarea>
                @error('replyContent')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <div class="mt-2 space-x-2">
                    <button type="submit"
                        class="rounded-full font-bold bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                        Balas
                    </button>
                    <button type="button" wire:click="cancelReply" class="text-gray-500 hover:text-gray-700 text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>

<!-- Rekursif Balasan - BALASAN DITAMPILKAN MENJOROK KE KANAN -->
@foreach ($comment->replies as $reply)
    <div class="mt-2">
        @include('livewire.comment-item', ['comment' => $reply])
    </div>
@endforeach
