<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
        protected $table = 'sliders';

    protected $fillable = ['status', 'link', 'image', 'user_id'];

    // Define any relationships if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
