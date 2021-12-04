@extends('layouts.blog')

@section('title')
{{ $category->name }} | Santa Maria Laguna
@endsection

@section('header')
<header class="header text-center text-white" style="background-image: url('{{ asset('img/background.jpg')}}');">
	<div class="container">

		<div class="row">
			<div class="col-md-8 mx-auto">

				<h1>{{ $category->name }}</h1>
				<p class="lead-2 opacity-90 mt-6">Read and get updated on news and events.</p>

			</div>
		</div>

	</div>
</header><!-- /.header -->
@endsection

@section('content')
<main class="main-content">
	<div class="section bg-gray">
		<div class="container">
			<div class="row">


				<div class="col-md-8 col-xl-9">
					<div class="row gap-y">

						@forelse ($posts as $post)
							<div class="col-md-6">
								<div class="card border hover-shadow-6 mb-6 d-block">
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
						<p class="text-center">
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
