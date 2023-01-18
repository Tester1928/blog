<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin;
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

Auth::routes();

Route::get('/', [Controllers\MainController::class,"index"])->name("main");
Route::get('/collection', [Controllers\CollectionController::class,"index"])->name("collection");
Route::get('/about', [Controllers\AboutController::class,"index"])->name("about");
Route::get('/services', [Controllers\ServiceController::class,"index"])->name("services");
Route::get('/blog', [Controllers\BlogController::class,"index"])->name("blog");
Route::get('/blog/detail', [Controllers\BlogController::class,"index"])->name("blog_detail");
Route::get('/contact', [Controllers\ContactController::class,"index"])->name("contact");

Route::middleware('auth')->group(function() {
    Route::get('/admin', [Admin\AdminController::class,"index"])->name("admin.index");
    Route::get('/admin/profile', [Admin\ProfileController::class,"index"])->name("admin.profile");
});
