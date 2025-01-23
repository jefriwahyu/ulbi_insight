<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FilterCategoryController extends Controller
{
    public function categoryPost(Request $request)
    {  
        $categoryName = $request->slug;
        $category = Category::where('slug', $request->slug)
            ->where('status', 'active')
            ->firstOrFail();

        $postsByCategory = Post::where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->latest('updated_at')
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(6);

        // Ambil semua kategori yang statusnya active
        $categories = Category::where('status', 'active')
            ->get();

        return view('category', compact('postsByCategory', 'category', 'categories', 'categoryName'));
    }
}