<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'views',
        'author_id',
        'category_id',
        'status',
        'feedback',
        'is_featured',
        'thumbnail',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::deleting(function ($post) {
            // Menghapus gambar yang ada di thumbnail
            if ($post->thumbnail && Storage::disk('public')->exists($post->thumbnail)) {
                Storage::disk('public')->delete($post->thumbnail);
            }
        });

        static::updating(function ($model) {
            // Menghapus gambar lama jika ada gambar baru pada thumbnail
            if ($model->isDirty('thumbnail') && ($model->getOriginal('thumbnail') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('thumbnail'));
            }
        });

        static::saving(function ($post) {
            // Membuat slug secara otomatis jika belum ada
            if (empty($post->slug) || $post->isDirty('title')) {
                $post->slug = Str::slug($post->title);
            }
        });

        static::creating(function ($post) {
            // Mengatur author_id berdasarkan ID pengguna yang sedang login
            $post->author_id = Auth::id();
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
