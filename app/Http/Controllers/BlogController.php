<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
    
        $blogs = Blog::with('category', 'author')->filter(request(['search', 'category', 'username']))->paginate(3)->withQueryString();
        return view('blogs.index', compact('blogs'));
    }

    public function show(Blog $blog) {
        $randomBlogs = Blog::inRandomOrder()->take(3)->get();
    
        return view('blogs.show', compact('blog', 'randomBlogs'));
    }

    public function subscriptionHandler(Blog $blog) {
        if(auth()->user()->isSubscribed($blog)) {
            $blog->unSubscribe();
        }else {
            $blog->subscribe();
        }

        return back();
    }

}
