<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'name', 'email', 'content', 'parent_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderBy('created_at', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Helper method untuk mendapatkan nama parent comment
    public function getParentName()
    {
        if ($this->parent) {
            return $this->parent->user ? $this->parent->user->name : $this->parent->name;
        }
        return null;
    }
}
