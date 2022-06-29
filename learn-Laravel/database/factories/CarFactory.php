<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'decription' => $this->faker->paragraph(),
            'model' => $this->faker->name(),
            'images' => 'hinh'.rand(1,5).'.jpg',
            // 'mf_id' => rand(1,20),
            'produced_on' => now(),
        ];
    }
}