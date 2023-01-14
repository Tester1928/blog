<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', "HomeController@index")->name("home");
Route::get('/collection', "CollectionController@index")->name("collection");
Route::get('/about', "AboutController@index")->name("about");
Route::get('/services', "ServiceController@index")->name("services");
Route::get('/blog', "BlogController@index")->name("blog");
Route::get('/blog/detail', "BlogController@detail")->name("blog_detail");
Route::get('/contact', "ContactController@index")->name("contact");


Route::get('/posts',"PostController@index")->name("posts");
Route::get('/post/create',"PostController@create")->name("create");
Route::get('/post/update',"PostController@update")->name("update");
Route::get('/post/delete',"PostController@delete")->name("delete");
