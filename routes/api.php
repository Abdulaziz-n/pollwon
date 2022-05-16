<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\AboutUsPictureController;
use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Site\SlidersController;
use App\Http\Controllers\Site\ProductsController;
use App\Http\Controllers\Site\CategoriesController;
use App\Http\Controllers\Site\BannersController;
use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Dashboard\SettingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

//////////////////
//              //
//  Dashboard   //
//              //
//////////////////

Route::group([
   'middleware' => 'auth',
   'prefix' => 'dashboard'

], function(){

    //Slider
    Route::group([
        'prefix' => 'slider'
    ], function(){

        Route::get('', [SliderController::class, 'index' ]);
        Route::post('create', [SliderController::class, 'store' ]);
        Route::get('show/{slider}', [SliderController::class, 'update' ]);
        Route::post('update/{slider}', [SliderController::class, 'update' ]);
        Route::delete('delete/{slider}', [SliderController::class, 'destroy' ]);

    });

    //Products
    Route::group([
        'prefix' => 'products'
    ], function(){

        Route::get('', [ProductController::class, 'index' ]);
        Route::post('create', [ProductController::class, 'store' ]);
        Route::get('show/{product}', [ProductController::class, 'update' ]);
        Route::post('update/{product}', [ProductController::class, 'update' ]);
        Route::delete('delete/{product}', [ProductController::class, 'destroy' ]);

    });

    //Category
    Route::group([
        'prefix' => 'category'
    ], function(){

        Route::get('', [CategoryController::class, 'index' ]);
        Route::post('create', [CategoryController::class, 'store' ]);
        Route::get('show/{category}', [CategoryController::class, 'update' ]);
        Route::post('update/{category}', [CategoryController::class, 'update' ]);
        Route::delete('delete/{category}', [CategoryController::class, 'destroy' ]);

    });

    //Main Banner
    Route::group([
        'prefix' => 'banners'
    ], function(){

        Route::get('', [BannerController::class, 'index' ]);
        Route::get('show/{banner}', [BannerController::class, 'update' ]);
        Route::post('update/{banner}', [BannerController::class, 'update' ]);

    });

    //About Us
    Route::group([
        'prefix' => 'about-us'
    ], function(){

        Route::get('', [AboutUsController::class, 'index' ]);
        Route::post('create', [AboutUsController::class, 'store' ]);
        Route::get('show/{about}', [AboutUsController::class, 'update' ]);
        Route::post('update/{about}', [AboutUsController::class, 'update' ]);
        Route::delete('delete/{about}', [AboutUsController::class, 'destroy' ]);

    });

    //About Us pictures only
    Route::group([
        'prefix' => 'about-us-pictures'
    ], function(){

        Route::get('', [AboutUsPictureController::class, 'index' ]);
        Route::get('show/{picture}', [AboutUsPictureController::class, 'update' ]);
        Route::post('update/{picture}', [AboutUsPictureController::class, 'update' ]);

    });

    //Settings
    Route::group([
        'prefix' => 'settings'
    ], function(){

        Route::get('', [SettingController::class, 'index' ]);
        Route::get('show/{setting}', [SettingController::class, 'update' ]);
        Route::post('update/{setting}', [SettingController::class, 'update' ]);

    });

    //Feedback
    Route::group([
        'prefix' => 'feedback'

    ], function(){

        Route::get('', [FeedbackController::class, 'index']);
    });

});

//////////////////
//              //
//  Site        //
//              //
//////////////////


Route::group([
   'prefix' => 'site'
], function(){

    //Feedback
   Route::post('feedback/send', [FeedbackController::class, 'store']);

   //Slider
   Route::get('sliders', [SlidersController::class, 'index']);

   //Products
   Route::get('products', [ProductsController::class, 'index']);

   //Category
   Route::get('category', [CategoriesController::class, 'index']);

   //Banners
   Route::get('banners', [BannersController::class, 'index']);

   //About Us
   Route::get('about/us', [AboutController::class, 'index']);

    //About Us Pictures
   Route::get('about/pictures', [AboutController::class, 'pictures']);

   //Site
    Route::get('index', [SiteController::class, 'index']);
});
