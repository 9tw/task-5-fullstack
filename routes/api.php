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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function(){
    Route::post('login', 'App\Http\Controllers\AuthController@login')->name('login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('user', 'App\Http\Controllers\AuthController@user');

        Route::get('getall', 'App\Http\Controllers\articleController@apindex');
        Route::get('getarticle', 'App\Http\Controllers\articleController@show');

        Route::post('tambaharticle', 'App\Http\Controllers\articleController@api_store')->name('article.store');
        Route::post('tambahcategory', 'App\Http\Controllers\categoryController@api_store')->name('category.store');

        Route::post('ubaharticle', 'App\Http\Controllers\articleController@api_update');
        Route::post('ubahcategory', 'App\Http\Controllers\categoryController@api_update');

        Route::post('hapusarticle', 'App\Http\Controllers\articleController@delete');
        Route::post('hapuscategory', 'App\Http\Controllers\categoryController@delete');
    });
});