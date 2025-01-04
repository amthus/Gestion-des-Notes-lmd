<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;
use App\Models\Note;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Note::class;

    public function definition()
    {
        return [
            'etudiant_id' => Etudiant::factory(),
            'ec_id' => \App\Models\EC::factory(),
            'note' => $this->faker->randomFloat(2, 0, 20),
            'session' => $this->faker->randomElement(['normale', 'rattrapage']),
            'date_evaluation' => $this->faker->date(),
        ];
    }
}
