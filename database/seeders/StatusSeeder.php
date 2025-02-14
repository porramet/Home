<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $status = [
            ['status_name' => 'Available', 'availability_status' => 'available'],
            ['status_name' => 'Not Available', 'availability_status' => 'unavailable'],
        ];

        foreach ($status as $status) {
            Status::create($status);
        }
    }
}
