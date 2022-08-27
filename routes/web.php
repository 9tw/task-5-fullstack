<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\articles;
use App\Http\Controllers\categories;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::resource('article', App\Http\Controllers\articleController::class)->middleware('auth');
Route::resource('category', App\Http\Controllers\categoryController::class)->middleware('auth');
// Route::get('/artikel', [App\Http\Controllers\articleController::class, 'index'])->middleware('auth')->name('article');
//Route::get('/kategori', [App\Http\Controllers\categoryController::class, 'index'])->middleware('auth')->name('category');