@extends('layouts.app')

@section('title')
<title>Admin | Create Post</title>
@endsection

@section('background')
<!--- Start Landing Page Image -->
    <div class="home-inner" id="admin_background">
    </div>
<!--- End Landing Page Image -->
@endsection

@section('content')
<div class="card card-default border-0">
    <div class="card-header text-white m-0 rounded" id="admin_card_heading">
        {{ isset($post) ? 'Edit News': 'Create News' }}
    </div>

    <div class="card-body">
        <!-- Show Error Messages -->
        @include('partials.errors')

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
                
            <!-- Access tags in the add post -->
            @if($tags->count() > 0)
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control tags-selector" multiple>'
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                            @if(isset($post))
                                @if($post->hasTag($tag->id))
                                    selected
                                @endif
                            @endif
                        >
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="form-group">
                <button type="submit" class="btn text-white float-right" id="admin_add_btn">
                    {{ isset($post) ? 'Update News' : 'Create News' }}
                </button>
            </div>

        </form>
    </div>

</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        //~Flat picker JS
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds: true
        })

        //~Select 2 JS
        $(document).ready(function() {
            $('.tags-selector').select2();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endsection
