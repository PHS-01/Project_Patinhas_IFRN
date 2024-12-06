<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'age',
        'breed',
        'description',
        'health_status',
        'size',
        'gender',
        'available_for_adoption',
    ];
}
