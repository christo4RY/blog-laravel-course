<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('blogs',[
        'blogs' => Blog::all()
    ]);
});

Route::get('/blog/{blog:slug}', function ($slug) {
    return view('blog', [
        'blog' => Blog::findOrFail($slug)
    ]);
})->where('blog','[A-z\d\-_]+');
