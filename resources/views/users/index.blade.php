@extends('layouts.app')

@section('title')
<title>Admin | Users</title>
@endsection

@section('background')
<!-- Start Landing Page Image -->
    <div class="home-inner" id="admin_background">
    </div>
<!-- End Landing Page Image -->
@endsection

@section('content')
<div class="card card-default" id="admin_card">
    <div class="card-header text-white" id="admin_card_heading">Users</div>

    <div class="card-body">

        <!-- Start Display the posts -->
        @if($users->count() > 0 )
            <div class="table-responsive">
                <table class="table text-white">
                    <thead class="center">
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody class="center">
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($user->email) }}" alt="">
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td class="px-1">
                                    <!-- Show make admin button if the user not admin -->
                                    @if(!$user->isAdmin())
                                        <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm text-white" style="width: 115px!important;" id="edit_restore_btn">Assign as Admin</button>
                                        </form>
                                    @endif
                                    <!-- Show make Writer button if the user is not writer -->
                                    @if(!$user->isWriter() && !$user->isViewer())
                                        <form action="{{ route('users.make-writer', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm text-white" style="width: 115px!important;" id="edit_restore_btn">Assign as Writer</button>
                                        </form>
                                    @endif
                                </td>
                                <td class="px-1">
                                    <!-- Show make Writer button if the user is not writer -->
                                    @if(!$user->isWriter() && !$user->isAdmin())
                                        <form action="{{ route('users.make-writer', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm text-white" style="width: 115px!important;" id="edit_restore_btn">Assign as Writer</button>
                                        </form>
                                    @endif
                                  <!-- Show remove auth button if the user is not viewer -->
                                    @if(!$user->isViewer())
                                        <form action="{{ route('users.make-viewer', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm text-white" style="width: 115px!important;" id="trash_delete_btn">Remove Role</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Start Pagination -->
                {{ $users->links() }}
                <!-- End Pagination -->

            </div>
            
        @else
            <h3 class="text-center text-white">No Users Yet</h3>
        @endif
        <!-- End Display the posts -->

    </div>
</div>

@endsection
