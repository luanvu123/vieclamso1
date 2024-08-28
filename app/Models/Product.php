<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'company',
        'number_day',
        'top_point',
        'image',
        'description',
        'condition',
        'usage_count',
        'type_product',
        'status',
    ];

    /**
     * Get the user that owns the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get the full path of the product's image.
     */
    public function getImagePathAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
