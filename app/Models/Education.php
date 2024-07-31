<?php

// app/Models/Education.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon; // Import Carbon nếu cần sử dụng trực tiếp

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'institution',
        'degree',
        'description',
        'start_date',
        'end_date',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}

