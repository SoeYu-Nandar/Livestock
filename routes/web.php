<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CfoodController;
use App\Http\Controllers\DfoodController;
use App\Http\Controllers\PfoodController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CowfoodController;
use App\Http\Controllers\AdminfaqController;
use App\Http\Controllers\BreedingController;
use App\Http\Controllers\FishfoodController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminFoodController;
use App\Http\Controllers\BlogChickenController;
use App\Http\Controllers\AdminBreedingController;
use App\Http\Controllers\AdminMedicineController;

Route::get('/', [HomeController::class,'index']);
Route::get('/blogs',[BlogChickenController::class,'index']);
Route::get('/blogs/{blogchicken:slug}',[BlogChickenController::class,'show']);

Route::post('/blogs/{blogchicken:slug}/comments', [CommentController::class, 'store']);

Route::get('/faq', [FaqController::class, 'faq_index']);
Route::post('/faq/store', [FaqController::class, 'faq_store']);

Route::get('/chicken_foods',[CfoodController::class,'index']);
Route::get('/chicken_foods/{id}',[CfoodController::class,'show']);

Route::get('/pig_foods',[PfoodController::class,'index']);
Route::get('/pig_foods/{id}',[PfoodController::class,'show']);

Route::get('/duck_foods',[DfoodController::class,'index']);
Route::get('/duck_foods/{id}',[DfoodController::class,'show']);

Route::get('/cow_foods',[CowfoodController::class,'index']);
Route::get('/cow_foods/{id}',[CowfoodController::class,'show']);

Route::get('/fish_foods',[FishfoodController::class,'index']);
Route::get('/fish_foods/{id}',[FishfoodController::class,'show']);

Route::get('/medicines',[MedicineController::class,'index']);

Route::get('/chicken_breedings',[BreedingController::class,'chicken_index']);
Route::get('/pig_breedings',[BreedingController::class,'pig_index']);
Route::get('/fish_breedings',[BreedingController::class,'fish_index']);

Route::post('/add_cart',[CartController::class,'add_cart']);
Route::get('/show_cart',[CartController::class,'show_cart']);
Route::post('/submit_cart',[CartController::class,'submit_cart']);
Route::post('/payment',[CartController::class,'pay']);
Route::delete('/remove_cart/{id}/delete',[CartController::class,'remove_cart']);

Route::get('/register',[AuthController::class,'create']);
Route::post('/register',[AuthController::class,'store']);
Route::post('/logout',[AuthController::class,'logout']);

Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'post_login']);

Route::get('/admin/dashboard', [AdminBlogController::class, 'index']);


Route::get('/admin/blogs/create', [AdminBlogController::class, 'create']);
Route::post('/admin/blogs/store', [AdminBlogController::class, 'store']);
Route::get('/admin/blogs/show', [AdminBlogController::class, 'show']);
Route::get('/admin/blogs/{blogchicken:slug}/edit', [AdminBlogController::class, 'edit']);
Route::patch('/admin/blogs/{blogchicken:slug}/update', [AdminBlogController::class, 'update']);
Route::delete('/admin/blogs/{blogchicken:slug}/delete', [AdminBlogController::class, 'destroy']);

Route::get('/admin/faq', [AdminfaqController::class, 'faq_index']);
Route::get('/admin/faq/{id}/reply', [AdminfaqController::class, 'faq_reply']);
Route::patch('/admin/faq/{id}/update', [AdminfaqController::class, 'faq_update']);

Route::get('/admin/foods/chicken_food/create', [AdminFoodController::class, 'chicken_create']);
Route::get('/admin/foods/chicken_food/show', [AdminFoodController::class, 'chicken_show']);
Route::post('/admin/foods/chicken_food/store', [AdminFoodController::class, 'chicken_store']);
Route::get('/admin/foods/chicken_food/{id}/edit', [AdminFoodController::class, 'chicken_edit']);
Route::patch('/admin/foods/chicken_food/{id}/update', [AdminFoodController::class, 'chicken_update']);
Route::delete('/admin/foods/chicken_food/{id}/delete', [AdminFoodController::class, 'chicken_destroy']);


Route::get('/admin/foods/pig_food/create', [AdminFoodController::class, 'pig_create']);
Route::get('/admin/foods/pig_food/show', [AdminFoodController::class, 'pig_show']);
Route::post('/admin/foods/pig_food/store', [AdminFoodController::class, 'pig_store']);
Route::get('/admin/foods/pig_food/{id}/edit', [AdminFoodController::class, 'pig_edit']);
Route::patch('/admin/foods/pig_food/{id}/update', [AdminFoodController::class, 'pig_update']);
Route::delete('/admin/foods/pig_food/{id}/delete', [AdminFoodController::class, 'pig_destroy']);

Route::get('/admin/foods/duck_food/create', [AdminFoodController::class, 'duck_create']);
Route::get('/admin/foods/duck_food/show', [AdminFoodController::class, 'duck_show']);
Route::post('/admin/foods/duck_food/store', [AdminFoodController::class, 'duck_store']);
Route::get('/admin/foods/duck_food/{id}/edit', [AdminFoodController::class, 'duck_edit']);
Route::patch('/admin/foods/duck_food/{id}/update', [AdminFoodController::class, 'duck_update']);
Route::delete('/admin/foods/duck_food/{id}/delete', [AdminFoodController::class, 'duck_destroy']);

Route::get('/admin/foods/cow_food/create', [AdminFoodController::class, 'cow_create']);
Route::get('/admin/foods/cow_food/show', [AdminFoodController::class, 'cow_show']);
Route::post('/admin/foods/cow_food/store', [AdminFoodController::class, 'cow_store']);
Route::get('/admin/foods/cow_food/{id}/edit', [AdminFoodController::class, 'cow_edit']);
Route::patch('/admin/foods/cow_food/{id}/update', [AdminFoodController::class, 'cow_update']);
Route::delete('/admin/foods/cow_food/{id}/delete', [AdminFoodController::class, 'cow_destroy']);

Route::get('/admin/foods/fish_food/create', [AdminFoodController::class, 'fish_create']);
Route::get('/admin/foods/fish_food/show', [AdminFoodController::class, 'fish_show']);
Route::post('/admin/foods/fish_food/store', [AdminFoodController::class, 'fish_store']);
Route::get('/admin/foods/fish_food/{id}/edit', [AdminFoodController::class, 'fish_edit']);
Route::patch('/admin/foods/fish_food/{id}/update', [AdminFoodController::class, 'fish_update']);
Route::delete('/admin/foods/fish_food/{id}/delete', [AdminFoodController::class, 'fish_destroy']);


Route::get('/admin/medicines/create', [AdminMedicineController::class, 'create']);
Route::get('/admin/medicines/show', [AdminMedicineController::class, 'show']);
Route::post('/admin/medicines/store', [AdminMedicineController::class, 'store']);
Route::get('/admin/medicines/{id}/edit', [AdminMedicineController::class, 'edit']);
Route::patch('/admin/medicines/{id}/update', [AdminMedicineController::class, 'update']);
Route::delete('/admin/medicines/{id}/delete', [AdminMedicineController::class, 'destroy']);

Route::get('/admin/breedings/chicken_breeding/create', [AdminBreedingController::class, 'chicken_create']);
Route::get('/admin/breedings/chicken_breeding/show', [AdminBreedingController::class, 'chicken_show']);
Route::post('/admin/breedings/chicken_breeding/store', [AdminBreedingController::class, 'chicken_store']);
Route::get('/admin/breedings/chicken_breeding/{id}/edit', [AdminBreedingController::class, 'chicken_edit']);
Route::patch('/admin/breedings/chicken_breeding/{id}/update', [AdminBreedingController::class, 'chicken_update']);
Route::delete('/admin/breedings/chicken_breeding/{id}/delete', [AdminBreedingController::class, 'chicken_destroy']);


Route::get('/admin/breedings/pig_breeding/create', [AdminBreedingController::class, 'pig_create']);
Route::get('/admin/breedings/pig_breeding/show', [AdminBreedingController::class, 'pig_show']);
Route::post('/admin/breedings/pig_breeding/store', [AdminBreedingController::class, 'pig_store']);
Route::get('/admin/breedings/pig_breeding/{id}/edit', [AdminBreedingController::class, 'pig_edit']);
Route::patch('/admin/breedings/pig_breeding/{id}/update', [AdminBreedingController::class, 'pig_update']);
Route::delete('/admin/breedings/pig_breeding/{id}/delete', [AdminBreedingController::class, 'pig_destroy']);


Route::get('/admin/breedings/fish_breeding/create', [AdminBreedingController::class, 'fish_create']);
Route::get('/admin/breedings/fish_breeding/show', [AdminBreedingController::class, 'fish_show']);
Route::post('/admin/breedings/fish_breeding/store', [AdminBreedingController::class, 'fish_store']);
Route::get('/admin/breedings/fish_breeding/{id}/edit', [AdminBreedingController::class, 'fish_edit']);
Route::patch('/admin/breedings/fish_breeding/{id}/update', [AdminBreedingController::class, 'fish_update']);
Route::delete('/admin/breedings/fish_breeding/{id}/delete', [AdminBreedingController::class, 'fish_destroy']);

