<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/home',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);
Route::get('/add_product_view',[AdminController::class,'addview']);
Route::post('/upload_product',[AdminController::class,'upload']);
Route::get('/add_blog_view',[AdminController::class,'blogview']);
Route::post('/upload_blog',[AdminController::class,'uploadblog']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);
Route::get('/add_category_view',[AdminController::class,'addcategory']);
Route::post('/insert-category',[AdminController::class,'insert_category']);
Route::get('/categories',[AdminController::class,'categories']);
Route::get('/edit-category/{id}',[AdminController::class,'edit']);
Route::put('/update-categories/{id}',[AdminController::class,'update']);
Route::get('/delete-categories/{id}',[AdminController::class,'delete']);
Route::get('/product_view',[AdminController::class,'product_view']);
Route::get('/edit-product/{id}',[AdminController::class,'editproduct']);
Route::put('/update-product/{id}',[AdminController::class,'updateproduct']);
Route::get('/delete-product/{id}',[AdminController::class,'deleteproduct']);
Route::get('/category',[HomeController::class,'category']);
Route::get('/view_category/{slug}',[HomeController::class,'viewcategory']);
Route::get('/details/{category_slug}/{item_slug}',[HomeController::class,'pdetails']);
Route::get('/showappointment',[AdminController::class,'showappointment']);
Route::get('/addtocart',[HomeController::class,'addtocart']);
Route::get('/ordernow',[HomeController::class,'ordernow']);
