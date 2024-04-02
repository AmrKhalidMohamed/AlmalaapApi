<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Http\Resources\BookingResource;
use App\Http\Requests\StoreBookingRequest;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookingResource::collection(Bookings::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = Bookings::create([
            'customer_id' => $request->customer_id,
            'room_id' => $request->room_id,
            'booking_date' => $request->booking_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
        return new BookingResource($booking);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookings $booking)
    {
        return new BookingResource($booking);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bookings $booking)
    {
        $booking->update([
            'customer_id' => $request->customer_id,
            'room_id' => $request->room_id,
            'booking_date' => $request->booking_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return new BookingResource($booking);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookings $booking)
    {
        return $booking->delete();
    }
}
