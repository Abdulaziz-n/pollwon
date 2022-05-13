<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\SliderResourse;
use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'DESC')->get();

        return SliderResourse::collection($sliders)->all();
    }
}
