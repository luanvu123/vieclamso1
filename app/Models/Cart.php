<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'plan_currency_id', 'value', 'description', 'status','top_point'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function planCurrency()
    {
        return $this->belongsTo(PlanCurrency::class, 'plan_currency_id');
    }

    public function planFeatures()
    {
        return $this->belongsToMany(PlanFeature::class, 'cart_plan_feature');
    }
}
