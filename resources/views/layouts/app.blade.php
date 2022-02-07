<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/fixed.css') }}" rel="stylesheet">

    <!-- Favicons -->
	<link rel="icon" href="{{ asset('img/favicon.png') }}">


    <style>
        .btn-info {
            color: #fff;
        }
    </style>

    @yield('css')
</head>
<body id="app-blade-body">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top" id="login_navigation">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <div class="row">
                        <div class="col px-0">
                            <img class="mx-2" src="{{ asset('img/favicon.png') }}" width="50px" alt="">
                        </div>
                        <div class="col px-0">
                            <h5 class="pb-0 m-0" id="brand-text"><strong>STA. MARIA, LAGUNA</strong></h5>
                            <span class="p-0 m-0" id="news_typings"></span>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="custom-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li class="nav-item">
                                <a class="nav-link text-white <?php if($page == "login"){echo "active";} ?>" id="nav_login" href="{{ route('login') }}"><h5>{{ __('Login') }}</h5></a>
                            </li>

                            <h4 class="text-white mt-1" id="nav_divider">|</h4>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white <?php if($page == "register"){echo "active";} ?>" id="nav_login" href="{{ route('register') }}"><h5>{{ __('Register') }}</h5></a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span id="nav_admin">{{ Auth::user()->name }} <span class="caret"></span></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                                        My Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Start Background Image -->
        @yield('background')
        <!-- End Background Image -->
        
        <main class="py-4">
            @auth
                <div class="container py-5 mt-5">

                    <!-- Display message success -->
                    @if(session()->has('success'))
                        <div class="alert alert-success mx-3">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <!-- Display message error -->
                    @if(session()->has('error'))
                        <div class="alert alert-danger mx-3">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    <div class="row">

                        <!-- Start Vertical Navigation -->
                        <div class="col-md-4">
                            <ul class="list-group">

                                <!-- Show users list for only admin users -->
                                @if(auth()->user()->isAdmin())
                                    <li class="list-group-item" id="admin_navigation">
                                        <a class="text-white" id="admin_links" href="{{ route('users.index') }}">
                                            <div class="w-100">
                                                <span>Users</span>
                                                <img class="float-right" id="admin-icons" src="{{ asset('img/icons/users.png') }}" alt="">
                                            </div>
                                        </a>
                                    </li>
                                @endif

                                <li class="list-group-item" id="admin_navigation">
                                    <a class="text-white" id="admin_links" href="{{ route('posts.index') }}">
                                        <div class="w-100">
                                            <span>Posts</span>     
                                            <img class="float-right" id="admin-icons" src="{{ asset('img/icons/posts.png') }}" alt="">
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item" id="admin_navigation">
                                    <a class="text-white" id="admin_links" href="{{ route('tags.index') }}">
                                        <div class="w-100">
                                            <span>Tags</span>
                                            <img class="float-right" id="admin-icons" src="{{ asset('img/icons/tags.png') }}" alt="">
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item" id="admin_navigation">
                                    <a class="text-white" id="admin_links" id="admin-icons" href="{{ route('categories.index') }}">
                                        <div class="w-100">
                                            <span>Categories</span>
                                            <img class="float-right" id="admin-icons" src="{{ asset('img/icons/category.png') }}" alt="">
                                        </div>
                                    </a>
                                </li>

                            </ul>

                            <ul class="list-group my-3">
                                <li class="list-group-item" id="trashed_nav">
                                    <a class="text-white" id="admin_links" href="{{ route('trashed-posts.index') }}">
                                        <div class="w-100">
                                            <span>Trashed Posts</span>
                                            <img class="float-right" id="admin-icons" src="{{ asset('img/icons/trash.png') }}" alt="">
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Vertical Navigation -->

                        <!-- Start Main Content -->
                        <div class="col-md-8">
                            <!-- Right table content -->
                            @yield('content')
                        </div>
                        <!-- End Main Content -->

                    </div> <!-- End Row -->

                </div> <!-- End Container -->
            @else
                <!-- Login Form & other content -->
                @yield('content')
            @endauth
        </main>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/typed.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/fbaf02a1c1.js" crossorigin="anonymous"></script>
	<script src="{{ asset('js/custom.js') }}"></script>

    @yield('scripts')

</body>
</html>
