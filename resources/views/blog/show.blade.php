@extends('layouts.blog')

@section('title')
    {{ $post->title }}
@endsection

@section('header')
<!-- Header -->
<header class="header text-white h-fullscreen pb-80" style="background-image: url({{ asset('/storage/' . $post->image) }});" data-overlay="9">
    <div class="container text-center">

    <div class="row h-100">
        <div class="col-lg-8 mx-auto align-self-center">

        <p class="opacity-70 text-uppercase small ls-1 helvetica_font">
            {{ $post->category->name }}
        </p>
        <h1 class="display-4 mt-7 mb-8 helvetica_font">{{ $post->title }}</h1>
        <p><span class="opacity-70 mr-1 helvetica_font">By</span> <a class="text-white" href="#">
            {{ $post->user->name }}
        </a></p>
        <p><img class="avatar avatar-sm helvetica_font" src="{{ Gravatar::src($post->user->email) }}" alt="..."></p>

        <p class="opacity-70 text-uppercase small ls-1 helvetica_font">
            Published at: {{ $post->published_at }}
        </p>

        </div>

        <div class="col-12 align-self-end text-center">
        <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
        </div>

    </div>

    </div>
</header><!-- /.header -->
@endsection

@section('content')
<!-- Main Content -->
<main class="main-content">


    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Blog content
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section" id="section-content">
        <div class="container">
            <span class="helvetica_font">
                {!! $post->content !!}
            </span>

            <div class="addthis_inline_share_toolbox"></div>

            <div class="row">
                <div class="gap-xy-2 mt-6 ml-3">
                    @foreach ($post->tags as $tag)
                        <a class="badge badge-pill badge-secondary" href="{{ route('blog.tag', $tag->id) }}">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>



    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Comments
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section bg-gray">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 mx-auto">
                
                @guest
                <div class="center">
                    <div class="w-100" id="disqus-message">
                        <i class="fas fa-lock mx-1"></i><span>You must be logged in to post a comment</span>
                    </div>
                    <div class="blur-discuss">
                        <div id="disqus_cover"></div>
                        <div id="disqus_thread"></div><br>
                    </div>
                </div>
                @else
                <!-- Start Comment Section -->
                <div id="disqus_thread"></div>
                @endguest
                <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    
                    var disqus_config = function () {
                        this.page.url = "{{ config('app.url') }}/blog/posts/{{ $post->id }}";  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://santa-maria-laguna-news.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                <!-- End Comment Section -->
                </div>
            </div>

        </div>
    </div>
</main>
@endsection