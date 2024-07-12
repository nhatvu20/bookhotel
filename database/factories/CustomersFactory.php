<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Customers::class; //Khai báo model
    public function definition()
    {
        return [
            //tạo data fake
            "name"=> $this->faker->name,
            "email"=> $this->faker->unique()->email(),
            "phone"=>$this->faker->unique()->phoneNumber(),
        ];
    }
}
