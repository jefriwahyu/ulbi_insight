<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class DetailController extends Controller
{
    public function detailPost(Request $request)
    {

        $allPosts = Post::where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->inRandomOrder()
            ->take(3)
            ->get();

        $post = Post::with('author')
            ->where('slug', $request->slug)
            ->first();

        $post->increment('views');

        $authorPost = Post::where('author_id', $post->author_id)
            ->where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->inRandomOrder()
            ->take(5)
            ->get();

        // Ambil semua kategori yang statusnya active
        $categories = Category::where('status', 'active')
            ->get();

        return view('details', compact('post', 'categories', 'authorPost', 'allPosts'));
    }
}
