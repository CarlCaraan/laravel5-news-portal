@extends('layouts.app')

@section('title')
<title>Admin | Create Category</title>
@endsection

@section('background')
<!--- Start Landing Page Image -->
    <div class="home-inner" id="admin_background">
    </div>
<!--- End Landing Page Image -->
@endsection

@section('content')
    <div class="card card-default text-white" id="admin_card">
        <div class="card-header text-white" id="admin_card_heading">
            {{ isset($category) ? 'Edit Category' : 'Create Category' }}
        </div>
        <div class="card-body">
            <!-- Show Error Messages -->
            @include('partials.errors')

            <!-- Action = Create or Edit/Update -->
            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                @csrf

                <!-- Form method for create and update -->
                @if(isset($category))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control text-white" id="name" name="name" value="{{ isset($category) ? $category->name : '' }}" placeholder="Category"><!-- Remain values on edit -->
                </div>

                <div class="form-group">
                    <button class="btn text-white float-right" id="admin_add_btn">
                        {{ isset($category) ? 'Update Category' : 'Add Category' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
