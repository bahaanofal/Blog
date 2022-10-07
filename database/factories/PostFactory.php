<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
    public function definition()
    {
        $user = DB::table('users')->inRandomOrder()->limit(1)->first(['id']);
        return [
            'title' => fake()->words(5, true),
            'sub_title' => fake()->words(7, true),
            'paragraph' => fake()->words(150, true),
            'image_path' => fake()->imageUrl(),
            'image_description' => fake()->words(150, true),
            'user_id' => $user ? $user->id : null,
        ];
    }
}
