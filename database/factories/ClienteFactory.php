<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
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
            'nombre_apellidos' => $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'direccion' => $this->faker->streetAddress,
            'fecha_inicio' => $this->faker->date($format = 'd-m-Y', $max = '01-01-2024', $min = '01-01-2023'),
            'peso_inicial' => $this->faker->randomFloat(100, 0.5, 150),
            'peso_final_1' => $this->faker->randomFloat(70, 0.5, 99),
            'peso_final_2' => $this->faker->randomFloat(70, 0.5, 99),
            'perdida_peso_1' => $this->faker->numberBetween(300, 800),
            'semanas_perdida_peso_1' => $this->faker->numberBetween(1, 4),
            'perdida_peso_2' => $this->faker->numberBetween(300, 800),
            'semanas_perdida_peso_2' => $this->faker->numberBetween(1, 5),
            'perdida_peso_final' => $this->faker->numberBetween(300, 800)
        ];
    }
}
