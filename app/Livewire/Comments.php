<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $postId;
    public $content;
    public $name;
    public $email;
    public $perPage = 5;

    protected array $forbiddenWords = ['anjay', 'kasar', 'kasar2', 'goblok'];

    // Add queryString to persist postId
    protected $queryString = ['postId'];

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'content' => 'required|min:3|max:500',
            'name' => Auth::check() ? 'nullable' : 'required|string|max:255|min:3',
            'email' => 'nullable|email|max:255',
        ];
    }

    public function submitComment()
    {
        $this->validate();

        $content = strtolower($this->content);
        foreach ($this->forbiddenWords as $word) {
            if (preg_match('/' . preg_quote($word, '/') . '/i', $content)) {
                session()->flash('error', 'Komentar Anda mengandung kata yang tidak diperbolehkan.');
                return;
            }
        }

        try {
            if (Auth::check()) {
                Comment::create([
                    'post_id' => $this->postId,
                    'user_id' => Auth::id(),
                    'content' => $this->content,
                ]);
            } else {
                Comment::create([
                    'post_id' => $this->postId,
                    'name' => $this->name,
                    'email' => $this->email,
                    'content' => $this->content,
                ]);
            }

            $this->reset(['content', 'name', 'email']);
            $this->resetPage();
            session()->flash('success', 'Komentar berhasil ditambahkan!');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan komentar. Silakan coba lagi.');
        }
    }

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function render()
    {
        // Ensure we're using the correct postId
        $comments = Comment::where('post_id', $this->postId)
            ->with(['user' => function($query) {
                $query->select('id', 'name');
            }])
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);
    
        return view('livewire.comments', [
            'comments' => $comments,
            'totalComments' => Comment::where('post_id', $this->postId)->count(),
            'currentPostId' => $this->postId // Add this for debugging
        ]);
    }

    // Add method to handle postId updates
    public function updatedPostId($value)
    {
        $this->resetPage();
    }
}