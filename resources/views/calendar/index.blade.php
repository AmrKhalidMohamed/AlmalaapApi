@extends('layouts.app')

@section('content')

<div id='calendar'></div>

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
            nowIndicator: 'true',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridDay,timeGridWeek,dayGridMonth'
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

@endsection
