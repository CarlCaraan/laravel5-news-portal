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
        // Search Function when clicking categories
        $search = request()->query('search');
        if($search) {
            $posts = $category->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(4);
        }
        else {
            $posts = $category->posts()->simplePaginate(4);
        }

        return view('blog.category')
        ->with('category', $category)
        ->with('posts', $posts)
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
        ->with('posts', $tag->posts()->simplePaginate(4));
    }
}
