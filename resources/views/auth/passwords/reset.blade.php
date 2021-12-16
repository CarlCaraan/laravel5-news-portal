@extends('layouts.app')

@section('title')
<title>Reset Password | Sta. Maria Laguna</title>
@endsection

@section('background')
<!--- Start Landing Page Image -->
<div class="home-inner" id="login_background">
</div>
<!--- End Landing Page Image -->
@endsection

@section('content')
<?php $page = "" ?>
<div class="container" id="login_container_padding">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card py-5 login_card_container">
                <h1 class="center login_headings mt-4" style="letter-spacing: -1.8px">Create New Password</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group login-padding">
                            <label for="email" class="text-white font-weight-bold text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group login-padding">
                            <label for="password" class="text-white font-weight-bold text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group login-padding">
                            <label for="password-confirm" class="text-md-right text-white font-weight-bold">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="center w-100">
                                <button type="submit" class="btn  login_button font-weight-700">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection