<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

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
        $latestNews = Post::latest('updated_at')
            ->where('status', 'published')
            ->take(3)
            ->get();

        $mostViewPost = Post::orderBy('views', 'desc')->first(); 

        // Ambil berita dengan views tertinggi kedua dan seterusnya
        $viewPost = Post::orderBy('views', 'desc')  
            ->skip(1)
            ->take(10)  
            ->get(); 

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
            'mostViewPost',
            'viewPost',
            'bestAuthors'
        ));
    }
}
