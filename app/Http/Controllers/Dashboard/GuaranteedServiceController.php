<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuaranteedService\GuaranteedServiceRequest;
use App\Http\Resources\GuaranteedService\GuaranteedServiceResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\GuaranteedService;

class GuaranteedServiceController extends Controller
{
//    public function index()
//    {
//        return CategoryResource::collection(GuaranteedService::all())->all();
//    }

//    public function store(CategoryCreateRequest $request)
//    {
//        $image = $request->file('image')->store('images');
//
//        $data = GuaranteedService::create([
//            'title' => $request->title,
//            'image' => $image
//        ]);
//
//        return response()->json(new CategoryResource($data), 201);
//    }

    public function update(GuaranteedService $guaranteedService, GuaranteedServiceRequest $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(new GuaranteedServiceResources($guaranteedService));
        }
        if ($request->hasFile('image')) {
            File::delete($guaranteedService->image);
            $image = $request->file('image')->store('images');
        } else $image = $guaranteedService->image;

        $guaranteedService->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => $image
        ]);
        return (new GuaranteedServiceResources($guaranteedService))->response()->setStatusCode(201);
    }

//    public function destroy(GuaranteedService $category)
//    {
//        $destination = public_path($category->image);
//        if (File::exists($destination)) {
//            File::delete($destination);
//        }
//        $category->delete();
//        return response()->json(['result' => 'Deleted successfully !'], 200);
//    }
}
