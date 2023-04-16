@extends('plans')

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
                <h2 class="section-title fs-1">My Trips</h2>
                <a href="{{url('/create-plan')}}" class="main_btn my-4 text-decoration-none">
                + Add Trip
                </a>
            </div>
                <hr>

            <div class="my-5 myTrips d-flex flex-row flex-wrap justify-content-center align-items-center">
                    @foreach($plans as $plan)
                <div class="box shadow-sm border just border-1 p-3 rounded-3 ms-4 mt-4 d-flex flex-column">
                    <div class="d-flex flex-column mb-3 justify-content-center align-items-center" style="min-width: 200px">
                        <label class="fs-3 fw-semibold">{{$plan['tripName']}}</label>
                        <label class="fs-6 text-success fst-italic fw-semibold">{{$plan['place']}}</label>
                    </div>
                    <hr class="mb-4">
                    <div class="d-flex flex-column mb-3">
                        <label class="fs-6 text-primary fst-italic fw-semibold">{{$plan['start_date']}}</label>
                        <label class="fs-6 text-danger fst-italic fw-semibold">{{$plan['end_date']}}</label>
                    </div>
                    <hr class="mb-4 ">
                    <a href="{{url('/check-itineraries/'.$plan['id'])}}" class="main_btn rounded-pill text-decoration-none">Check My Itinerary</a>
                        <form id="deletePlace-form" action="{{ url('/delete-place') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="id" value="{{$plan['id']}}">
                        </form>

                        <a href="#" onclick="event.preventDefault(); document.getElementById('deletePlace-form').submit();" class="btn btn-danger fs-6 mt-2 rounded-pill text-decoration-none">
                            Delete Place
                        </a>
                </div>
                    @endforeach
                        @empty($plans)
                            <div class="text-center fs-2 mx-auto">No Travel Place Yet!</div>
                        @endempty
            </div>

        </div>
    </div>
@endsection
