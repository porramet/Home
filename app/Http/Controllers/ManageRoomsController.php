<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Building;
use App\Models\Status;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


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

    private function generateRoomId($buildingId)
    {
        // Get the maximum room_id for this building
        $maxRoomId = Room::where('building_id', $buildingId)
                        ->max('room_id');
        
        // Return next available room_id
        return $maxRoomId ? $maxRoomId + 1 : 1;
    }

    public function store(Request $request)
    {
        try {
            // Log incoming request data
            Log::info('Room creation request data:', $request->all());

            // Validate the request
            $validated = $request->validate([
                'building_id' => 'required|exists:buildings,building_id',
                'room_name' => 'required|string|max:255',
                'capacity' => 'required|integer|min:1',
                'class' => 'required|string|max:255',
                'room_details' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'service_rates' => 'required|numeric|min:0',
            ]);

            // Log successful validation
            Log::info('Room data validated successfully:', $validated);

            // Create new room
            $room = new Room();
            $room->building_id = $validated['building_id'];
            $room->room_id = $this->generateRoomId($validated['building_id']);
            $room->room_name = $validated['room_name'];
            $room->capacity = $validated['capacity'];
            $room->class = $validated['class'];
            $room->room_details = $validated['room_details'];
            $room->service_rates = $validated['service_rates'];
            $room->status_id = 2; // Set status to empty room

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('room_images', 'public');
                $room->image = $imagePath;
                Log::info('Room image uploaded:', ['path' => $imagePath]);
            }

            // Save the room
            $room->save();
            Log::info('Room created successfully:', $room->toArray());

            return redirect()->back()->with('success', 'Room created successfully');
        } catch (\Exception $e) {
            Log::error('Error creating room: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->back()->with('error', 'Failed to create room. Please try again.');
        }
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

    public function editRoom($id)
    {
        $room = Room::with(['building', 'status'])->findOrFail($id);
        return response()->json($room);
    }

    public function deleteRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->back()->with('success', 'Room deleted successfully');
    }
}
