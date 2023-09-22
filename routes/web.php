<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('index2', [\App\Http\Controllers\PagesController::class, "index2"]);
Route::get('about2', [\App\Http\Controllers\PagesController::class, "about2"]);
Route::get('posts', [\App\Http\Controllers\PostsController::class, "posts"]);

Route::resource('/foods', \App\Http\Controllers\FoodsController::class);
//Route::get('/', [\App\Http\Controllers\FoodsController::class, "index"]);

Route::get('create', [\App\Http\Controllers\FoodsController::class, "create"]);


