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
        
        $postsByAuthor = Post::with('author')
            ->where('author_id', $author->id)
            ->where('status', 'published')
            ->latest()
            ->paginate(1);
        
        $categories = Category::all();

        return view('author', compact('postsByAuthor', 'author', 'categories'));
    }
}
