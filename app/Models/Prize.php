<?php

// app/Models/Prize.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'title',
        'organization',
        'date_awarded',
        'description',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
