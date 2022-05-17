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
            $image = $request->file('image')->store('images');
        } else {
            $image = $picture->image;
        }
        $picture->update([
            'position' => $request->position,
            'image' => $image,
        ]);
        return response()->json(new AboutUsPictureResource($picture), 201);
    }
}
