<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChoiceConfig>
 */
class ChoiceConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'team_title'=>'L\'Expertise professionnel prêt à aider votre entreprise',
           'title'=>'Nous sommes là pour faire croître votre entreprise de façon exponentielle',
           'quality'=>'Nous nous adaptons aux normes Industrielles pour offrir de services de haute qualité',
           'recompense'=>'Nos services de hautes qualités, nous offre de grandes recompenses!',
           'personnel'=>'Notre personnel est selectionné sur principe de meritocratie que du favoritisme',
           'assistance'=>'Un facteur clé pour nous, afin de favoriser votre maximisation dans votre production',
           'image'=>'mft_template/img/feature.jpg',
        ];
    }
}
