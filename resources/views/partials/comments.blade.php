@foreach($comments as $comment)
    <div class="border p-3 my-2 rounded-lg">
        <strong>
            @if($comment->user)
                {{ $comment->user->name }} 
                @if($comment->user->hasRole('admin')) <span class="text-red-500">(Admin)</span> @endif
                @if($comment->user->hasRole('author')) <span class="text-blue-500">(Author)</span> @endif
                @if($comment->user->hasRole('validator')) <span class="text-green-500">(Validator)</span> @endif
            @else
                {{ $comment->name }} (Visitor)
            @endif
        </strong>
        <p>{{ $comment->content }}</p>
    </div>
@endforeach
    <!-- Pagination -->
    <div class="mt-4">
        {{ $comments->links() }}
    </div>
