<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartlist extends Model

{
     protected $table = 'cartlist';
    protected $fillable = [
        'employer_id', 'cart_id', 'quantity', 'price', 'status'
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
