@extends('layouts.app')

@section('background')
<!--- Start Landing Page Image -->
    <div class="home-inner" id="admin_background">
    </div>
<!--- End Landing Page Image -->
@endsection

@section('content')
<div class="card">
    <div class="card-header">My Profile</div>

    <div class="card-body">
        @include('partials.errors')
        <form action="{{ route('users.update-profile') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="about">About Me</label>
                <textarea name="about" id="id" cols="5" rows="5" class="form-control">{{ $user->about }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Profile</button>
        </form>
    </div>
</div>
@endsection
