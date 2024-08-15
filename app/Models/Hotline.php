<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotline extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_hotline_id',
        'phone_number',
        'contact_name',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function typeHotline()
    {
        return $this->belongsTo(TypeHotline::class);
    }
}
