@extends('layouts.app')

@section('title')
<title>Admin | Tags</title>
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
    <a href="{{ route('tags.create') }}" class="btn text-white" id="admin_add_btn">
        ADD TAG
    </a>
</div>

<div class="card card-default" id="admin_card">
    <div class="card-header text-white" id="admin_card_heading">
        Tags
    </div>

    <!-- Start card-body -->
    <div class="card-body">

        @if($tags->count() > 0)
            <!-- Start table -->
            <table class="table text-white" id="admin_table">

            <thead>
                <th>Name</th>
                <th class="center">Posts Count</th>
                <th></th>
            </thead>

            <tbody>
                <!-- Display the tags -->
                @foreach ($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->name }}
                        </td>
                        <td class="center">
                            <!-- Display post count in tag -->
                            {{ $tag->posts->count() }}
                        </td>
                        <td align="right">
                            <!-- Edit Button -->
                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm text-white" id="edit_restore_btn">
                                Edit
                            </a>

                            <!-- Delete button -->
                            <button class="btn btn-sm text-white" id="trash_delete_btn" onclick="handleDelete({{ $tag->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            </table>
            <!-- End table -->

            <!-- Start Pagination -->
            {{ $tags->links() }}
            <!-- End Pagination -->

            <!-- Start Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="deleteTagForm">

                        <!-- Form method create and update -->
                        @csrf
                        @method('DELETE')

                        <div class="modal-content">

                        <!-- Modal header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                Are you sure you want to delete this tag?
                            </p>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>

                        </div>
                    </form>
                </div>

            </div>
            <!-- End Modal -->
        @else
            <h3 class="text-center text-white">No Tags Yet</h3>
        @endif

    </div> <!-- End card-body -->
</div>
<!-- End card -->
@endsection


@section('scripts')
    <script>
        //Delete function modal
        function handleDelete(id) {
            var form = document.getElementById('deleteTagForm')
            form.action = '/tags/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
