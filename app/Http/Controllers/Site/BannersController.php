<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\Banner\BannerResource;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function index()
    {
        $banners = Banner::take(2)->get();

        return BannerResource::collection($banners)->all();
    }
}
