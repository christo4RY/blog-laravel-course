<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthBlogController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'blogs' => Blog::latest()->get(),
        ]);
    }
    public function create()
    {
        return view('admin.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        $blogDatas = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')],
            'intro' => ['required'],
            'body' => ['required', 'min:8'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        $blogDatas['user_id'] = auth()->id();
        $blogDatas['thumbnails'] = request()
            ->file('thumbnail')
            ->store('thumbnails');
        Blog::create($blogDatas);

        return redirect()->route('home');
    }

    public function edit(Blog $blog)
    {
        return view('admin.edit', [
            'blog' => $blog,
            'categories' => Category::all(),
        ]);
    }

    public function update(Blog $blog)
    {
        $blogDatas = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')->ignore($blog->id)],
            'intro' => ['required'],
            'body' => ['required', 'min:8'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        $blogDatas['user_id'] = auth()->id();
        $blogDatas['thumbnails'] = request()->file('thumbnail')
            ? request()
                ->file('thumbnail')
                ->store('thumbnails')
            : $blog->thumbnails;
        $blog->update($blogDatas);

        return redirect()->route('home');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }
}
