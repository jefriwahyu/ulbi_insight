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

        $searchNews = Post::where('title', 'like', '%' . $query . '%')
            ->orWhere('body', 'like', '%' . $query . '%')
            ->latest()
            ->paginate(6);
        
        // Ambil semua kategori
        $categories = Category::all();

        return view('search', compact('searchNews', 'query', 'categories'));
    }
}
