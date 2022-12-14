<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Config>
 */
class ConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'clients'=>30,
            'projets'=>15,
            'recompenses'=>5,
            'contact_email'=>'rodriguechot@gmail.com',
            'service_email'=>'rodriguechot@gmail.com'
        ];
    }
}
