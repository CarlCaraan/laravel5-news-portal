@extends('layouts.app')

@section('title')
<title>Admin | Posts</title>
@endsection

@section('background')
<!--- Start Landing Page Image -->
<div class="home-inner" id="admin_background">
</div>
<!--- End Landing Page Image -->
@endsection

@section('content')

<div class="d-flex justify-content-end mb-2">
    <!-- Add button -->
    <a href="{{ route('posts.create') }}" class="btn text-white" id="admin_add_btn">
        CREATE NEWS
    </a>
</div>

<div class="card card-default" id="admin_card">
    @if($posts->count() > 0 )
    <div class="card-header text-white" id="admin_card_heading">Posts</div>
    @else
    <div class="card-header text-white" id="admin_card_heading">Empty</div>
    @endif


    <div class="card-body">

        <!-- Start Display the posts -->
        @if($posts->count() > 0 )
        <div class="table-responsive">
            <table class="table text-white">
                <thead>
                    <th>IMAGE</th>
                    <th>TITLE</th>
                    <th>CATEGORY</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="{{ asset('/storage/' . $post->image) }}" width="120px" height="60" alt="">
                        </td>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            <!-- Redirect to edit this category -->
                            <a class="text-white decoration-none" href="{{ route('categories.edit', $post->category->id) }}">
                                {{ $post->category->name }}
                            </a>
                        </td>
                        <!-- Add restore button if not trashed -->
                        @if($post->trashed())
                        <td>
                            <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm text-white" id="edit_restore_btn">Restore</button>
                            </form>
                        </td>
                        <!-- Add edit button if not trashed -->
                        @else
                        <td class="px-0">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm text-white" id="edit_restore_btn">Edit</a>
                        </td>
                        @endif
                        <td class="pl-1">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm text-white" onclick="return confirm('Are you sure you want to delete this post?')" id="trash_delete_btn">
                                    {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Start Pagination -->
            {{ $posts->links() }}
            <!-- End Pagination -->

        </div>
        @else
        <h3 class="text-center text-white">No Posts Yet</h3>
        @endif
        <!-- End Display the posts -->

    </div>
</div>

@endsection