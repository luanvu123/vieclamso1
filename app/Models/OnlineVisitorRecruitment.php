<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineVisitorRecruitment extends Model
{
    protected $table = 'online_visitors_recruitment';

    protected $fillable = ['ip_address', 'last_activity'];
}
