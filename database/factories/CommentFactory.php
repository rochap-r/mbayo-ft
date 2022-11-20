<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\UserComment;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'body'=>$this->faker->paragraph(),
            'post_id'=>Post::all()->random(1)->first()->id,
            'user_comment_id'=>UserComment::all()->random(1)->first()->id
        ];
    }
}
