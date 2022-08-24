<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuaranteedService extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'subtitle' => 'array',
        'image' => 'string'
    ];
}
