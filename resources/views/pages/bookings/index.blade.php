@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Bookings Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('bookingsview.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Customer ID</label>
                            <input type="number" class="form-control" name="customer_id">
                        </div>
                        <div class="col-md-6">
                            <label>Room ID</label>
                            <input type="number" class="form-control" name="room_id">
                        </div>
                         <div class="col-md-12">
                            <label>Booking date</label>
                            <input type="date" class="form-control" name="booking_date">
                        </div>
                        <div class="col-md-6">
                            <label>Start time</label>
                            <input type="time" class="form-control" name="start_time">
                        </div>
                        <div class="col-md-6">
                            <label>End time</label>
                            <input type="time" class="form-control" name="end_time">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>

                    </div>
                </form>
            </div>

                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Room ID</th>
                        <th scope="col">Booking date</th>
                        <th scope="col">Start time</th>
                        <th scope="col">End time</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $bookings as $key => $booking )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">
                                {{ $booking->customer_id }}
                                <a href="{{ route('customersview.edit', ['customer' => $booking->customer_id]) }}">show</a>
                            </td>
                            <td scope="col">{{ $booking->room_id }}</td>
                            <td scope="col">{{ $booking->booking_date }}</td>
                            <td scope="col">{{ $booking->start_time }}</td>
                            <td scope="col">{{ $booking->end_time }}</td>
                            <td scope="col">

                            <a href="{{  route('bookingsview.edit', $booking->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>

                            <form action="{{ route('bookingsview.destroy', $booking->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>

                          </tr>

                        @endforeach




                    </tbody>
                  </table>
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
