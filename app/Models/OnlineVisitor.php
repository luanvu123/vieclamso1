<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineVisitor extends Model
{
    protected $fillable = ['ip_address', 'last_activity'];
}
