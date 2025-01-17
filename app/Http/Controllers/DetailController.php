<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class DetailController extends Controller
{
    public function detailPost(Request $request) {
        
        $allPosts = Post::where('status', 'published')
                    ->inRandomOrder()
                    ->take(3)
                    ->get();

        $post = Post::with('author')->where('slug', $request->slug)->first();

        $post->increment('views');  

        $authorPost = Post::where('author_id', $post->author_id)
                        ->where('status', 'published')
                        ->inRandomOrder()
                        ->take(5)
                        ->get();
                        
        $categories = Category::all();

        return view('details', compact('post','categories', 'authorPost', 'allPosts'));
    }
}