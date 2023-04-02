<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(8)->create();
        User::factory()->create([
            'name' => 'nutricionista',
            'email' => 'nutricionista@email.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'nutricionista',
        ]);
        User::factory()->create([
            'name' => 'administrador',
            'email' => 'administrador@email.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'administrador',
        ]);

        Cliente::factory(10)->create();
        Contacto_Externo::factory(10)->create();
        Contacto_Interno::factory(10)->create();
        Dato_Inicial_Cliente::factory(10)->create();
        Peso::factory(10)->create();
        Plato::factory(10)->create();
        Texto_Cliente::factory(10)->create();
    }
}
