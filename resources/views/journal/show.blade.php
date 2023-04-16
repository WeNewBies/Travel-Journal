@extends('journal')

@section('content')
    <div class="hero">
        <div class="container d-flex flex-column my-5">
            <div class="post-preview">
                <h2 class="post-title fs-2 mt-2">{{$journal['title']}}</h2>
                <h3 class="post-subtitle fs-5 my-3">
                {!! $journal['content'] !!}
                </h3>

                <p class="post-meta mt-3">
                    Posted on
                    <label class="text-primary">{{$journal['created_at']}}</label>
                </p>
            </div>
        </div>
    </div>
@endsection
