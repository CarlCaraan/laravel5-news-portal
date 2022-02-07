<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>
		@yield('title')
	</title>

	<!-- Styles -->
	<link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
	<link rel="icon" href="{{ asset('img/favicon.png') }}">
</head>

<body id="blog_body">
	<!-- Start of Async Drift Code -->
	<script>
		"use strict";

		! function() {
			var t = window.driftt = window.drift = window.driftt || [];
			if (!t.init) {
				if (t.invoked) return void(window.console && console.error && console.error("Drift snippet included twice."));
				t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on"],
					t.factory = function(e) {
						return function() {
							var n = Array.prototype.slice.call(arguments);
							return n.unshift(e), t.push(n), t;
						};
					}, t.methods.forEach(function(e) {
						t[e] = t.factory(e);
					}), t.load = function(t) {
						var e = 3e5,
							n = Math.ceil(new Date() / e) * e,
							o = document.createElement("script");
						o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
						var i = document.getElementsByTagName("script")[0];
						i.parentNode.insertBefore(o, i);
					};
			}
		}();
		drift.SNIPPET_VERSION = '0.3.1';
		drift.load('sgpeumma7u65');
	</script>
	<!-- End of Async Drift Code -->

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
		<div class="container">

			<div class="navbar-left">
				<button class="navbar-toggler" type="button">&#9776;</button>
				<a class="navbar-brand" href="{{ route('welcome') }}">
					<img class="mx-2" src="{{ asset('img/favicon.png') }}" width="40px" alt="">
					<h6 class="logo-dark font-weight-bold m-0 p-0 helvetica_font" id="brand-text">STA. MARIA LAGUNA</h6>
					<h6 class="logo-light text-white m-0 p-0 font-weight-bold helvetica_font" id="brand-text">STA. MARIA LAGUNA</h6>
				</a>
			</div>

			<section class="navbar-mobile" id="mobile_sidebar">
				<span class="navbar-divider d-mobile-none"></span>

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						@guest
						<a class="btn btn-secondary px-3 py-0 helvetica_font" id="landing_page_login_heading" href="{{ route('login') }}">
							Login <small>or</small> Register
						</a>
						@else
						<div class="dropdown">
							<a class="btn dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
								<span class="text-white">{{ Auth::user()->name }}<span class="caret"></span></span>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</div>
						@endguest
					</li>
				</ul>

			</section>

		</div>
	</nav><!-- /.navbar -->

	<!-- Header -->
	@yield('header')

	<!-- Main Content -->
	@yield('content')

	<!-- Map -->
	<section id="map_container">
		<div class="container">
			<iframe class="my-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61801.213320133385!2d121.38856623718989!3d14.50902259898978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ed7ababf3a55%3A0x88209f39595fc5f6!2sSanta%20Maria%2C%20Laguna!5e0!3m2!1sen!2sph!4v1638107405642!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</section>

	<!-- Start Footer Section -->
	<footer>
		<div id="home_footer">
			<div class="container py-5">
				<div class="row gap-y align-items-center">

					<div class="col-lg-4" id="matrix-container">
						<div class="matrix mt-0" id="matrix_left">
							<img src="{{ asset('img/logo.png') }}" width="50px" alt="">
						</div>
						<div class="matrix pl-4 text-white" id="matrix_text">
							<h6 class="m-0 helvetica_font" style="line-height: 13px!important;">News portal created by</h6>
							<h6 class="m-0 helvetica_font" style="line-height: 26px!important;">&copy 2021 M83X Systems.</h6>
							<h6 class="helvetica_font" style="line-height: 10px!important;">All Rights Reserved.</h6>
						</div>
					</div>

					<div class="col-lg-4">
					</div>

					<div class="col-lg-4">
						<div class="row">
							<div class="col-lg-7 text-white center" id="divider_footer">
								<div id="follow_container">
									<h6 class="text-center helvetica_font"><strong>FOLLOW</strong> STA. MARIA</h6>
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
	</footer>
	<!-- End Footer Section -->


	<!-- Scripts -->
	<script src="{{ asset('js/page.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61a8719102708910"></script>
	<script src="https://kit.fontawesome.com/fbaf02a1c1.js" crossorigin="anonymous"></script>


</body>

</html>