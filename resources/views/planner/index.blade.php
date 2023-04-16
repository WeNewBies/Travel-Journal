@extends('plans')

@section('content')
    <div class="hero">
        <div class="container d-flex flex-column my-5">
            {{--Header section--}}
            <div class="d-flex flex-column align-items-start">
                <h2 class="section-title fs-1">My Trips</h2>
                <a href="{{url('/create-plan')}}" class="main_btn my-4 text-decoration-none">
                + Add Trip
                </a>
            </div>


        </div>
    </div>
@endsection
