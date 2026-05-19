<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'name' => fake()->words(3, true),
            'sku' => fake()->unique()->bothify('SKU-####'),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 100),
            'stock' => fake()->numberBetween(1, 100),
            'image' => fake()->imageUrl(),
            'is_active' => fake()->boolean(),
            'is_featured' => fake()->boolean(),
        ];
    }
}
