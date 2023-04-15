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
                                        <a href="#" class="text-decoration-none">
                                            <button class="main_btn allCenter fs-2 ">
                                                <label class="me-3 fs-5 fw-light">
                                                    Get Started
                                                </label>
                                            </button>
                                        </a>
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
    <div class="hero d-flex justify-content-center align-items-center">
        <div class="container d-flex  align-items-center d-flex flex-column">
            <h3 class="section-title">Explore Our Features</h3>
            <div class="features mt-4  row">
                <div class="col-12 d-flex flex-row flex-wrap">

                    <a href="#" class="text-decoration-none ms-3 mt-3">
                        <button class="main_btn allCenter">
                            <label class="me-3 fs-6 fw-light">
                               Blogs
                            </label>
                        </button>
                    </a>

                    <a href="#" class="text-decoration-none ms-3 mt-3">
                        <button class="main_btn allCenter">
                            <label class="me-3 fs-6 fw-light">
                                News
                            </label>
                        </button>
                    </a>

                    <a href="#" class="text-decoration-none ms-3 mt-3">
                        <button class="main_btn allCenter">
                            <label class="me-3 fs-6 fw-light">
                                Budget Planner
                            </label>
                        </button>
                    </a>

                    <a href="#" class="text-decoration-none ms-3 mt-3">
                        <button class="main_btn allCenter">
                            <label class="me-3 fs-6 fw-light">
                                My Journal
                            </label>
                        </button>
                    </a>

                    <a href="#" class="text-decoration-none ms-3 mt-3">
                        <button class="main_btn allCenter">
                            <label class="me-3 fs-6 fw-light">
                                Locations
                            </label>
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>

    {{--Blogs--}}
    <div class="hero">
        <div class="container d-flex justify-content-center flex-column">
            <div class="d-flex justify-content-center align-items-center ">
                <h3 class="section-title mb-4">Travel Blogs</h3>
            </div>
                <div class="cards d-flex justify-content-center flex-row flex-wrap">
                @foreach($articles as $article)
                    <div class="card ms-3 mt-4" style="max-width: 250px;">
                        <div class="card-header rounded-top p-0">
                            <img class="rounded-top" style="width: 100%" src="{{$article['urlToImage']}}" alt="">
                        </div>
                        <div class="card-body justify-content-between d-flex flex-column justify-content-between" style="min-height: 300px">
                            <label class="fw-bold">
                                {{$article['title']}}
                            </label>
                            <label class="mt-3">
                                {{\Illuminate\Support\Str::limit($article['description'], 60, '...')}}
                            </label>
                            <a href="{{$article['url']}}" class="text-decoration-none mt-4">
                                <button class="main_btn d-flex mx-auto justify-content-center align-items-center ">
                                    <label class="me-3 fs-6 fw-light">
                                        Read More
                                    </label>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-4">
                <div class="col-12 my-3 d-flex justify-content-end">
                    <a href="{{url('/blogs')}}" class="text-decoration-none">
                        <button class="main_btn d-flex justify-content-center fs-2">
                            <label class="me-3 fs-5 fw-light">
                                More Blogs
                            </label>
                            <div class="fs-6">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
