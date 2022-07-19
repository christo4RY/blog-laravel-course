<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::latest()
                ->filter(request(['search','categories','users']))
                ->paginate(6)
                ->withQueryString()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()
                ->take(3)
                ->get(),
        ]);
    }

    public function subscriber(Blog $blog) {
        if (User::find(auth()->id())->isSubscribed($blog)) {
           $blog->unSubscribed();
        }else{
           $blog->subscribed();
        }

        return back();
    }
}
