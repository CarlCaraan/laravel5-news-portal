<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// ~Add model class
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    // ~Show single post
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }

    // View categories onclick
    public function category(Category $category) 
    {
        return view('blog.category')
        ->with('category', $category)
        ->with('posts', $category->posts()->searched()->simplePaginate(4))
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    // View tags onclick
    public function tag(Tag $tag) 
    {
        return view('blog.tag')
        ->with('tag', $tag)
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('posts', $tag->posts()->searched()->simplePaginate(4));
    }
}
