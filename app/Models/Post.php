<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'genre_post_id', 'title', 'detail', 'website', 'status', 'featured','image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genrePost()
    {
        return $this->belongsTo(GenrePost::class);
    }
}
