<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group([
    "prefix" => "v1",
    "namespace" => "Api\V1"
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::middleware(["auth:api"])->group(function () {
        Route::post('logout', 'AuthController@logout');
        Route::apiResource('posts', 'PostController');
    });
});




// Route::group([
//     "prefix" => "v2",
//     "namespace" => "Api\V2"
// ], function () {
// });
