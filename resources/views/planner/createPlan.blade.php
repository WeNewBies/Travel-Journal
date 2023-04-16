@extends('plans')

@section('content')
    <div class="hero">
        <div class="container d-flex flex-column my-5">
            {{--Header section--}}
            <div class="d-flex flex-column align-items-center mb-3">
                <h2 class="section-title fs-1">Add Trip</h2>
            </div>
            <form method="POST" action="{{url('/store-plan')}}" enctype="multipart/form-data" class="d-flex flex-column row mb-4">
                @csrf
                <div class="my-3 col-10 col-md-5 mx-auto">
                    <label for="tripName" class="form-label fw-semibold text-warning">Trip Name:</label>
                    <input type="text" class="form-control text-secondary @error('tripName') is-invalid @enderror" name="tripName"  required autofocus>
                    @error('tripName')
                    <span class="invalid-feedback fs-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="my-3 col-10 col-md-5 mx-auto">
                    <label for="place" class="form-label fw-semibold text-warning">City/Country:</label>
                    <input type="text" class="form-control text-secondary @error('place') is-invalid @enderror" name="place"  required  autofocus>
                    @error('tripName')
                    <span class="invalid-feedback fs-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="my-3 col-10 col-md-5 mx-auto">
                    <div class="form-group">
                        <label for="start_datepicker" class="form-label fw-semibold text-warning">Start date:</label>
                        <input type="text" class="form-control text-secondary" id="start_datepicker" name="start_datepicker" required>
                    </div>
                    <div class="form-group">
                        <label for="end_datepicker" class="form-label fw-semibold text-warning">End date:</label>
                        <input type="text" class="form-control text-secondary" id="end_datepicker" name="end_datepicker" required>
                    </div>
                </div>

                <div class="my-3 col-10 col-md-5 mx-auto">
                        <label for="image" class="form-label fw-semibold text-warning">Image:</label>
                        <input type="file" class="form-control text-secondary" name="image">
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
        $(function() {
        // Initialize the start datepicker
        $('#start_datepicker').datepicker({
        format: 'yyyy-mm-dd', // Set the date format
        startDate: new Date(), // Set the minimum date to today's date
        autoclose: true, // Close the datepicker when a date is selected
        });

        // Initialize the end datepicker
        $('#end_datepicker').datepicker({
        format: 'yyyy-mm-dd', // Set the date format
        startDate: new Date(), // Set the minimum date to today's date
        autoclose: true, // Close the datepicker when a date is selected
        });

        // Set the start date's maximum date to the end date
        $('#start_datepicker').on('changeDate', function(e) {
        $('#end_datepicker').datepicker('setStartDate', e.date);
        });

        // Set the end date's minimum date to the start date
        $('#end_datepicker').on('changeDate', function(e) {
        $('#start_datepicker').datepicker('setEndDate', e.date);
        });
        });
    </script>
@endsection
