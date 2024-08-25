<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanCurrency extends Model
{
    protected $fillable = [
        'currency'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'plan_currency_id');
    }
}
