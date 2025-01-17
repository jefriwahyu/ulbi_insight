<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class AllPostsController extends Controller
{
    public function allPosts() {

        $allPosts = Post::latest()
            ->paginate(6);
        
        // Ambil semua kategori
        $categories = Category::all();

        return view('allposts', compact('allPosts', 'categories'));
    }
}
