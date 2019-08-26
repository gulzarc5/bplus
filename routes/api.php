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

Route::group(['namespace'=>'Api'],function(){

	Route::get('app/load','CategoryController@appLoaddata');
	Route::get('slider/image/{image}', 'CategoryController@sliderImage');
	Route::get('slider/image/thumb/{image}', 'CategoryController@sliderImageThumb');

	});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
