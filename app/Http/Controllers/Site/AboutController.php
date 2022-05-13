<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUs\AboutUsResource;
use App\Http\Resources\AboutUsPicture\AboutUsPictureResource;
use App\Models\AboutUs;
use App\Models\AboutUsPicture;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutUs::orderBy('created_at', 'DESC')->get();

        return AboutUsResource::collection($about)->all();
    }

    public function pictures()
    {
        $pictures = AboutUsPicture::orderBy('created_at', 'DESC')->get();

        return AboutUsPictureResource::collection($pictures)->all();
    }
}
