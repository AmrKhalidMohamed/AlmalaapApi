<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Rooms;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $numberOfRooms = 5;

        $capacity = [11, 7, 7, 7, 10];

        for ($i = 0; $i < $numberOfRooms; $i++) {
            Rooms::create([
                'room_number' => 'Room ' . $i+1 ,
                'capacity' => $capacity[$i],
                'description' => $faker->paragraph,
                'price' => 100,
                'branch' => $faker->numberBetween(1,2)
            ]);
        }
    }
}
