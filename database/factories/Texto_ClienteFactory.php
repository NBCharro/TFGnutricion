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
        return [
            'id_cliente' => $this->faker->unique()->text(6),
            'tipo_texto' => $this->faker->randomElement([
                "general1",
                "general2",
                "general3",
                "especifico"
            ]),
            'texto1' => $this->faker->sentence($nbWords = 6),
            'texto2' => $this->faker->sentence($nbWords = 6)
        ];
    }
}
