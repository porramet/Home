<!-- resources/views/booking.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Booking Page -->
    @include('hero2')
    <section class="py-16">
        <div class="container mx-auto px-4">
            <!-- Booking Form -->
            <div class="bg-gray-200 py-16">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl font-bold text-blue-600">ปฏิทินการจองห้อง</h2>
                    <form action="{{ route('booking.create') }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <label for="room" class="block text-gray-700">เลือกห้อง:</label>
                            <select id="room" name="room" class="mt-2 p-2 border rounded">
                                <option value="">-- เลือกห้อง --</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="date" class="block text-gray-700">วันที่:</label>
                            <input type="date" id="date" name="date" class="mt-2 p-2 border rounded" required>
                        </div>
                        <div class="mt-4">
                            <label for="time" class="block text-gray-700">เวลา:</label>
                            <input type="time" id="time" name="time" class="mt-2 p-2 border rounded" required>
                        </div>
                        <div class="mt-8">
                            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">จองห้อง</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Additional content for building categories and frequently used rooms -->
            <!-- ... -->
        </div>
    </section>
@endsection
