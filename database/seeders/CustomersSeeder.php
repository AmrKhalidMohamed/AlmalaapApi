<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Customers;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $numberOfCustomers = 10;

        for ($i = 0; $i < $numberOfCustomers; $i++) {
            Customers::create([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
            ]);
        }
    }
}
