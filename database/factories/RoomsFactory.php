<?php

namespace Database\Factories;

use App\Models\Rooms;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Rooms::class; //Khai báo model

    public function definition()
    {
        $roomtype=['standard','deluxe','suite'];
        $available=['available','occupied','under maintenance'];
        return [
            //
            "roomnumber"=> $this->faker->numberBetween(100,200),
            "roomtype"=> $this->faker->randomElement($roomtype),    //random trong 1 mảng
            "availability"=>$this->faker->randomElement($available),
        ];
    }
}
