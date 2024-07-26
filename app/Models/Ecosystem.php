<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecosystem extends Model
{
    use HasFactory;

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = [
        'user_id',
        'name',
        'detail',
        'website',
        'status',
        'name_link_website',
        'image',
        'image_footer',
    ];

    // Các thuộc tính không thể được gán hàng loạt
    protected $guarded = [];

    // Thiết lập quan hệ với model User nếu cần
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
