<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'support_id',
        'user_id',
        'to',
        'subject',
        'message',
        'attachment',
    ];

    public function support()
    {
        return $this->belongsTo(Support::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
