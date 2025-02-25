<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Comments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $postId;
    public $content;
    public $name;
    public $email;
    public $perPage = 5;
    public $replyTo = null;
    public $replyContent;
    public $replyingToName = null; // Untuk menyimpan nama yang direply

    protected array $forbiddenWords = ['anjay', 'kasar', 'kasar2', 'goblok'];

    protected $queryString = ['postId'];

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->resetPage();

        // Ambil nama & email visitor dari session jika ada
        $this->name = Session::get('visitor_name', '');
        $this->email = Session::get('visitor_email', '');
    }

    protected function rules()
    {
        return [
            'content' => 'required|min:3|max:500',
            'name' => Auth::check() ? 'nullable' : 'required|string|max:255|min:3',
            'email' => 'nullable|email|max:255',
            'replyContent' => 'required|min:3|max:500',
        ];
    }

    public function submitComment()
    {
        $this->validate([
            'content' => 'required|min:3|max:500',
            'name' => Auth::check() ? 'nullable' : 'required|string|max:255|min:3',
            'email' => 'nullable|email|max:255',
        ]);

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
                Session::put('visitor_name', $this->name);
                Session::put('visitor_email', $this->email);

                Comment::create([
                    'post_id' => $this->postId,
                    'name' => $this->name,
                    'email' => $this->email,
                    'content' => $this->content,
                ]);
            }

            $this->reset(['content']);
            $this->resetPage();
            session()->flash('success', 'Komentar berhasil ditambahkan!');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan komentar. Silakan coba lagi.');
        }
    }

    public function setReplyTo($commentId, $name)
    {
        $this->replyTo = $commentId;
        $this->replyingToName = $name;
        $this->replyContent = ''; // Reset reply content
    }

    public function cancelReply()
    {
        $this->reset(['replyTo', 'replyContent', 'replyingToName']);
    }

    public function updated($propertyName)
    {
        // Simpan Nama & Email di session setiap kali diupdate
        if ($propertyName === 'name') {
            Session::put('visitor_name', $this->name);
        }

        if ($propertyName === 'email') {
            Session::put('visitor_email', $this->email);
        }
    }

    public function submitReply($parentId)
    {
        $this->validate([
            'replyContent' => 'required|min:3|max:500',
            'name' => Auth::check() ? 'nullable' : 'required|string|max:255|min:3',
            'email' => 'nullable|email|max:255',
        ]);

        $content = strtolower($this->replyContent);
        foreach ($this->forbiddenWords as $word) {
            if (preg_match('/' . preg_quote($word, '/') . '/i', $content)) {
                session()->flash('error', 'Balasan Anda mengandung kata yang tidak diperbolehkan.');
                return;
            }
        }

        try {
            if (Auth::check()) {
                Comment::create([
                    'post_id' => $this->postId,
                    'user_id' => Auth::id(),
                    'content' => $this->replyContent,
                    'parent_id' => $parentId,
                ]);
            } else {
                // Simpan Nama & Email di session agar tetap tersimpan untuk input berikutnya
                Session::put('visitor_name', $this->name);
                Session::put('visitor_email', $this->email);

                Comment::create([
                    'post_id' => $this->postId,
                    'name' => $this->name,
                    'email' => $this->email,
                    'content' => $this->replyContent,
                    'parent_id' => $parentId,
                ]);
            }

            $this->reset(['replyContent', 'replyTo', 'replyingToName']);
            session()->flash('success', 'Balasan berhasil ditambahkan!');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan balasan. Silakan coba lagi.');
        }
    }

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function render()
    {
        // Ambil komentar utama (tanpa parent)
        $comments = Comment::where('post_id', $this->postId)
            ->whereNull('parent_id')
            ->with(['user', 'user.roles', 'replies' => function ($query) {
                $query->with('user', 'user.roles')->orderBy('created_at', 'asc');
            }])
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.comments', [
            'comments' => $comments,
            'totalComments' => Comment::where('post_id', $this->postId)->count(),
            'currentPostId' => $this->postId
        ]);
    }

    public function updatedPostId($value)
    {
        $this->resetPage();
    }
}
