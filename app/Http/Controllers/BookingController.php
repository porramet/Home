<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Ensure the Booking model is imported
use App\Models\Room; // Ensure the Room model is imported

class BookingController extends Controller
{
    public function index()
    {
        // Fetch the list of rooms from the database
        $rooms = Room::with('status')->get(); // Retrieve all rooms with status


        // Pass the rooms to the booking view
        return view('booking', compact('rooms'));
    }

    public function bookRoom($id)
    {
        // Logic to handle the booking process
        $room = Room::find($id);
        
        if (!$room) {
            return redirect()->back()->with('error', 'Room not found.');
        }

        // Here you would typically handle the booking logic, such as creating a booking record
        Booking::create([
            'room_id' => $room->id,
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'booking_date' => now(), // Example booking date
        ]);

        return redirect()->route('booking')->with('success', 'Room booked successfully!');
    }

}
