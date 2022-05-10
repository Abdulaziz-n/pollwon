<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\BannerController;

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

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

//////////////////
//              //
//  Dashboard   //
//              //
//////////////////

Route::group([
   'middleware' => 'api',
   'prefix' => 'dashboard'

], function(){

    //Slider
    Route::group([
        'prefix' => 'slider'
    ], function(){

        Route::get('', [SliderController::class, 'index' ]);
        Route::post('create', [SliderController::class, 'store' ]);
        Route::get('update/{slider}', [SliderController::class, 'update' ]);
        Route::post('update/{slider}', [SliderController::class, 'update' ]);
        Route::delete('delete/{slider}', [SliderController::class, 'destroy' ]);

    });
    //Main Banner
    Route::group([
        'prefix' => 'banners'
    ], function(){

        Route::get('', [BannerController::class, 'index' ]);
        Route::get('show/{banner}', [BannerController::class, 'update' ]);
        Route::post('update/{banner}', [BannerController::class, 'update' ]);

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

});
