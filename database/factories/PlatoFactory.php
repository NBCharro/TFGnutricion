<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plato>
 */
class PlatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = json_encode([
            'Plato 1' => $this->faker->sentence($nbWords = 6),
            'Plato 2' => $this->faker->sentence($nbWords = 6),
            'Plato 3' => $this->faker->sentence($nbWords = 6),
            'Plato 4' => $this->faker->sentence($nbWords = 6),
            'Plato 5' => $this->faker->sentence($nbWords = 6),
            'Plato 6' => $this->faker->sentence($nbWords = 6),
            'Plato 7' => $this->faker->sentence($nbWords = 6),
            'Plato 8' => $this->faker->sentence($nbWords = 6),
            'Plato 9' => $this->faker->sentence($nbWords = 6),
            'Plato 10' => $this->faker->sentence($nbWords = 6),
            'Plato 11' => $this->faker->sentence($nbWords = 6),
            'Plato 12' => $this->faker->sentence($nbWords = 6),
        ]);
        return [
            'id_cliente' => $this->faker->unique()->text(6),
            'accion' => $this->faker->randomElement([
                "desayuno",
                "media mañana",
                "comida",
                "merienda",
                "cena",
                "recena",
                "otro"
            ]),
            'platos' => $data
        ];
    }
}
