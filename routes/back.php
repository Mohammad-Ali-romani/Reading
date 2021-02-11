<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/// back end
// Route::view('/dashboard', 'back.home')->name('dashboard');
Route::resource('dashboard/category', CategoryController::class);

Route::resource('dashboard/advertisement', AdvertisementController::class);
Route::resource('dashboard/post', PostController::class);
Route::resource('dashboard/home', SettingController::class);
Route::resource('dashboard/comment', CommentController::class);
Route::get('user',[ProfileController::class,'edit']);
Route::get('/dashboard', function () {
    return view('back.home');
})->name('dashboard');
// Route::get('/register', [RegisteredUserController::class, 'create'])
//                 ->name('register');

// Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('dashboard/profile',[ProfileController::class,'edit'])->name('profile');

