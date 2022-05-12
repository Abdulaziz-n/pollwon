<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all())->all();
    }

    public function store(CategoryCreateRequest $request)
    {
        $image = $request->file('image')->store('images');
        $data = Category::create([
            'title' => $request->title,
            'image' => $image
        ]);

        return response()->json(new CategoryResource($data), 201);
    }

    public function update(Category $category, CategoryUpdateRequest $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(new CategoryResource($category));
        }
        if ($request->hasFile('image')) {
            File::delete($category->image);
            $image = $request->file('image')->store('images');
        } else $image = $category->image;

        $category->update([
            'title' => $request->title,
            'image' => $image
        ]);
        return response()->json(new CategoryResource($category), 201);
    }

    public function destroy(Category $category)
    {
        $destination = public_path($category->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $category->delete();
        return response()->json(['result' => 'Deleted successfully !'], 200);
    }
}
