<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getTitleAttribute()
    {
        return (object)json_decode($this->attributes['title']);
    }

    public function getDescriptionAttribute()
    {
        return (object)json_decode($this->attributes['description']);
    }


}

