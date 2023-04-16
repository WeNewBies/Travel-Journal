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
                <h2 class="section-title mb-5 fs-1">{{$trip['tripName']}} / <label class="text-success">My Itinerary</label></h2>
                <div class="container d-flex flex-column align-items-center mb-3">
                    <img style="width: 100%;" src="{{asset('storage/travelPlan/'.$trip['image'])}}" alt="">
                </div>
                @if(isset($itinerary))
                    <a href="{{url('/edit-itinerary/'.$trip['id'])}}" class="main_btn my-4 text-decoration-none">
                        Edit Itinerary
                    </a>
                @else
                    <a href="{{url('/create-itinerary/'.$trip['id'])}}" class="main_btn my-4 text-decoration-none">
                        + Add Itinerary
                    </a>
                @endif

                @if($itinerary)
                    <form id="deleteItr-form" action="{{ url('/delete-itinerary') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="id" value="{{$trip['id']}}">
                    </form>

                    <a href="#" onclick="event.preventDefault(); document.getElementById('deleteItr-form').submit();" class="main_btn mb-4 bg-danger rounded-pill text-white text-decoration-none">
                        Delete Itinerary
                    </a>
                @endif


                <h2 class="mb-5 fs-6"> From: <label class="text-success">{{$trip['start_date']}}</label> to <label class="text-danger">{{$trip['end_date']}}</label></h2>

            </div>

            <hr>

            <div class="my-5 myTrips d-flex flex-row flex-wrap justify-content-center align-items-center">
                @php
                    $i=1;
                @endphp
                @if($itinerary)
                    @foreach(json_decode($itinerary->itinerary) as $item)
                        <div class="box shadow-sm border just border-1 p-3 rounded-3 ms-4 mt-4 d-flex flex-column">
                            <div class="d-flex flex-column mb-3 justify-content-center align-items-center" style="min-width: 200px">
                               <h3>Day {{$i++}}</h3>
                            </div>
                            <hr class="mb-4">
                            <div class="d-flex flex-column mb-3">
                                <label class="fs-6 text-danger fst-italic fw-semibold text-center">Task</label>
                                <label class="fs-3 text-success mt-2 fw-semibold text-center">{{$item}}</label>
                            </div>
                        </div>
                    @endforeach
                @endif
                @empty($itinerary)
                    <div class="text-center fs-2 mx-auto">No Travel Plan Yet!</div>
                @endempty
            </div>

        </div>
    </div>
@endsection
