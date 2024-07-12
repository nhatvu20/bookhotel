<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\Rooms;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $customers = Customers::all()->pluck("customerid")->toArray();
        $rooms = Rooms::all()->pluck("roomid")->toArray();// select roomid from bảng chuyển về mảng

        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {   //mỗi lần chạy seeder tạo 10 bản ghi
            DB::table('bookings')->insert([
                'customerid' => $faker->randomElement($customers),
                'roomid' => $faker->randomElement($rooms),
                'checkindate' => $faker->dateTimeBetween('-60days','-30days'),
                'checkoutdate' => $faker->dateTimeBetween('-30days','now'),
            ]);
        }
    }
}
