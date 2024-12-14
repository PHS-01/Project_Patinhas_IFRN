<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adoption extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'adoption_date',
        'status'
    ];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Pet
     */
    public function Pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
