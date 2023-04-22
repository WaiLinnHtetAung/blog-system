<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Mail\CommentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog) {
        request()->validate([
            'body' => 'required',
        ]);

        $blog->comments()->create([
            'body' => request()->body,
            'user_id' => auth()->user()->id,
        ]);
        
        //mail
        $subscribers = $blog->subscribers->filter(fn($subscriber) => $subscriber->id != auth()->user()->id);

        $subscribers->each(function($subscriber) use($blog) {
            Mail::to($subscriber->email)->queue(new CommentMail($blog));
        });

        return redirect("/blog/$blog->slug");
    }
}
