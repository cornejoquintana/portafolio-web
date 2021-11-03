@extends('..layouts.app')

@section('content')
    <section class="article-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro">
                        <h1 class="text-center">{{ $post->title }}</h1>
                        <p class="text-center">
                            <a href="#">{{ $post->user_id }}</a>
                            <span class="date">{{ $post->created_at->format('F j, Y') }}</span>
                        </p>
                        <img class="img-fluid" src="https://www.cornejoquintana.com/storage/2021/04/network-3139208_1920-749x516.jpg">
                    </div>
                    <div class="text">
                        {{ $post->body }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Publicaciones relacionadas</h2>
            </div>
            <div class="row articles">
                @foreach ($postList as $post)
                    <div class="col-sm-6 col-md-4 item">
                        <a href="#">
                            <img class="img-fluid"
                                src="https://www.cornejoquintana.com/storage/2021/04/network-3139208_1920-749x516.jpg" />
                        </a>
                        <h3 class="name">{{ $post->title }}</h3>
                        <p class="description">{{ $post->get_limit_body }} </p>
                        <a class="action" href="{{ route('posts.detail', $post->slug) }}">
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="w-full py-8">
        <div class="max-w-4xl flex-row justify-start p-3 text-left ml-auto mr-auto border rounded shadow-sm bg-gray-50">
            @guest
                <p>You must be logged in to write comments</p>
            @else
                <form action="{{ route('comments.store') }}" method="post">
                    @csrf
                    <textarea class="w-full h-28 resize-none border rounded focus:outline-none focus:shadow-outline p-2"
                        name="comment" placeholder="Write your comment here" required>{{ old('comment') }}</textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="submit" value="SEND"
                        class="px-4 py-2 bg-orange-300 cursor-pointer hover:bg-orange-500 font-bold w-full border rounded border-orange-300 hover:border-orange-500 text-white">
                    @if (session('status'))
                        <div class="w-full bg-green-500 p-2 text-center my-2 text-white">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="w-full bg-red-500 p-2 text-center my-2 text-white">
                            {{ $errors->first() }}
                        </div>
                    @endif
                </form>
            @endguest
            <h3 class="py-4 text-2xl">
                <div id="graphcomment">
                    <script type="text/javascript">

                    /* - - - CONFIGURATION VARIABLES - - - */
                    var __semio__params = {
                        graphcommentId: "cornejoquintana", // make sure the id is yours
                        behaviour: {
                        // HIGHLY RECOMMENDED
                        //  uid: "...", // uniq identifer for the comments thread on your page (ex: your page id)
                        },
                        // configure your variables here
                    }

                    /* - - - DON'T EDIT BELOW THIS LINE - - - */
                    function __semio__onload() {
                        __semio__gc_graphlogin(__semio__params)
                    }
                    (function() {
                        var gc = document.createElement('script'); gc.type = 'text/javascript'; gc.async = true;
                        gc.onload = __semio__onload; gc.defer = true; gc.src = 'https://integration.graphcomment.com/gc_graphlogin.js?' + Date.now();
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(gc);
                    })();
                    </script>
                </div>
            </h3>
            <div>
                @foreach ($post->comments as $comment)
                    <div class="w-full bg-white p-2 my-2 border">
                        <div class="header flex justify-between mb-4 text-sm text-gray-500">
                            <div>
                                By {{ $comment->user->name }}
                            </div>
                            <div>
                                {{ $comment->created_at->format('j F, Y') }}
                            </div>
                        </div>
                        <div class="text-lg">{{ $comment->comment }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
