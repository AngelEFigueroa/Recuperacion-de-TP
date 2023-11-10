<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->sentence(),
            'description'=>fake()->randomElement([null, fake()->paragraph()]),
            'unit_price'=>fake()->randomFloat(2),
            'stock'=>fake()->randomElement([0, fake()->randomNumber(3, false)])
        ];
    }
}
