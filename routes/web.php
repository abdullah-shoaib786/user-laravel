<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::view('signup','signup');
//Route::view('login','login');
Route::post('signup',[UserController::class,'save']);
Route::post('login',[UserController::class,'userLogin']);
Route::post('upload',[UserController::class,'uploadFile']);

Route::get('/upload', function () {
    if(session()->has('email')){
        return view('profile');
    }
    return redirect('login');
});

Route::get('/home', function () {
    if(session()->has('email')){
        return view('home');
    }
    return redirect('login');
});


Route::get('/profile', function () {
    if(session()->has('email')){
        return view('profile');
    }
    return redirect('login');
});


Route::get('/home', function () {
    if(session()->has('email')){
        return view('home');
    }
    return redirect('login');
});

Route::get('/login', function () {
    if(session()->has('email')){
        return redirect('home');
    }
    return view('login');
});

Route::get('/logout', function () {
    if(session()->has('email')){
        session()->pull('email');
    }
    return redirect('login');
});

