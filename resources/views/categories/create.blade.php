@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Edit Category' : 'Create Category' }}
        </div>
        <div class="card-body">

            <!-- Start Display Validation Error -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- End Display Validation Error -->

            <!-- Action = Create or Edit/Update -->
            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                @csrf

                <!-- Form method for create and update -->
                @if(isset($category))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : '' }}"><!-- Remain values on edit -->
                </div>

                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($category) ? 'Update Category' : 'Add Category' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
