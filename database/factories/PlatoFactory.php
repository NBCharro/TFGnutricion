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
        return [
            'id_cliente' => $this->faker->unique()->text(6),
            'accion' => $this->faker->randomElement(['desayuno', 'media manaña', 'comida', 'merienda', 'cena', 'recena', 'otro']),
            'platos' => $this->faker->unique()->paragraph(1)
        ];
    }
}
