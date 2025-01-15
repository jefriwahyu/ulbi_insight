<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FilterCategoryController extends Controller
{
    public function categoryPost(Request $request)
    {  
        $category = Category::where('slug', $request->slug)->firstOrFail();
        
        $postsByCategory = Post::with('category')
            ->where('category_id', $category->id)
            ->where('status', 'published')
            ->latest()
            ->paginate(6);
        
        $categories = Category::all();

        return view('category', compact('postsByCategory', 'category', 'categories'));
    }
}