<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AboutConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>'La meilleure solution de services avec une experience de 10 ans',
            'description'=>'Nous offrons des sevices de meilleure qualité dans divers domaines tel qu\'en sécurité personnelle et industrielle, 
            Expertise Comptable et Expertise en Ingénierie Géologique.',
            'caracteristique1'=>'Récompensés',
            'caracteristique2'=>'Personnel professionnel',
            'caracteristique3'=>'Assistance 24h/24 et 7j/7',
            'caracteristique4'=>'Des prix équitables',
            'image'=>'mft_template/img/about.jpg'
        ];
    }
}
