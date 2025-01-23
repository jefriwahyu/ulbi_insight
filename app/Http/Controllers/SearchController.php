<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class SearchController extends Controller
{
    public function searchPost(Request $request) {
        $validateData = request()->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $validateData['query'];

        $searchPost = Post::where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->latest()
            ->paginate(6);
        
        // Ambil semua kategori yang statusnya active
        $categories = Category::where('status', 'active')
            ->get();

        return view('search', compact('searchPost', 'query', 'categories'));
    }
}
