<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto_Externo>
 */
class Contacto_ExternoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'fecha' => $this->faker->date($format = 'd-m-Y', $max = '01-01-2024', $min = '01-01-2023'),
            'mensaje' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'leido' => $this->faker->randomElement([0, 1])
        ];
    }
}
