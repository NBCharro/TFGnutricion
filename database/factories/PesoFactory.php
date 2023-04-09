<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peso>
 */
class PesoFactory extends Factory
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
            'perdida_peso_1' => $this->faker->numberBetween(300, 800),
            'semanas_perdida_peso_1' => $this->faker->numberBetween(1, 4),
            'perdida_peso_2' => $this->faker->numberBetween(300, 800),
            'semanas_perdida_peso_2' => $this->faker->numberBetween(1, 5),
            'perdida_peso_final' => $this->faker->numberBetween(300, 800),
            'fecha' => $this->faker->date($format = 'd-m-Y', $max = '01-01-2024', $min = '01-01-2023'),
            'peso' => $this->faker->numberBetween(80, 150),
            'peso_teorico' => $this->faker->numberBetween(80, 150),
            'nota_pasos' => $this->faker->numberBetween(0, 10)
        ];
    }
}
