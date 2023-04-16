@extends('plans')

@section('content')
    <div class="hero">
        <div class="container d-flex flex-column my-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif
            {{--Header section--}}
            <div class="d-flex flex-column align-items-center mb-3">
                <h2 class="section-title fs-1">Add Trip</h2>
            </div>
            <form method="POST" action="{{url('/store-journal')}}" enctype="multipart/form-data" class="d-flex flex-column row mb-4">
                @csrf
                <div class="my-3 col-10 col-md-5 mx-auto">
                    <label for="title" class="form-label fw-semibold text-warning">Title:</label>
                    <input type="text" class="form-control text-secondary @error('tripName') is-invalid @enderror" name="title"  required autofocus>
                    @error('title')
                    <span class="invalid-feedback fs-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="my-3 col-10 col-md-8 mx-auto">
                    <label for="place" class="form-label fw-semibold text-warning">Journal:</label>
                    <textarea id="summernote" name="journal" required></textarea>
                    @error('journal')
                    <span class="invalid-feedback fs-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#summernote").summernote({
                height: 250
            });
        });
    </script>
@endsection
