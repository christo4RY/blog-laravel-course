<?php

namespace App\Http\Controllers;

use App\Mail\SubscribedMail;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => ['required', 'min:3'],
        ]);

        $subscribers = $blog->subscriber->filter(fn ($subscribe) => $subscribe->id != auth()->id());
        $subscribers->each(function($subscriber) use ($blog){
            Mail::to($subscriber->email)->queue(new SubscribedMail($blog));
        });
        $blog->comment()->create([
            'user_id' => auth()->id(),
            'body' => request('body'),
        ]);

        return redirect("/blogs/$blog->slug");
    }
}
