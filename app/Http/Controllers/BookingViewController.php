<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Rooms;
use Illuminate\Http\Request;

class BookingViewController extends Controller
{

    protected $booking;
    protected $customer;

    public function __construct()
    {
        $this->booking = new Bookings();
        $this->customer = new Customers();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response['bookings'] = $this->booking->all();
        $response['latestCustomerId'] = $this->customer->latest()->first()->id ?? null;
        $response['rooms'] = Rooms::all();
        return view('pages.bookings.index')->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Create a new booking with the latest customer_id
        $bookingData = $request->all();

        $this->booking->create($bookingData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookings $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['booking'] = $this->booking->find($id);
        return view('pages.bookings.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = $this->booking->find($id);
        $booking->update(array_merge($booking->toArray(), $request->toArray()));
        return redirect('bookingsview');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = $this->booking->find($id);
        $booking->delete();
        return redirect('bookingsview');
    }
}
