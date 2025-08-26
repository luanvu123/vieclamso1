<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'genre_post_id',
        'title',
        'detail',
        'content', // Thêm cột content
        'website',
        'status',
        'featured',
        'image'
    ];

    protected $casts = [
        'status' => 'boolean',
        'featured' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genrePost()
    {
        return $this->belongsTo(GenrePost::class);
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    // Scope for published posts
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

    // Scope for featured posts
    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }
}
