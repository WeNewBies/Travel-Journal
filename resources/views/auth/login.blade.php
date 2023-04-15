@extends('layouts.app')

@section('content')


    <div class="container my-5">
        <div class="row d-flex flex-row">
                <div id="carouselSlider" class="col-5 mx-auto carousel slide col d-none d-md-block" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active c-item">
                            <img src="https://imgs.search.brave.com/ToRVheIVFOHdWRebW6v6BriMZf_slwrqoAXvU-I62CY/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly90aGV3/b3dzdHlsZS5jb20v/d3AtY29udGVudC91/cGxvYWRzLzIwMTUv/MDEvbmF0dXJlLWlt/YWdlcy4uanBn" class="d-block w-100 c-img" alt="Tour1">
                        </div>
                        <div class="carousel-item c-item">
                            <img src="https://imgs.search.brave.com/oSBbiSRQWESLXT7dvYa2k3wdxoNOTNpg5MWjni2rHhQ/rs:fit:1200:1200:1/g:ce/aHR0cDovL3RoZXdv/d3N0eWxlLmNvbS93/cC1jb250ZW50L3Vw/bG9hZHMvMjAxNS8w/MS9uYXR1cmUtaW1h/Z2VzLmpwZw" class="d-block w-100 c-img" alt="Tour2">
                        </div>
                        <div class="carousel-item c-item">
                            <img src="https://imgs.search.brave.com/zk8p_nA_zIudLfosPLsYcWByz7LIdiZ0oGXz9HiX1jk/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9qb29p/bm4uY29tL2ltYWdl/cy9uYXR1cmUtMzE5/LmpwZw" class="d-block w-100 c-img" alt="Tour3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="row col-10 col-md-5 mx-auto">
                    <h1 class="text-center py-2" style="color: #f8b600">WeNewBies</h1>
                    <h2 class="text-center py-4 fw-light text-secondary">WELCOME AGAIN</h2>

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="mb-3">
                            <label for="Username" class="form-label fw-semibold text-warning">Email:</label>
                            <input id="email" type="email" class="form-control text-secondary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="abc@gmail.com">
                            @error('email')
                            <span class="invalid-feedback fs-6" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label fw-semibold text-warning">Password:</label>
                            <input id="password" type="password" class="form-control  text-secondary @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="*******">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input  rounded-circle" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="text-center my-3">
                            <button type="submit" class="main_btn">
                                <label class="fs-6" type="submit">Login</label>
                                <i class="fa fa-angle-right fs-6" type="submit" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                    @if (Route::has('password.request'))
                        <a class="text-primary text-center text-decoration-none mb-2" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <a class="text-primary text-center text-decoration-none mb-3" href="{{ route('register') }}">
                        Need a Account?
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
