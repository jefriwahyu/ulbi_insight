<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CommentController extends Controller
{
    // Daftar kata kasar yang dilarang (tambahkan sesuai kebutuhan)
    protected array $forbiddenWords = ['anjay', 'kasar', 'kasar2', 'goblok'];

    public function store(Request $request)
    {
        // Pastikan post_id berasal dari form, bukan dari URL
        $postId = $request->input('post_id');
    
        // Validasi input
        $request->validate([
            'content' => 'required|min:3|max:500',
            'name' => 'nullable|string|max:255|min:3',
            'email' => 'nullable|email|max:255',
            'post_id' => 'required|exists:posts,id', // Pastikan post_id valid
        ]);
    
        // Cek kata kasar
        $forbiddenWords = ['anjay', 'kasar', 'goblok'];
        $content = strtolower($request->input('content'));
        foreach ($forbiddenWords as $word) {
            if (preg_match('/' . preg_quote($word, '/') . '/i', $content)) {
                return back()->with('error', 'Komentar Anda mengandung kata yang tidak diperbolehkan.');
            }
        }
    
        // Simpan komentar berdasarkan user login atau visitor
        if (Auth::check()) {
            Comment::create([
                'post_id' => $postId, // Menggunakan post_id dari form
                'user_id' => Auth::id(),
                'content' => $request->input('content'),
            ]);
        } else {
            Comment::create([
                'post_id' => $postId, // Menggunakan post_id dari form
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'content' => $request->input('content'),
            ]);
        }
    
        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
    
}
