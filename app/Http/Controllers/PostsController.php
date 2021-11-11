<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//~Add all categories request folder
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

//~Add class model
use App\Post;
use App\Category;


class PostsController extends Controller
{
    //~Create constructor for middleware
    public function __construct()
    {
        $this->middleware('VerifyCategoriesCount')->only(['create', 'store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //~Link the add category on post category
        return view('posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        //~upload the image to storage
        $image = $request->image->store('posts');

        //~Create data to database
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category
        ]);

        //~Show Status Message
        session()->flash('success', 'Post created successfully.');

        //~Refresh the page
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //~Add update views onclick edit button
        return view('posts.create')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'published_at', 'content']);

        //Check image
        if($request->hasFile('image')) {
            //Upload it
            $image = $request->image->store('posts');

            //Delete old one
            $post->deleteImage();

            $data['image'] = $image;
        }

        //Update attributes
        $post->update($data);

        //~Show Status Message
        session()->flash('success', 'Post updated successfully.');

        //~Refresh the page
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //~Find the specific post with id
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        //~Trash & permanent delete Function
        if($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();
        } else {
            $post->delete();
        }

        //~Show Status Message
        session()->flash('success', 'Post deleted successfully.');

        //~Refresh the page
        return redirect(route('posts.index'));
    }

    /**
     * Display a list of all trashed posts.
     *
     * @return \Illuminate\Http\Response
     */

    //~Add Trashed Method
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->with('posts', $trashed);
    }

    //~Add Restore Method
    public function restore($id)
    {
        //~Find the specific post with id
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        //~Do a restore
        $post->restore();

        //~Show Status Message
        session()->flash('success', 'Post restored successfully.');

        //~Back the page
        return redirect()->back();
    }
}
