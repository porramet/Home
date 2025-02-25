<<<<<<< HEAD
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
=======
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 mt-14">
        <!-- Progress Bar -->
        <div class="flex items-center justify-center space-x-4 py-4">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center">1</div>
                <span class="text-blue-600">ข้อมูลผู้จอง</span>
            </div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-check"></i>
                </div>
                <span class="text-gray-600">ยืนยันการจองแล้ว!</span>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2">
                <!-- Room Information -->
                <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-700">ข้อมูลห้อง:</h2>
                    <div class="border-b-2 border-gray-300 mb-6"></div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <img alt="Standard Twin Room with two beds, a window, and a small table" class="rounded-lg shadow-lg" height="200" src="https://storage.googleapis.com/a1aa/image/pNmDq_9xFiPzgDvQmKDre9YPVJ5CFIco7uwZsfnWHbM.jpg" width="200">
                        </div>
                        <div class="ml-8 text-gray-800">
                            <h2 class="text-3xl font-bold mb-4">ชื่อห้อง</h2>
                            <div class="flex items-center text-lg mb-4">
                                <span class="mr-4 font-semibold">ชั้น:</span>
                                <span class="text-gray-600">2</span>
                            </div>
                            <div class="flex items-center text-lg mb-4">
                                <span class="mr-4 font-semibold">รายละเอียด:</span>
                                <span class="text-gray-600">ห้องมาตรฐานเตียงแฝด</span>
                            </div>
                            <div class="flex items-center text-lg mb-4">
                                <span class="mr-4 font-semibold">ความจุ:</span>
                                <span class="text-gray-600">2 คน</span>
                            </div>
                            <p class="text-lg mb-4">
                                ราคา: <span class="font-bold text-blue-600">THB 1,500</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Main Guest Information -->
                <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-700">ข้อมูลผู้จอง <span class="text-red-600">*</span></h2>
                    <div class="p-4">
                        <form id="bookingForm" class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">ชื่อ-นามสกุล</label>
                                    <input type="text" name="fullname" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">หมายเลขโทรศัพท์</label>
                                    <input type="tel" name="phone" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">อีเมล</label>
                                    <input type="email" name="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">สถานะ</label>
                                    <div class="mt-2 space-y-2">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="status" value="อาจารย์" class="rounded border-gray-300 text-indigo-600 shadow-sm" required>
                                            <span class="ml-2">อาจารย์</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="status" value="บุคลากร" class="rounded border-gray-300 text-indigo-600 shadow-sm" required>
                                            <span class="ml-2">บุคลากร</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="status" value="บุคคลภายนอก" class="rounded border-gray-300 text-indigo-600 shadow-sm" required>
                                            <span class="ml-2">บุคคลภายนอก</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">หน่วยงาน (ถ้ามี)</label>
                                <input type="text" name="department" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">วันที่เริ่ม</label>
                                    <input type="datetime-local" name="start_time" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">วันที่สิ้นสุด</label>
                                    <input type="datetime-local" name="end_time" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">วัตถุประสงค์การใช้งาน</label>
                                <textarea name="purpose" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">จำนวนผู้เข้าร่วม</label>
                                <input type="number" name="attendees" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">อุปกรณ์เสริมที่ต้องการ</label>
                                <div class="mt-2 space-y-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="equipment[]" value="projector" class="rounded border-gray-300 text-indigo-600 shadow-sm">
                                        <span class="ml-2">โปรเจคเตอร์</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="equipment[]" value="microphone" class="rounded border-gray-300 text-indigo-600 shadow-sm">
                                        <span class="ml-2">ไมโครโฟน</span>
                                    </label>
                                    <input type="text" name="other_equipment" placeholder="ระบุอุปกรณ์อื่นๆ" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">ไฟล์เอกสารเพิ่มเติม</label>
                                <div class="mt-1 flex items-center">
                                    <label class="cursor-pointer flex items-center">
                                        <i class="fas fa-paperclip text-gray-500 text-xl"></i>
                                        <input type="file" name="attachment" class="hidden">
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" onclick="showBuildings()">
                                    ยกเลิก
                                </button>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    ยืนยันการจอง
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Booking Summary -->
            <div class="space-y-4">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
                    <div class="bg-blue-100 p-6 rounded-lg mb-6">
                        <h2 class="text-2xl font-semibold mb-4 text-gray-700">รายละเอียดการจอง</h2>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">เช็คอิน:</label>
                            <input type="text" id="checkin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="เลือกวันที่เช็คอิน">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">เช็คเอาท์:</label>
                            <input type="text" id="checkout" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="เลือกวันที่เช็คเอาท์">
                        </div>
                        <div>
                            <p class="font-semibold">ระยะเวลาเข้าพักทั้งหมด:</p>
                            <p>4 สัปดาห์</p>
                        </div>
                    </div>
                    <div class="bg-blue-100 p-6 rounded-lg">
                        <h2 class="text-2xl font-semibold mb-4 text-gray-700">สรุปราคาของท่าน</h2>
                        <div class="flex justify-between mb-4">
                            <p>ห้องมาตรฐานเตียงแฝด</p>
                            <p class="font-semibold">THB 17,849.74</p>
                        </div>
                        <div class="flex justify-between mb-4">
                            <p class="font-semibold">ราคา</p>
                            <p class="font-semibold">THB 17,849.74</p>
                        </div>
                        <p class="text-sm">(สำหรับ 28 คืน และผู้เข้าพักทุกท่าน)</p>
                        <p class="mt-2">รวมภาษีและค่าธรรมเนียมแล้ว</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
>>>>>>> 9aec6b7 (Initial commit)
