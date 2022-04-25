@extends('layouts.app')

@section('title')
<title>Login | Sta. Maria Laguna</title>
@endsection

@section('background')
<!--- Start Landing Page Image -->
<div class="home-inner" id="login_background">
</div>
<!--- End Landing Page Image -->
@endsection

@section('content')
<?php $page = "login" ?>
<div class="container" id="login_container_padding">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card py-5 login_card_container">
                <h1 class="center login_headings mt-4" style="letter-spacing: -1.8px">Login to your account</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group login-padding">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>

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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label text-white" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group login-padding center">
                            <button type="submit" class="btn form-control login_button font-weight-700">
                                {{ __('Log In') }}
                            </button><br>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link text-secondary font-weight-bold mt-2" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                            <a class="nav-link text-white pb-0 mb-0 <?php if ($page == "register") {
                                                                        echo "active";
                                                                    } ?>" id="nav_login" href="{{ route('register') }}">
                                <h5>Not a member? Register now</h5>
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
                    <div class="matrix pl-2 text-white" id="matrix_text">
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