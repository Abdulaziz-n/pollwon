<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Banner;
use App\Http\Resources\Banner\BannerResource;
use App\Http\Requests\Banner\BannerRequest;

class BannerController extends Controller
{
    public function index()
    {
        return BannerResource::collection(Banner::take(2)->get())->all();
    }

    public function update(Banner $banner, BannerRequest $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(new BannerResource($banner));
        }
        if ($request->hasFile('image')) {
            File::delete($banner->image);
            $image = $request->file('image')->store('images');
        } else $image = $banner->image;

        $banner->update([
            'title' => $request->title,
            'image' => $image
        ]);
        return response()->json(new BannerResource($banner), 201);
    }

}
