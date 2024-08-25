<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    protected $fillable = [
        'feature'
    ];

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_plan_feature');
    }
}
