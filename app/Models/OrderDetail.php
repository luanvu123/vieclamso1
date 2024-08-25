<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    protected $fillable = ['order_id', 'cart_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
