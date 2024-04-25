<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;

class CalendarController extends Controller
{
    public function index()
    {
        $bookings = Bookings::all(); // Fetch booked rooms from the database
        return view('calendar.index', compact('bookings'));
    }
}
