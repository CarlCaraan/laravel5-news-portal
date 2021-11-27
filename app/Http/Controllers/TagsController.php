<?php

namespace App\Http\Controllers;

//~Add class model
use App\Tag;

use Illuminate\Http\Request;

//~Add all Tags request 
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        //~Create data to database
        Tag::create([
            'name' => $request->name
        ]);

        //~Show Status Message
        session()->flash('success', 'Tag created successfully.');

        //~Refresh the page
        return redirect(route('tags.index'));
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
    public function edit(Tag $tag)
    {
        //~Add update views
        return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagsRequest $request, Tag $tag)
    {
        //~Update data to database
        $tag->update([
            'name' => $request->name
        ]);

        //~Show Status Message
        session()->flash('success', 'Tag updated successfully.');

        //~Refresh the page
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //~Tags cannot be deleted because its associated to some posts
        if($tag->posts->count() > 0) {
            session()->flash('error', 'Tag cannot be deleted, because it is associated to some posts.');
            return redirect()->back();
        }
        //~Delete data to database
        $tag->delete();

        //~Show Status Message
        session()->flash('success', 'Tag deleted successfully.');

        //~Refresh the page
        return redirect(route('tags.index'));
    }
}
