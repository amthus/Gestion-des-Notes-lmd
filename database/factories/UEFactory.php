<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UE>
 */
class UEFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\UE::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('UE[0-9]{2}'),
            'nom' => $this->faker->words(3, true),
            'credits_ects' => $this->faker->numberBetween(1, 6),
            'semestre' => $this->faker->numberBetween(1, 6),
        ];
    }
}
