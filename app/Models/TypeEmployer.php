<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEmployer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'top_point',
        'image',
        'status',
    ];

    // Define the relationship with Employer
    public function employers()
    {
        return $this->hasMany(Employer::class);
    }

    // Enum for status
    public function getStatusOptions()
    {
        return [
            'active' => 'Active',
            'inactive' => 'Inactive',
        ];
    }
}
