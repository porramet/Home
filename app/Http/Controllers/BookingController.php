<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Ensure the Booking model is imported
use App\Models\Room; // Ensure the Room model is imported

class BookingController extends Controller
{
    public function index()
    {
        $rooms = Room::all(); // Fetch all available rooms
        return view('booking', compact('rooms'));
    }

    public function create(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'room' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Create a new booking record
        Booking::create([
            'room' => $request->room,
            'user' => auth()->user()->name, // Assuming the user is authenticated
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'confirmed', // Default status
        ]);

        // Redirect back with a success message
        return redirect()->route('booking')->with('success', 'Booking created successfully!');
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing booking
    }

    public function delete($id)
    {
        // Logic to delete a booking
    }
}
