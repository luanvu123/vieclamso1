<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['employer_id', 'total_amount','vat', 'status'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
