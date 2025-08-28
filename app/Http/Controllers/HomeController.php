<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        // Ambil semua kategori
        $categories = Category::where('status', 'active')
            ->get();

        // Ambil berita unggulan untuk carousel utama
        $featuredPosts = Post::where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->where('is_featured', true)
            ->latest('created_at')
            ->take(5)
            ->get();

        // Ambil berita terbaru (untuk bagian Up-to-date)
        $latestPost = Post::where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->latest('created_at')
            ->take(3)
            ->get();

        $mostViewPost = Post::where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->orderBy('views', 'desc')->first(); 

        // Ambil berita dengan views tertinggi kedua dan seterusnya
        $viewPost = Post::where('status', 'published')
            ->whereHas('category', function ($query) {
                $query->where('status', 'active');
            })
            ->orderBy('views', 'desc')  
            ->skip(1)
            ->take(10)  
            ->get(); 

        //Ambil penulis terbaik
        $bestAuthors = User::role('author')
            ->withCount('posts')
            ->having('posts_count', '>', 0)
            ->orderBy('posts_count', 'desc') // Urutkan berdasarkan jumlah posting
            ->take(3) // Batasi ke 3 pengguna terbaik
            ->get();
            // dd($bestAuthors);

        return view('home', compact(
            'categories',
            'featuredPosts',
            'latestPost',
            'mostViewPost',
            'viewPost',
            'bestAuthors'
        ));
    }
}
