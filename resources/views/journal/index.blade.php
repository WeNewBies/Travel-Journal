@extends('journal')

@section('content')
    <div class="hero">

        <div class="container d-flex flex-column my-5">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            {{--Header section--}}
            <div class="d-flex flex-column align-items-start">
                <h2 class="section-title fs-1">My Journals</h2>
                <a href="{{url('/create-journal')}}" class="main_btn my-4 text-decoration-none">
                    + Add Journal
                </a>
            </div>
            <hr>

            <div class="my-5 myTrips d-flex flex-row flex-wrap justify-content-center align-items-center">
                @foreach($journals as $journal)
                    <div class="box shadow-sm border just border-1 p-3 rounded-3 ms-4 mt-4 d-flex flex-column">
                        <div class="d-flex flex-column mb-3 justify-content-center align-items-center" style="min-width: 200px">
                            <label class="fs-2 fw-bold">{{$journal['title']}}</label>
                            <label class="fs-5  mt-4">{!!\Illuminate\Support\Str::limit($journal['content'], 150, '...')!!}</label>
                        </div>
                        <hr class="mb-2">
                        <div class="d-flex flex-column mb-3">
                            <label class=" fst-italic fw-semibold">Created At:
                                <label class="fs-6 fw-light text-success">{{$journal['created_at']}}</label>
                            </label>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="{{url('/show-journal/'.$journal['id'])}}" class="main_btn my-4 text-decoration-none">
                                Read More
                            </a>
                            <form id="deletejournal-form" action="{{ url('/delete-journal') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="id" value="{{$journal['id']}}">
                            </form>

                            <a href="#" onclick="event.preventDefault(); document.getElementById('deletejournal-form').submit();" class="btn btn-danger fs-6 mt-2 rounded-pill text-decoration-none">
                                Delete Journal
                            </a>
                        </div>
                    </div>
                @endforeach
                    @empty($journals)
                        <div class="text-center fs-2 mx-auto">No Journal Found!</div>
                    @endempty
            </div>

        </div>
    </div>
@endsection
