<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductCreateRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Http\Resources\Products\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        return ProductsResource::collection(Product::orderByDesc('created_at')->get())->all();
    }

    public function store(ProductCreateRequest $request)
    {
        $image = $request->file('image')->store('images');
        $data = Product::query()->create([
            'title' => $request->title,
            'models_count'=> $request->models_count,
            'category_id' => $request->category_id,
            'image' => $image
        ]);

        return response()->json(new ProductsResource($data), 201);
    }

    public function update(Product $product, ProductUpdateRequest $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(new ProductsResource($product));
        }
        if ($request->hasFile('image')) {
            File::delete($product->image);
            $image = $request->file('image')->store('images');
        } else $image = $product->image;

        $product->update([
            'title' => $request->title,
            'models_count' => $request->models_count,
            'category_id' => $request->category_id,
            'image' => $image
        ]);
        return response()->json(new ProductsResource($product), 201);
    }

    public function destroy(Product $product)
    {
        $destination = public_path($product->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $product->delete();
        return response()->json(['result' => 'Deleted successfully !'], 200);
    }
}
