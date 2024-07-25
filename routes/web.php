<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\BlogChickenController;

Route::get('/', function () {
    return view('index');
});
Route::get('/blogs',[BlogChickenController::class,'index']);
Route::get('/blogs/{blogchicken:slug}',[BlogChickenController::class,'show']);

Route::post('/blogs/{blogchicken:slug}/comments', [CommentController::class, 'store']);

Route::get('/register',[AuthController::class,'create']);
Route::post('/register',[AuthController::class,'store']);
Route::post('/logout',[AuthController::class,'logout']);

Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'post_login']);

Route::get('/admin/dashboard', [AdminBlogController::class, 'index']);
Route::get('/admin/blogs/create', [AdminBlogController::class, 'create']);
Route::post('/admin/blogs/store', [AdminBlogController::class, 'store']);