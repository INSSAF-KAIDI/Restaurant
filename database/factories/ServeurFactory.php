<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Serveur>
 */
class ServeurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        
                'nom' => fake()->nom(),
                'email' => fake()->email(),
                'telephone' => fake()->telephone(),
                'adresse' => fake()->adresse(),
                'status' => fake()->status(),
            ];
        
    }
}
