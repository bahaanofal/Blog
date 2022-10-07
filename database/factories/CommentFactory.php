<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = DB::table('users')->inRandomOrder()->limit(1)->first(['id']);
        $post = DB::table('posts')->inRandomOrder()->limit(1)->first(['id']);
        return [
            'comment' => fake()->text(50),
            'user_id' => $user ? $user->id : null,
            'post_id' => $post ? $post->id : null,
        ];
    }
}
