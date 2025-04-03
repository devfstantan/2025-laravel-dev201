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
            'title' => fake()->sentence(),
            'price' => fake()->randomFloat(2,0,1000),
            'stock' => fake()->numberBetween(0,100),
            'is_promo' => fake()->boolean(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['draft','in_review','published']),
            'published_at' => fake()->date(),
        ];
    }
}
