<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Building;

class BookingController extends Controller
{
    public function index()
    {
        // Fetch the list of buildings and rooms from the database
        $buildings = Building::with('rooms')->get();
        $rooms = Room::with('status')->get();

        // Pass the buildings and rooms to the booking view
        return view('booking', compact('buildings', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'booking_start' => 'required|date|after:now',
            'booking_end' => 'required|date|after:booking_start',
            'reason' => 'required|string|max:255',
            'terms' => 'accepted'
        ]);

        // Handle authenticated vs external users
        $bookingData = [
            'room_id' => $request->room_id,
            'booking_start' => $request->booking_start,
            'booking_end' => $request->booking_end,
            'reason' => $request->reason,
            'status_id' => 1, // Default status: Pending
            'payment_status' => 'unpaid'
        ];

        if (auth()->check()) {
            $bookingData['user_id'] = auth()->id();
            $bookingData['is_external'] = false;
        } else {
            $request->validate([
                'external_name' => 'required|string|max:255',
                'external_email' => 'required|email|max:255',
                'external_phone' => 'required|string|max:20'
            ]);
            
            $bookingData['external_name'] = $request->external_name;
            $bookingData['external_email'] = $request->external_email;
            $bookingData['external_phone'] = $request->external_phone;
            $bookingData['is_external'] = true;
        }

        // Create the booking
        Booking::create($bookingData);

<<<<<<< HEAD
        return redirect()->route('booking')->with('success', 'Your booking request has been submitted successfully!');
=======
        return redirect('/desired-url')->with('success', 'Your booking request has been submitted successfully!');
>>>>>>> 9aec6b7 (Initial commit)
    }

    public function showBookingForm($id)
    {
        $room = Room::findOrFail($id);
<<<<<<< HEAD
        return view('booking-form', compact('room'));
    }
=======
        $buildings = Building::all(); // Fetch all buildings
        return view('partials.booking-form', compact('room', 'buildings')); // Pass buildings to the view
    }

>>>>>>> 9aec6b7 (Initial commit)
}
