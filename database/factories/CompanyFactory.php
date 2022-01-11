<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->company,
            'address' => $this->faker->streetAddress,
            'email' => $this->faker->companyEmail,
            'director' => $this->faker->name,
            'city_id' => $this->faker->numberBetween(1, 7)
        ];
    }
}
