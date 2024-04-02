@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Employee Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('bookingsview.update', $booking->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>Customer ID</label>
                            <input type="text" class="form-control" name="customer_id" value="{{ $booking->customer_id }}">
                        </div>
                        <div class="col-md-6">
                            <label>room ID</label>
                            <input type="text" class="form-control" name="room_id" value="{{ $booking->room_id }}">
                        </div>
                        <div class="col-md-12">
                            <label>Booking date</label>
                            <input type="date" class="form-control" name="booking_date" value="{{ $booking->booking_date }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Start time</label>
                            <input type="time" class="form-control" name="start_time" value="{{ $booking->start_time }}">
                        </div>
                        <div class="col-md-6">
                            <label>End time</label>
                            <input type="time" class="form-control" name="end_time" value="{{ $booking->end_time }}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>

                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#b3e5fc;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush
