<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Order::class;

    public function definition()
    {
        return [
            'tran_id' => uniqid(),
            'total_amount' => rand(100, 1000),
            'cus_name' => $this->faker->name(),
            'cus_email' => $this->faker->email(),
            'cus_add1' => $this->faker->address(),
            'cus_phone' => $this->faker->phoneNumber(),
            'ship_name' => $this->faker->name(),
            'ship_add1' => $this->faker->address(),
            'ship_add2' => $this->faker->address(),
            'ship_city' => $this->faker->city(),
            'ship_state' => $this->faker->state(),
            'ship_postcode' => $this->faker->postcode(),
            'ship_phone' => $this->faker->phoneNumber(),
            'ship_country' => $this->faker->country(),
            'product_name' => $this->faker->name(),
        ];
    }
}
