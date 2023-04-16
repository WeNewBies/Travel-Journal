@extends('layouts.app')

@section('content')

    {{--Introduction--}}
    <div class="hero">
        <div class="container bg-white" style="">
            <div class="row container-fluid w-100 mt-5 mt-md-0">
                <div class="col-md-6 h-100 mt-md-5">
                    <div class=" row align-items-center w-100 ">
                        <div class=" col-lg-10">
                            <div class="intro-wrap d-flex flex-column align-items-start justify-content-between"
                                 style="min-height: 70vh">
                                <h1 class="mb-5 white_color">
                                    Create your first itinerary and budget to start planning your dream trip today!
                                </h1>

                                <div class="row ">
                                    <div class="col-12 my-3">
                                        <button onclick="scrollToFeatures()" class="main_btn d-flex justify-content-center me-3 fs-5 fw-light align-items-center ">
                                            Get Started
                                            <i class="fa fa-angle-right fs-4 ms-2" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- header block --}}
                <div class="col-12 header-block d-block d-md-none">
                </div>
                {{-- header right --}}
                <div class="col-lg-6 col-md-6 header-left d-none d-md-block">
                    <div class="" style="position: absolute;">
                        <img class="img-fluid mh-100" style="height: 87vh"
                             src="{{asset('assets/images/banner.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Features--}}
    <div id="features-section" class="hero d-flex justify-content-center align-items-center">
        <div class="container d-flex  align-items-center d-flex flex-column">
            <h3 class="section-title">Explore Our Features</h3>
            <div class="features mt-4  row">
                <div class="col-12 d-flex flex-row flex-wrap">

                    <a href="{{url('/blogs')}}" class="text-decoration-none ms-3 mt-3">
                        <button class="main_btn me-3 fs-6 fw-light">
                               Blogs
                        </button>
                    </a>

                    <a href="{{url('/planner')}}" class="text-decoration-none ms-3 mt-3">
                        <button class="main_btn me-3 fs-6 fw-light">
                            Trip Planner
                        </button>
                    </a>

                    <a href="{{url('/journal')}}" class="text-decoration-none ms-3 mt-3">
                        <button class="main_btn me-3 fs-6 fw-light">
                            My Journal
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{--Blogs--}}
    @if(isset($articles))
        <x-frontend.blogs :data="$articles" />
    @endif
@endsection

@section('scripts')
    <script>
        function scrollToFeatures() {
            // Get the position of the features section relative to the top of the page
            const featuresSection = document.getElementById('features-section');
            const position = featuresSection.getBoundingClientRect().top + window.pageYOffset;

            // Calculate the distance to scroll
            const distance = position - window.pageYOffset;

            // Set the duration of the scrolling animation
            const duration = 1000; // 1000 milliseconds = 1 second

            // Calculate the number of frames for the animation
            const frames = Math.ceil(duration / 16); // 16 milliseconds per frame

            // Calculate the distance to scroll for each frame
            const distancePerFrame = distance / frames;

            // Scroll to the features section
            let currentFrame = 0;
            const scrollInterval = setInterval(() => {
                if (currentFrame < frames) {
                    window.scrollBy(0, distancePerFrame);
                    currentFrame++;
                } else {
                    clearInterval(scrollInterval);
                }
            }, 16); // 16 milliseconds per frame
        }


    </script>
@endsection
