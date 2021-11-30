@extends('layouts.app')

@section('background')
<!--- Start Landing Page Image -->
    <div class="home-inner" id="admin_background">
    </div>
<!--- End Landing Page Image -->
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
        </div>
        <div class="card-body">
            <!-- Show Error Messages -->
            @include('partials.errors')

            <!-- Action = Create or Edit/Update -->
            <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
                @csrf

                <!-- Form method for create and update -->
                @if(isset($tag))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($tag) ? $tag->name : '' }}"><!-- Remain values on edit -->
                </div>

                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($tag) ? 'Update Tag' : 'Add Tag' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
