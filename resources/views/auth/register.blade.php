@extends('layouts.app')

@section('title')
<title>Register | Sta. Maria Laguna</title>
@endsection

@section('background')
<!--- Start Landing Page Image -->
<div class="home-inner" id="login_background">
</div>
<!--- End Landing Page Image -->
@endsection

@section('content')
<?php $page = "register" ?>
<div class="container" id="login_container_padding">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card py-4 login_card_container">
                <h1 class="center login_headings mt-4">Create your account</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group login-padding">
                            <input id="full-name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group login-padding">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group login-padding">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group login-padding">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>

                        <div class="form-group login-padding center">
                            <button type="submit" class="btn form-control login_button">
                                {{ __('Register') }}
                            </button>
                            <a class="nav-link text-white mt-2 <?php if ($page == "login") {
                                                                    echo "active";
                                                                } ?>" id="nav_login" href="{{ route('login') }}">
                                <h5>Already a member? Login</h5>
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Footer Section -->
<!-- <footer>
    <div id="login_footer">
        <div class="container py-5">
			<div class="row gap-y align-items-center">

				<div class="col-lg-4" id="matrix-container">
                    <div class="matrix" id="matrix_left">
                        <img src="{{ asset('img/logo.png') }}" width="50px" alt="">
                    </div>
                    <div class="matrix ml-5 pl-2 text-white">
                        <h6 class="m-0">News portal created by</h6>
                        <h6 class="m-0">&copy 2021 M83X Systems.</h6>
                        <h6>All Rights Reserved.</h6>
                    </div>
                </div>

				<div class="col-lg-4">
				</div>

				<div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-7 text-white center" id="divider_footer">
                            <div id="follow_container">
                                <h6 class="text-center"><strong>FOLLOW</strong> STA. MARIA</h6>
                            </div>
                        </div>
                        <div class="col-lg-5 text-white">
                            <div id="icon_container">
                                <a class="social-facebook mr-2" href="https://www.facebook.com/MayorCindySML" target="_blank"><i class="fab fa-facebook-square" id="icon-facebook"></i></i></a>
                                <a class="social-twitter mr-2" href="#"><i class="fab fa-twitter-square" id="icon-twitter"></i></a>
                                <a class="social-instagram mr-2" href="#"><i class="fab fa-instagram-square" id="icon-instagram"></i></a>
                            </div>
                        </div>
                    </div>
				</div>

            </div>
        </div>
    </div>
</footer> -->
<!-- End Footer Section -->
@endsection