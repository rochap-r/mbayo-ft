<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BgConfig>
 */
class BgConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mft_bg_image'=>'mft_template/img/carousel-1.jpg',
            'service_bg_image'=>'mft_template/img/carousel-1.jpg',
            'contact_bg_image'=>'mft_template/img/carousel-1.jpg',
            'about_bg_image'=>'mft_template/img/carousel-1.jpg',
        ];
    }
}
