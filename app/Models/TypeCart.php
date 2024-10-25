<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCart extends Model
{
    protected $fillable = ['name', 'status','detail'];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'type_cart_id');
    }
}
