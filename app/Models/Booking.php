<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'external_name',
        'external_email',
        'external_phone',
        'building_id',
        'room_id',
        'booking_start',
        'booking_end',
        'status_id',
        'reason',
        'total_price',
        'payment_status',
        'is_external',
        'fullname',
        'phone',
        'email',
        'status',
        'department',
        'attendees',
        'purpose'

    ];

}
