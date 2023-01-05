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

Route::get('/', function () {return view('welcome');})->name("home");
Route::get('/posts',"PostContoller@index")->name("posts");
Route::get('/post/create',"PostContoller@create")->name("create");
Route::get('/post/update',"PostContoller@update")->name("update");
Route::get('/post/delete',"PostContoller@delete")->name("delete");
