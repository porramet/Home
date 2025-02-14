<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Building;
use App\Models\Status;
use Illuminate\Support\Facades\Log;

class ManageRoomsController extends Controller
{
    public function index()
    {
        // Fetch all rooms and their associated buildings
        $rooms = Room::with('building')->get();  
        $buildings = Building::all();
        $status = Status::all();
        
        return view('dashboard.manage_rooms', compact('rooms', 'buildings', 'status'));
    }

    public function showRooms($buildingId)
    {
        $rooms = Room::with(['building', 'status'])->where('building_id', $buildingId)->get();
        $building = Building::findOrFail($buildingId);
        $buildings = Building::all();
        $status = Status::all();
        
        return view('dashboard.rooms', compact('rooms', 'building', 'buildings', 'status'));
    }

    public function fetchRooms()
    {
        return Room::all();
    }

    public function store(Request $request)
    {
        Log::info('Incoming request data:', $request->all());

        // Validate the incoming request
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status_id' => 'required|exists:status,status_id',
            'building_id' => 'required|exists:buildings,building_id',
            'class' => 'required|string|max:255',
            'room_details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'service_rates' => 'required|numeric|min:0',
        ]);

        // Create a new room record without setting room_id
        $room = Room::create([
            'room_name' => $request->room_name,
            'capacity' => $request->capacity,
            'status_id' => $request->status_id,
            'building_id' => $request->building_id,
            'class' => $request->class,
            'room_details' => $request->room_details,
            'service_rates' => $request->service_rates,
            // 'room_id' will be handled by the database
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room_images', 'public');
            $room->image = $imagePath;
            $room->save();
        }

        return redirect()->route('manage_rooms.index')->with('success', 'Room created successfully!');
    }

    public function update(Request $request, $buildingId, $roomId)
    {
        // Validate the incoming request
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status_id' => 'required|exists:status,status_id',
            'class' => 'required|string|max:255',
            'room_details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'service_rates' => 'required|numeric|min:0',
        ]);

        // Find the room by building_id and room_id
        $room = Room::where('building_id', $buildingId)->where('room_id', $roomId)->firstOrFail();

        // Update the room record
        $room->update($request->all());

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room_images', 'public');
            $room->image = $imagePath;
            $room->save();
        }

        return redirect()->route('manage_rooms.index')->with('success', 'Room updated successfully!');
    }
}
