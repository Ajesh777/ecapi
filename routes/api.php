<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 1.1 Example of normal Routes:
    //Route::Resource('/products', 'ProductController');

// 1.2 Create the Product Api Routes:
    Route::apiResource('/products', 'ProductController');

// 1.3 Create Group Route for Product Review:
    Route::group(['prefix'=>'products'], function(){
        // 1.3.1 Create the Review Api Routes:
            Route::apiResource('/{product}/reviews', 'ReviewController');
    });