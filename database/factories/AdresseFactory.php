<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresse>
 */
class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ville' => fake()->ville(),
            'quartier' => fake()->quartier(),
            'libelle' => fake()->libelle(),
            'codepostal' => fake()->codepostal(),
        ];
    }
}
