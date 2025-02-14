<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Building;

class BuildingSeeder extends Seeder
{
    public function run()
    {
        $buildings = [
            ['building_name' => 'อาคาร A', 'citizen_save' => 'สมชาย ใจดี'],
            ['building_name' => 'อาคาร B', 'citizen_save' => 'สมหญิง ใจดี'],
            ['building_name' => 'อาคาร C', 'citizen_save' => 'สมปอง ใจดี'],
        ];

        foreach ($buildings as $building) {
            Building::create($building);
        }
    }
}
