@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit Post': 'Create Post' }}
    </div>

    <div class="card-body">
        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Form method for create and update -->
            @if(isset($post))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ isset($post) ? $post->title : '' }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5" cols="5">{{ isset($post) ? $post->description : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input class="form-control" type="text" name="published_at" id="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
            </div>

            <!-- Show Image on Edit -->
            @if(isset($post->image))
                <div class="form-group">
                    <img src="{{ asset('/storage/' . $post->image) }}" alt="" style="width: 100%;">
                </div>
            @endif

            <div class="form-group">
                <label for="image">Image</label>
                <input class="form-control" type="file" name="image" id="image">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">

                    <!-- Access category in the add category and database -->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @if(isset($post))
                                @if($category->id == $post->category_id)
                                    selected
                                @endif
                            @endif
                                >
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($post) ? 'Update Post' : 'Create Post' }}
                </button>
            </div>

        </form>
    </div>

</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
