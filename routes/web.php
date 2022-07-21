<?php

use App\Http\Controllers\AuthBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login_user'])->middleware('guest');
Route::post('/blogs/{blog:slug}/comment', [CommentController::class, 'store']);
Route::post('/blogs/{blog:slug}/subscriber' , [BlogController::class, 'subscriber']);


//admin routes
Route::middleware('can:admin')->group(function(){
    Route::get('/admin/blogs', [AuthBlogController::class,'index'])->name('adminIndex');
    Route::get('/admin/blogs/create', [AuthBlogController::class,'create']);
    Route::post('/admin/blogs/store', [AuthBlogController::class,'store']);
    Route::delete('/admin/blogs/{blog:slug}/delete', [AuthBlogController::class,'destroy']);
    Route::get('/admin/blogs/{blog:slug}/edit', [AuthBlogController::class,'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AuthBlogController::class,'update']);
});
