<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Texto_Cliente>
 */
class Texto_ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $texto_general = json_encode([
            'texto 1' => $this->faker->sentence($nbWords = 6),
            'texto 2' => $this->faker->sentence($nbWords = 6),
        ]);
        $texto_particular = json_encode([
            'texto 1' => $this->faker->sentence($nbWords = 6),
            'texto 2' => $this->faker->sentence($nbWords = 6),
            'texto 3' => $this->faker->sentence($nbWords = 6),
            'texto 4' => $this->faker->sentence($nbWords = 6),
            'texto 5' => $this->faker->sentence($nbWords = 6),
            'texto 6' => $this->faker->sentence($nbWords = 6),
            'texto 7' => $this->faker->sentence($nbWords = 6),
            'texto 8' => $this->faker->sentence($nbWords = 6),
            'texto 9' => $this->faker->sentence($nbWords = 6),
            'texto 10' => $this->faker->sentence($nbWords = 6),
            'texto 11' => $this->faker->sentence($nbWords = 6),
            'texto 12' => $this->faker->sentence($nbWords = 6),
        ]);
        return [
            'id_cliente' => $this->faker->unique()->text(6),
            'texto_general' => $texto_general,
            'texto_particular' => $texto_particular
        ];
    }
}
