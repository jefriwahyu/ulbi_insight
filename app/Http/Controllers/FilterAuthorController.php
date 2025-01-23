<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FilterAuthorController extends Controller
{
    public function authorPost(Request $request)
    {
        $author = User::where('name', $request->name)->firstOrFail();
        
        $authorName = $request->name;

        $postsByAuthor = Post::with('author')
            ->where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->where('author_id', $author->id)
            ->latest()
            ->paginate(6);
        
        // Ambil semua kategori yang statusnya active
        $categories = Category::where('status', 'active')
            ->get();

        return view('author', compact('postsByAuthor', 'author', 'categories', 'authorName'));
    }
}
