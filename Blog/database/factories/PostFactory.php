<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        // 1- create factory
        // 2- create seeder and write this in run "$posts = Post::factory()->count(50)->create();"
        // 3- call seeder in DatabaseSeeder
        return [
            'title' => fake()->name,
            'cover' => fake()->imageUrl(),
            'slug' => fake()->slug,
            'description' => fake()->sentence,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
