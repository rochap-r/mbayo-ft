<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fake_images=[
            '1.jpg', '2.jpg', '3.jpeg', '4.jpg', '5.jpg', '6.jpg', '7.png',
            '9.jpg', '10.jpg','blog-1.jpg', 'blog-2.jpg', 'blog-3.jpg', 'blog-4.jpg',
            'blog-5.jpg', 'blog-6.jpg', 'blog-7.jpg'
        ];
        return [
            'name'=>$this->faker->word(),
            'extension'=>'jpg',
            'path'=>'images/' . $this->faker->randomElement($fake_images)
        ];
    }
}
