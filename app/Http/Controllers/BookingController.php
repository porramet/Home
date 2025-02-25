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
        // ดึงข้อมูลอาคารและห้องพัก
        $buildings = Building::with('rooms')->get();
        $rooms = Room::with('status')->get();
        return view('booking', compact('buildings', 'rooms'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'room_id' => 'required|exists:rooms,id',
                'start_time' => 'required|date|after:now',
                'end_time' => 'required|date|after:start_time',
                'fullname' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'status' => 'required|string|max:50',
                'department' => 'nullable|string|max:255',
                'attendees' => 'required|integer|min:1',
                'purpose' => 'required|string|max:255',
                'equipment' => 'nullable|array',
                'attachment' => 'nullable|file|max:2048',
                'terms' => 'accepted'
            ]);
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('Booking validation failed: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->validator)->withInput();
        }

            \Log::info('Incoming request data: ', $request->all() + ['room_id' => $request->room_id]);

        
        $bookingData = [

            'room_id' => $request->room_id,
            'booking_start' => $request->start_time,
            'booking_end' => $request->end_time,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => $request->status,
            'department' => $request->department,
            'attendees' => $request->attendees,
            'purpose' => $request->purpose,
            'status_id' => 1, // Pending
            'payment_status' => 'unpaid'
        ];

        try {
            Booking::create($bookingData);
            return redirect()->route('bookings.show', ['id' => $bookingData['room_id']])->with('success', 'จองห้องสำเร็จ!');


        } catch (\Exception $e) {
            // Log the error message
            \Log::error('Booking creation failed: ' . $e->getMessage() . ' - Request data: ' . json_encode($request->all()));

            return redirect()->back()->with('error', 'ไม่สามารถบันทึกการจองได้')->withInput();
        }
    }

        
    

    public function showBookingForm($id)
    {
        $rooms = Room::all();
        $room = Room::findOrFail($id);
        return view('partials.booking-form', compact('room'));
    }
}
