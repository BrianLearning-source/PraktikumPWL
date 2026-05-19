<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'slug' => fake()->slug(),
            'category_id' => \App\Models\Category::factory(),
            'color' => fake()->hexColor(),
            'image' => fake()->imageUrl(),
            'body' => fake()->paragraph(),
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
