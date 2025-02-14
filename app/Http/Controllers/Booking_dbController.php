<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Ensure the Booking model is imported

class Booking_dbController extends Controller
{
    public function index()
    {
        // Fetch all bookings and pass them to the view
        $bookings = Booking::all();
        return view('dashboard.booking_db', compact('bookings'));
    }

    public function fetchBookings()
    {
        // Logic to fetch booking data from the database
        return Booking::all();
    }

    public function displayBookings()
    {
        // Logic to format and display booking data
    }
}
