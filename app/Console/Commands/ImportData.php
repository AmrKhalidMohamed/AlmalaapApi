<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customers;
use App\Models\Rooms;
use App\Models\Bookings;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from JSON files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting data import...');

        // Import Customers
        if (file_exists(base_path('customers.json'))) {
            $customers = json_decode(file_get_contents(base_path('customers.json')), true);
            foreach ($customers as $customer) {
                Customers::updateOrCreate(
                    ['id' => $customer['id']],
                    $customer
                );
            }
            $this->info('✓ Imported ' . count($customers) . ' customers');
        }

        // Import Rooms
        if (file_exists(base_path('rooms.json'))) {
            $rooms = json_decode(file_get_contents(base_path('rooms.json')), true);
            foreach ($rooms as $room) {
                Rooms::updateOrCreate(
                    ['id' => $room['id']],
                    $room
                );
            }
            $this->info('✓ Imported ' . count($rooms) . ' rooms');
        }

        // Import Bookings
        if (file_exists(base_path('bookings.json'))) {
            $bookings = json_decode(file_get_contents(base_path('bookings.json')), true);
            foreach ($bookings as $booking) {
                Bookings::updateOrCreate(
                    ['id' => $booking['id']],
                    $booking
                );
            }
            $this->info('✓ Imported ' . count($bookings) . ' bookings');
        }

        $this->info('Data import completed!');
        return 0;
    }
}
