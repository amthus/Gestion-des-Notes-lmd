<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Etudiant::class;

    public function definition()
    {
        return [
            'numero_etudiant' => $this->faker->unique()->numerify('##########'),
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'niveau' => $this->faker->randomElement(['L1', 'L2', 'L3']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
