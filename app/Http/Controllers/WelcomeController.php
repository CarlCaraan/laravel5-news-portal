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
        // Add search function
        $search = request()->query('search');
        if($search) {
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        }
        else {
            $posts = Post::simplePaginate(1);
        }


        return view('welcome')
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('posts', $posts);
    }
}
