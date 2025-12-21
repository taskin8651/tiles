<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    // Blog Listing
    public function index()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('custom.blog', compact('blogs'));
    }

    // Blog Details
    public function show(Blog $blog)
    {
        return view('custom.blog-detail', compact('blog'));
    }
}
