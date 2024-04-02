<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bookings;
use Faker\Factory as Faker;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $numberOfBookings = 10;

        for ($i = 0; $i < $numberOfBookings; $i++) {
            Bookings::create([
                'customer_id' => $faker->numberBetween(1, 10),
                'room_id' => $faker->numberBetween(1, 5),
                'booking_date' => $faker->dateTimeBetween('-1 month', '+1 month'),
                'start_time' => $faker->time('h:i'),
                'end_time' => $faker->time('h:i'),
            ]);
        }
    }
}
