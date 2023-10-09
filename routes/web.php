<?php

use App\Http\Controllers\HomeController;
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
Route::get('login', [\App\Http\Controllers\FoodsController::class, "login"]);


// sort price

Route::get('/',[\App\Http\Controllers\ProductFilterController::class,'all_products'])->name('all.products');
Route::get('/search-product',[\App\Http\Controllers\ProductFilterController::class,'search_products'])->name('search.products');
Route::get('/sort-by',[\App\Http\Controllers\ProductFilterController::class,'sort_by'])->name('sort.by');



Route::get('/sort', [\App\Http\Controllers\HomeController::class, 'sort']);
Route::post('/filter-products', [\App\Http\Controllers\HomeController::class, 'filterProducts']);


Route::get('/category', [\App\Http\Controllers\HomeController::class,"categoryShop"]);
Route::get('/category/{category:slug}', [\App\Http\Controllers\HomeController::class,"category"]);


