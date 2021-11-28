<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// ~Add model class
use App\Post;

class PostsController extends Controller
{
    // ~Show single post
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }
}
