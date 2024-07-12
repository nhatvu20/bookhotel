<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class roomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $roomtype=['standard','deluxe','suite'];
        $available=['available','occupied','under maintenance'];
        for ($i = 0; $i < 10; $i++) {   //mỗi lần chạy seeder tạo 10 bản ghi
            DB::table('rooms')->insert([
                // 'CustomerID' => $i + 1,
                "roomnumber"=> $faker->numberBetween(100,200),
                "roomtype"=> $faker->randomElement($roomtype),    //random trong 1 mảng
                "availability"=>$faker->randomElement($available),
            ]);
        }
    }
}
