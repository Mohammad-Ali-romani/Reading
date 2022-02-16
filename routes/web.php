<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

 Route::get('/', [PostController::class,'show_all'])->name('home');
 Route::prefix('admin')->group(function(){
     Route::get('/', [PostController::class,'index'])->name('posts');
     Route::get('/posts/category/{category_id}/post/{id}', [PostController::class,'show'])->name('post.show.one');
     Route::post('/comment/{id}', [CommentController::class,'save'])->name('comment.save');
     Route::get('/posts/category/{id}',[CategoryController::class,'showPosts'])->name('PostCategory.show');
     Route::get('/posts/search',[PostController::class,'search'])->name('search');
     require __DIR__.'/auth.php';
 });
