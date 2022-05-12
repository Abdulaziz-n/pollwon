<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Resources\AboutUsPicture\AboutUsPictureResource;
use App\Models\AboutUsPicture;
use App\Http\Requests\AboutUsPicture\AboutUsUPictureUpdateRequest;

class AboutUsPictureController extends Controller
{
    public function index()
    {
        return AboutUsPictureResource::collection(AboutUsPicture::take(4)->get())->all();
    }


    public function update(AboutUsPicture $picture, AboutUsUPictureUpdateRequest $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(new AboutUsPictureResource($picture));
        }
        if ($request->hasFile('image')) {
            File::delete($picture->image);
            File::delete($picture->image_mobile);
            $image = $request->file('image')->store('images');
            $image_mobile = $request->file('image_mobile')->store('images');
        } else {
            $image = $picture->image;
            $image_mobile = $picture->image_mobile;
        }
        $picture->update([
            'position' => $request->position,
            'image' => $image,
            'image_mobile' => $image_mobile
        ]);
        return response()->json(new AboutUsPictureResource($picture), 201);
    }
}
