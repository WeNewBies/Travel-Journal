@extends('layouts.app')

@section('content')
    <div class="container px-4 px-lg-5 mt-5 py-3">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="d-flex justify-content-center align-items-center mb-5">
                <h3 class="section-title mb-5 fs-1 ">Travel Blogs</h3>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach($articles['articles'] as $article)
                    <div class="post-preview">
                            <img class="rounded" style="width: 100%" src="{{$article['urlToImage']}}" alt="">
                        <a href="{{$article['url']}}">
                            <h2 class="post-title fs-2 mt-2">{{$article['title']}}</h2>
                            <h3 class="post-subtitle fs-5">{{\Illuminate\Support\Str::limit($article['description'], 100, '...')}}</h3>
                        </a>
                        <p class="post-meta mt-3">
                            Posted by
                            <label class="text-primary">{{$article['author']}}</label>
                            on {{$article['publishedAt']}}
                        </p>
                        <p class="post-meta">
                            Source
                            <label class="text-primary">{{$article['source']['name']}}</label>
                        </p>

                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
