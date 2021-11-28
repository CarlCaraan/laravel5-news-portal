<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="keywords" content="">

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

<body>


	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
		<div class="container">

			<div class="navbar-left">
				<button class="navbar-toggler" type="button">&#9776;</button>
				<a class="navbar-brand" href="{{ route('welcome') }}">
						<img class="mx-2" src="{{ asset('img/favicon.png') }}" width="40px" alt=""><h6 class="logo-dark text-dark text-bold m-0 p-0">Santa Maria Laguna</h6>
					<h6 class="logo-light text-white m-0 p-0">Santa Maria Laguna</h6>
				</a>
			</div>

			<section class="navbar-mobile">
				<span class="navbar-divider d-mobile-none"></span>

				<ul class="nav nav-navbar">
					<li>
						<a class="logo-dark text-dark"href="{{ route('welcome') }}">Home</a>
						<a class="logo-white text-white"href="{{ route('welcome') }}">Home</a>
					</li>

				</ul>

			</section>

			<a class="btn btn-xs btn-rounded btn-secondary" href="{{ route('login') }}">Log In</a>

		</div>
	</nav><!-- /.navbar -->

	<!-- Header -->
    @yield('header')

	<!-- Main Content -->
    @yield('content')

	<!-- Map -->
	<section>
		<div class="container">
			<iframe class="my-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61801.213320133385!2d121.38856623718989!3d14.50902259898978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ed7ababf3a55%3A0x88209f39595fc5f6!2sSanta%20Maria%2C%20Laguna!5e0!3m2!1sen!2sph!4v1638107405642!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</section>

	<!-- Footer -->
	<footer class="footer">
		<div class="container">
			<div class="row gap-y align-items-center">

				<div class="col-6 col-lg-3">
					<h6 class="logo-dark text dark">Santa Maria Laguna</h6>
				</div>

				<div class="col-6 col-lg-3 text-right order-lg-last">
					<div class="social">
						<a class="social-facebook" href="#"><i
								class="fa fa-facebook"></i></a>
						<a class="social-twitter" href="#"><i
								class="fa fa-twitter"></i></a>
						<a class="social-instagram" href="#"><i
								class="fa fa-instagram"></i></a>
						<a class="social-youtube" href="#"><i
								class="fa fa-youtube"></i></a>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
						<a class="nav-link" href="../page/about-1.html">About</a>
						<a class="nav-link" href="../page/contact-1.html">Contact</a>
					</div>
				</div>

			</div>
		</div>
	</footer><!-- /.footer -->


	<!-- Scripts -->
	<script src="{{ asset('js/page.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>

</body>

</html>