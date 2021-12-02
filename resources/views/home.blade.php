@extends('layouts.app')

@section('background')
<!--- Start Landing Page Image -->
    <div class="home-inner" id="admin_background">
    </div>
<!--- End Landing Page Image -->
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="admin_card">
                <div class="card-header text-white" id="admin_card_heading">Dashboard</div>

                <div class="card-body text-white">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif  

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
