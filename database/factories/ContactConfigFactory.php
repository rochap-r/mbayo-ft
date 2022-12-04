<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>'Si vous avez des questions, n\'hésitez pas à nous contacter',
            'tel'=>'+243 89 599 41 97',
            'email'=>'contact@mbayo-ft.com',
            'adress'=>'123, 30/juin, KZI, RDC',
            'footerDescription'=>'Bienvenu chez mbayo-FT, 
            parcourez notre site web pour voir tous nos services et une fois intéressé, contactez-nous.'
        ];
    }
}
