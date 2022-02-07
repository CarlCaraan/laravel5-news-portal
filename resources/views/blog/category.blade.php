@extends('layouts.blog')

@section('title')
{{ $category->name }} | Santa Maria Laguna
@endsection

@section('header')
<header class="header text-center text-white pb-5" style="background-image: url('{{ asset('img/background.jpg')}}');">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<h1 class="font-weight-bold helvetica_font" id="news_heading"><span class="text-capitalize">{{ $category->name }}</span></h1>
				<span class="lead-2 mt-6 helvetica_font">GET INFORMED ABOUT THE LATEST<br> UPDATES IN OUR MUNICIPALITY</span>
			</div>
		</div>
	</div>
</header><!-- /.header -->
@endsection

@section('content')
<main class="main-content">
	<div class="section bg-gray" id="main_content">
		<div class="container">
			<div class="row">


				<div class="col-md-8 col-xl-9">
					<div class="row gap-y">

						@forelse ($posts as $post)
						<div class="col-md-6">
							<div class="card border hover-shadow-6 mb-6 d-block" id="news_card_wrapper">
								<a href="{{ route('blog.show', $post->id) }}"><img class="card-img-top" src="{{ asset('/storage/' . $post->image) }}" alt="Card image cap"></a>
								<div class="p-6 text-center">
									<p>
										<a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="">
											{{ $post->category->name }}
										</a>
									</p>
									<h5 class="mb-0">
										<a class="text-dark" href="{{ route('blog.show', $post->id) }}">
											{{ $post->title }}
										</a>
									</h5>
								</div>
							</div>
						</div>
						@empty
						<p class="text-center text-white">
							No results found for query <strong>{{ request()->query('search') }}</strong>
						</p>
						@endforelse

					</div>



					<!-- Start Pagination -->
					{{ $posts->appends(['search' => request()->query('search')])->links() }}
					<!-- End Pagination -->
				</div>



				@include('partials.sidebar')

			</div>
		</div>
	</div>
</main>
@endsection