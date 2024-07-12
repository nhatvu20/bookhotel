<?php

namespace Database\Seeders;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Rooms;
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
        // \App\Models\User::factory(10)->create();
        // Rooms::factory(10)->create();
        // Customers::factory(10)->create();
        // Bookings::factory(10)->create();
        $this->call(customersTableSeeder::class);   //Gọi nhanh bằng lệnh php artisan migrate db:seeder
        $this->call(roomsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
    }
}
