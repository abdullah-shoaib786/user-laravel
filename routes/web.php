<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
Route::group(['middleware'=>'web'],function (){
   Route:: get('home',[ProductController::class,'getAllProducts']);
    Route::get('addProduct',[UserController::class,'getId']);
    Route::get('product', [ProductController::class, 'showProduct']);
});

Route::get('login', function () {
    return view('login');
});

Route::post('login',[UserController::class,'userLogin']);
Route::view('signup','signup');
Route::post('signup',[UserController::class,'save']);
Route::get('logout',[UserController::class,'logout']);
Route::get('editProduct/{id}',[ProductController::class,'getProductValue']);

Route::get('deleteProduct/{id}',[ProductController::class,'deleteProduct']);

Route::post('/updateProduct',[ProductController::class,'updateProductData']);

Route::post('product',[ProductController::class,'saveProduct']);

Route::get('productDetail/{id}',[ProductController::class,'productDetail']);

Route::get('searchProduct',[ProductController::class,'searchProduct']);

Route::post('/addToCart',[ProductController::class,'addToCart']);

Route::get('/cartList',[ProductController::class,'getCartList']);

Route::get('removeToCart/{id}',[ProductController::class,'removeToCart']);

Route::get('orderNow',[ProductController::class,'orderNow']);

Route::post('/orderPlace',[ProductController::class,'orderPlace']);

Route::get('/orderList',[ProductController::class,'getOrderList']);
