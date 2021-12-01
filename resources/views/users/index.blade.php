@extends('layouts.app')

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
                                <td>
                                    <!-- Show make admin button if the user is admin -->
                                    @if(!$user->isAdmin())
                                        <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm text-white" style="width: 100px!important;" id="edit_restore_btn">Make Admin</button>
                                        </form>
                                    @endif
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        @else
            <h3 class="text-center text-white">No Users Yet</h3>
        @endif
        <!-- End Display the posts -->

    </div>
</div>

@endsection
