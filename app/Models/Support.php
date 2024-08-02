<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $table = 'support';
    protected $fillable = ['phone', 'email', 'type_support_id', 'description', 'status'];

    public function typeSupport()
    {
        return $this->belongsTo(TypeSupport::class);
    }
}

