<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Dashboard\SliderResourse;
use App\Http\Resources\Settings\SettingResource;
use App\Http\Resources\Site\SiteResource;
use App\Models\AboutUs;
use App\Models\AboutUsPicture;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Resources\Products\ProductsResource;
use App\Http\Resources\Banner\BannerResource;
use App\Http\Resources\AboutUs\AboutUsResource;
use App\Http\Resources\AboutUsPicture\AboutUsPictureResource;

class SiteController extends Controller
{
    public function index()
    {
        $slider = Slider::orderBy('created_at', 'DESC')->get();
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $products = Product::orderBy('created_at', 'DESC')->get();
        $banners = Banner::orderBy('created_at', 'DESC')->get();
        $about_pictures = AboutUsPicture::orderBy('created_at', 'DESC')->get();
        $about_us = AboutUs::orderBy('created_at', 'DESC')->get();
        $settings = Setting::all();

        return [
            'slider' => SliderResourse::collection($slider)->all(),
            'categories' => CategoryResource::collection($categories)->all(),
            'products' => ProductsResource::collection($products)->all(),
            'banner' => BannerResource::collection($banners)->all(),
            'about_us_pictures' => AboutUsPictureResource::collection($about_pictures)->all(),
            'about_us' => AboutUsResource::collection($about_us)->all(),
            'settings' => SettingResource::collection($settings)->all(),
        ];
    }
}
