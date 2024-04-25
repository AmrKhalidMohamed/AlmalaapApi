@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Bookings Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('customersview.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Customer name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6">
                            <label>Customer phone number</label>
                            <input type="number" class="form-control" name="phone_number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>

                    </div>
                </form>
            </div>
            <div class="form-area">
                <form method="POST" action="{{ route('bookingsview.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Customer ID</label>
                            <input type="number" class="form-control" name="customer_id" value="{{ $latestCustomerId ?? '' }}">
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
            <div id='calendar' class="mt-3"></div>

            @php
                $today = new DateTime();
                $todayFormatted = $today->format('Y-m-d');
                $events = [];
                $colors = ['#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#A833FF']; // Add more colors as needed
            @endphp

            @foreach($bookings as $index => $booking)
                @php
                    $start_datetime = date("Y-m-d", strtotime($booking->booking_date)) . 'T' . date("H:i:s", strtotime($booking->start_time));
                    $end_datetime = date("Y-m-d", strtotime($booking->booking_date)) . 'T' . date("H:i:s", strtotime($booking->end_time));
                @endphp
                @php
                    $events[] = [
                        'title' => 'Room ' . $booking->room_id,
                        'start' => $start_datetime,
                        'end' => $end_datetime,
                        'resourceId' => $booking->room_id,
                        'color' => $colors[$index % count($colors)] // Assign a color from the list based on the room's index
                    ];
                @endphp
            @endforeach

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                        initialView: 'resourceTimeline',
                        slotDuration: '00:30:00',
                        slotLabelInterval: '01:00:00',
                        allDaySlot: false,
                        resourceAreaWidth: '10%',
                        contentHeight: 'auto',
                        nowIndicator: 'true',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'resourceTimeline,timeGridWeek,dayGridMonth'
                        },
                        resources: [
                            @foreach($bookings as $booking)
                                { id: '{{ $booking->room_id }}', title: 'Room {{ $booking->room_id }}',},
                            @endforeach
                        ],
                        events: {!! json_encode($events) !!}
                    });

                    calendar.render();
                });
            </script>

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
    .form-area {
        padding: 20px;
        margin-top: 20px;
        background-color: #b3e5fc;
    }

    .booking-block {
        display: block;
        width: 100%;
        height: 50px;
        background-color: #007BFF;
        position: relative;
        margin-top: 5px;
    }
</style>
@endpush



