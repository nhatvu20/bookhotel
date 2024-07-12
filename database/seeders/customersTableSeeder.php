<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class customersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {   //mỗi lần chạy seeder tạo 10 bản ghi
            DB::table('customers')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email, //unique để ko trùng
                'phone' => $faker->unique()->phoneNumber,
            ]);
        }
    }
}
