<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusSeeder::class,
            UserSeeder::class,
            BuildingSeeder::class,
            RoomSeeder::class,
<<<<<<< HEAD
            BookingSeeder::class,
            BookingHistorySeeder::class
        ]);

    }
}
=======

        ]);
    }
}
>>>>>>> 9aec6b7 (Initial commit)
