<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';

    protected $fillable = ['type_feedback_id', 'content', 'phone', 'email', 'satisfaction','status'];

    public function typeFeedback()
    {
        return $this->belongsTo(TypeFeedback::class);
    }
}
