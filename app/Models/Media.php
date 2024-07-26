<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias'; // Ensure this matches your table name

    protected $fillable = [
        'user_id',
        'image',
        'website',
        'status',
    ];

   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
