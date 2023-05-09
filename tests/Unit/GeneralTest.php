<?php

namespace Tests\Unit;

use App\Custom\DataBaseController;
use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeneralTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testComprobarClienteExiste()
    {
        // Preparación de datos de prueba
        $id_cliente = 'jl3864';
        Cliente::factory(1)->create(['id_cliente' => $id_cliente]);
        // Ejecución de la función a probar
        $funciones_Controller = new DataBaseController();
        $resultado = $funciones_Controller->comprobar_cliente_existe($id_cliente);
        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }

    /** @test */
    public function testComprobarClienteNoExiste()
    {
        // Preparación de datos de prueba
        $id_cliente = 'TEST';
        // Ejecución de la función a probar
        $funciones_Controller = new DataBaseController();
        $resultado = $funciones_Controller->comprobar_cliente_existe($id_cliente);
        // Verificación de que el resultado es verdadero
        $this->assertFalse($resultado);
    }

    /** @test */
    public function testExisteConexionADataBase()
    {
        // Ejecución de la función a probar
        $funciones_Controller = new DataBaseController();
        $resultado = $funciones_Controller->comprobar_no_existe_conexion_db();
        // Verificación de que el resultado es verdadero
        $this->assertFalse($resultado);
    }
}
