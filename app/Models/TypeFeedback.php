<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeFeedback extends Model
{
    use HasFactory;
       protected $table = 'type_feedback';

    protected $fillable = ['name'];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
