<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class AllPostsController extends Controller
{
    public function allPosts() {

        $allPosts = Post::where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->latest()
            ->paginate(6);
        
        // Ambil semua kategori yang statusnya active
        $categories = Category::where('status', 'active')
            ->get();

        return view('allposts', compact('allPosts', 'categories'));
    }
}
