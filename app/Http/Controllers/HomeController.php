<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua kategori
        $categories = Category::all();

        // Ambil berita unggulan untuk carousel utama
        $featuredPosts = Post::where('is_featured', true)
            ->where('status', 'published')
            ->latest('created_at')
            ->take(5)
            ->get();

        // Ambil berita terbaru (untuk bagian Up-to-date)
        $latestNews = Post::latest('created_at')
            ->where('status', 'published')
            ->take(3)
            ->get();

        // Ambil berita unggulan kategori tertentu
        $featuredEntertainment = Post::where('category_id', 23)
            ->where('is_featured', true)
            ->latest('created_at')
            ->first();

        $entertainmentNews = Post::where('category_id', 23)
            ->where('id', '!=', optional($featuredEntertainment)->id)
            ->latest('created_at')
            ->take(6)
            ->get();

        // $featuredBusiness = Post::where('category', 'business')
        //     ->latest('created_at')
        //     ->first();

        // $businessNews = Post::where('category', 'business')
        //     ->where('id', '!=', optional($featuredBusiness)->id)
        //     ->latest('created_at')
        //     ->take(6)
        //     ->get();

        // $featuredAutomotive = Post::where('category', 'automotive')
        //     ->latest('created_at')
        //     ->first();

        // $automotiveNews = Post::where('category', 'automotive')
        //     ->where('id', '!=', optional($featuredAutomotive)->id)
        //     ->latest('created_at')
        //     ->take(6)
        //     ->get();

        //Ambil penulis terbaik
        $bestAuthors = User::role('author')
            ->withCount('posts')
            ->orderBy('posts_count', 'desc') // Urutkan berdasarkan jumlah posting
            ->take(6) // Batasi ke 6 pengguna terbaik
            ->get();
            // dd($bestAuthors);
        return view('index', compact(
            'categories',
            'featuredPosts',
            'latestNews',
            'featuredEntertainment',
            'entertainmentNews',
            // 'featuredBusiness',
            // 'businessNews',
            // 'featuredAutomotive',
            // 'automotiveNews',
            'bestAuthors'
        ));
    }
}
