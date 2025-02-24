@php
    $isAuthenticated = auth()->check();
@endphp

<div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-xl font-semibold mb-4">แบบฟอร์มการจองห้อง</h3>
    <form id="bookingForm" method="POST" action="{{ route('bookings.store') }}">
        @csrf
        
        <!-- User Information -->
        @if($isAuthenticated)
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        @else
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="external_name">
                    ชื่อ-นามสกุล
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="external_name" name="external_name" type="text" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="external_email">
                    อีเมล
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="external_email" name="external_email" type="email" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="external_phone">
                    เบอร์โทรศัพท์
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="external_phone" name="external_phone" type="tel" required>
            </div>
        @endif

        <!-- Booking Details -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="booking_start">
                วันที่เริ่มต้น
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                   id="booking_start" name="booking_start" type="datetime-local" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="booking_end">
                วันที่สิ้นสุด
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                   id="booking_end" name="booking_end" type="datetime-local" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="reason">
                วัตถุประสงค์การใช้งาน
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                      id="reason" name="reason" rows="3" required></textarea>
        </div>

        <!-- Terms and Conditions -->
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="terms" class="form-checkbox" required>
                <span class="ml-2">ฉันยอมรับข้อกำหนดและเงื่อนไขการใช้งาน</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                    type="submit">
                ส่งคำขอจอง
            </button>
        </div>
    </form>
</div>
