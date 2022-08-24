<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCentre extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'city' => 'array',
        'address' => 'array',
        'description' => 'array'
    ];
}
