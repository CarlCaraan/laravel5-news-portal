@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">Create Post</div>

    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5" cols="5"></textarea>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" rows="5" cols="5"></textarea>
            </div>

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input class="form-control" type="text" name="published_at" id="published_at" value="">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Create Post
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
