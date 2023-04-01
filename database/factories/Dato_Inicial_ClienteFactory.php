<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dato_Inicial_Cliente>
 */
class Dato_Inicial_ClienteFactory extends Factory
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
            'fecha' => $this->faker->date($format = 'd-m-Y', $max = '01-01-2024', $min = '01-01-2023'),
            'pregunta_respuesta' => $this->faker->unique()->paragraph(2)
        ];
    }
}
