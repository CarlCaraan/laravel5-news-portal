<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ~Add class models
use App\Category;
use App\Tag;
use App\Post;

class WelcomeController extends Controller
{
    // ~Add views to controller
    public function index() 
    {
        return view('welcome')
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('posts', Post::all());
    }
}
