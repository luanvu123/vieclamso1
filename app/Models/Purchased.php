<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchased extends Model
{
     protected $table = 'purchased';
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'product_id',
        'status',
    ];

    /**
     * Get the employer that made the purchase.
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Get the product that was purchased.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
