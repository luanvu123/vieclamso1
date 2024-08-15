<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'city_id',
        'type_consulting_id',
        'consulting_text',
        'status'
    ];

    protected $casts = [
        'status' => 'string',
    ];

    // Enum constants
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    // Define relationships
    public function city()
    {
        return $this->belongsTo(City::class);
    }

  public function typeConsultation()
    {
        return $this->belongsTo(TypeConsultation::class, 'type_consulting_id');
    }
}

