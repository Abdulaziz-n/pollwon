<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Slider\SliderCreateRequest;
use App\Http\Requests\Slider\SliderUpdateRequest;
use App\Http\Resources\Dashboard\SliderResourse;

class SliderController extends Controller
{
    public function index()
    {
        return SliderResourse::collection(Slider::all())->all();
    }

    public function store(SliderCreateRequest $request)
    {
        $image = $request->file('image')->store('images');
        $data = Slider::create([
            'title' => $request->title,
            'model' => $request->model,
            'horizontal' => $request->horizontal,
            'image' => $image
        ]);

        return response()->json(new SliderResourse($data), 201);
    }

    public function update(Slider $slider, SliderUpdateRequest $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(new SliderResourse($slider));
        }
        if ($request->hasFile('image')) {
            File::delete($slider->image);
            $image = $request->file('image')->store('images');
        } else $image = $slider->image;

        $slider->update([
            'title' => $request->title,
            'model' => $request->model,
            'horizontal' => $request->horizontal,
            'image' => $image
        ]);
        return response()->json(new SliderResourse($slider), 201);
    }

    public function destroy(Slider $slider)
    {
        $destination = public_path($slider->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $slider->delete();
        return response()->json(['result' => 'Deleted successfully !'], 200);
    }
}
