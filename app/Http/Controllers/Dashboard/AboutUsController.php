<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUs\AboutUsRequest;
use App\Http\Requests\AboutUs\AboutUsUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\AboutUs;
use App\Http\Resources\AboutUs\AboutUsResource;

class AboutUsController extends Controller
{
    public function index()
    {
        return AboutUsResource::collection(AboutUs::all())->all();
    }

    public function store(AboutUsRequest $request)
    {
        $image = $request->file('image')->store('images');
        $data = AboutUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image
        ]);

        return response()->json(new AboutUsResource($data), 201);
    }

    public function update(AboutUs $about, AboutUsUpdateRequest $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(new AboutUsResource($about));
        }
        if ($request->hasFile('image')) {
            File::delete($about->image);
            $image = $request->file('image')->store('images');
        } else $image = $about->image;

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image
        ]);
        return response()->json(new AboutUsResource($about), 201);
    }

    public function destroy(AboutUs $about)
    {
        $destination = public_path($about->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $about->delete();
        return response()->json(['result' => 'Deleted successfully !'], 200);
    }
}
