<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')
                    ->latest()
                    ->paginate(6);
        
        $latestBlogs = Blog::with('user')
                          ->latest()
                          ->take(5)
                          ->get();

        return view('front.blog.index', compact('blogs', 'latestBlogs'));
    }

    public function show($id)
    {
        $blog = Blog::with('user')
                    ->findOrFail($id);
        
        $latestBlogs = Blog::with('user')
                          ->where('id', '!=', $id)
                          ->latest()
                          ->take(5)
                          ->get();

        return view('front.blog.show', compact('blog', 'latestBlogs'));
    }
} 