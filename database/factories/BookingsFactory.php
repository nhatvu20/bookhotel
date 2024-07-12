<?php

namespace Database\Factories;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Rooms;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Bookings::class;
    public function definition()
    {
        return [
            //
            'customerid' => Customers::inRandomOrder()->first()->customerid,
            'roomid' => Rooms::inRandomOrder()->first()->roomid,
            'checkindate' => $this->faker->dateTimeBetween('-1 month', 'now'),  //Thời gian giữa khoảng này
            'checkoutdate' => $this->faker->dateTimeBetween('now', '+1 month'), //Thời gian giữa khoảng này
        ];
    }
}
