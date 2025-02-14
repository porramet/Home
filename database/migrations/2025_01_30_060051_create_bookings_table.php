<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // รหัสการจอง
            $table->unsignedBigInteger('user_id'); // รหัสผู้ใช้ที่ทำการจอง
            $table->unsignedBigInteger('building_id'); // รหัสอาคาร
            $table->unsignedBigInteger('room_id'); // รหัสห้อง
            $table->dateTime('booking_start'); // เวลาเริ่มต้นการจอง
            $table->dateTime('booking_end'); // เวลาสิ้นสุดการจอง
            $table->enum('status', ['pending', 'confirmed', 'cancelled']); // สถานะการจอง
            $table->timestamps(); // เวลาที่บันทึก
        
            // เชื่อมโยงกับผู้ใช้
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // เชื่อมโยงกับตาราง rooms
            $table->foreign(['building_id', 'room_id'])->references(['building_id', 'room_id'])->on('rooms')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
