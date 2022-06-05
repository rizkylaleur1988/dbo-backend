<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_no' => $this->faker->numerify('###-####-###'),
            'order_date' => $this->faker->date(),
            'customer_id' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
