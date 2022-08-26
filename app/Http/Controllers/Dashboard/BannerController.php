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
        if ($request->hasFile('image_mobile')) {
            File::delete($banner->image_mobile);
            $image_mobile = $request->file('image_mobile')->store('images');
        } else $image_mobile = $banner->image_mobile;
        if ($request->hasFile('image1')) {
            File::delete($banner->image1);
            $image1 = $request->file('image1')->store('images');
        } else $image1 = $banner->image1;
        if ($request->hasFile('image_mobile1')) {
            File::delete($banner->image_mobile1);
            $image_mobile1 = $request->file('image_mobile1')->store('images');
        } else $image_mobile1 = $banner->image_mobile1;

        $banner->update([
            'title' => $request->title,
            'image' => $image,
            'image_mobile' => $image_mobile,
            'image1' => $image1,
            'image_mobile1' => $image_mobile1
        ]);
        return new BannerResource($banner);
    }

}
