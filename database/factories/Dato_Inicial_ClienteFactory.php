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
        $pregunta_respuesta_json = json_encode([
            'Pregunta 1' => $this->faker->sentence($nbWords = 6),
            'Pregunta 2' => $this->faker->sentence($nbWords = 6),
            'Pregunta 3' => $this->faker->sentence($nbWords = 6),
            'Pregunta 4' => $this->faker->sentence($nbWords = 6),
            'Pregunta 5' => $this->faker->sentence($nbWords = 6),
            'Pregunta 6' => $this->faker->sentence($nbWords = 6),
        ]);
        return [
            'id_cliente' => $this->faker->unique()->text(6),
            'fecha' => $this->faker->date($format = 'd-m-Y', $max = '01-01-2024', $min = '01-01-2023'),
            'pregunta_respuesta' => $pregunta_respuesta_json
        ];
    }
}
