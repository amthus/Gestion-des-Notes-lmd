<?php

namespace Database\Factories;

use App\Models\EC;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EC>
 */
class ECFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EC::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{2}'),
            'nom' => $this->faker->words(3, true),
            'coefficient' => $this->faker->numberBetween(1, 5),
            'ue_id' => \App\Models\UE::factory(),
        ];
    }
}
