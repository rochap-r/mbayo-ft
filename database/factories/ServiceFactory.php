<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'description'=>$this->faker->sentence(2),
            'slug'=>$this->faker->unique()->slug(),
            'excerpt'=>$this->faker->sentence(),
            'body'=>$this->faker->paragraph(20),
            'user_id'=>User::factory(),
        ];
    }
}
