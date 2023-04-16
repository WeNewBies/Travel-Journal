@extends('plans')

@section('content')
    <div class="hero">
        <div class="container d-flex flex-column my-5">
            {{--Header section--}}
            <div class="d-flex flex-column align-items-center mb-3">
                <h2 class="section-title fs-1">{{$trip['tripName']}} / <label class="text-info">Add Itinerary</label></h2>
            </div>

            <form method="POST" action="{{url('/store-itinerary')}}" >
                <div class="my-5 myTrips d-flex flex-row flex-wrap justify-content-center align-items-center">
                @csrf
                <input type="hidden" name="place_id" value="{{$trip['id']}}">
                @for($i=1; $i<=$days_between; $i++)
                    <div class="box shadow-sm border just border-1 p-3 rounded-3 ms-4 mt-4 d-flex flex-column" style="min-width: 300px">
                        <h4 class="text-center fs-5 fw-semibold">Day {{$i}}</h4>
                        <div class="d-flex flex-row flex-wrap justify-content-center align-items-center">
                            <label class="me-3">Task:</label>
                            <textarea name="tasks[]" class="border border-3 rounded-3 text-secondary" id="" cols="30" rows="4" required></textarea>
                        </div>
                    </div>
                @endfor
                </div>
                <div class="my-3 col-10 col-md-5 mx-auto d-flex align-items-center justify-content-center">
                    <button class="main_btn" type="submit">
                        Submit
                    </button>
                </div>
            </form>


        </div>
    </div>
@endsection
