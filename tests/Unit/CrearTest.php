<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Custom\Crear_DB_Controller;
use App\Models\Plato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CrearTest extends TestCase
{
    // Proporciona metodos para reiniciar la base de datos en las pruebas
    use RefreshDatabase;

    /** @test */
    public function testAccesoABaseDeDatosPlatos()
    {
        $id_cliente = 'aa999';
        // Crear un mensaje externo de prueba
        Plato::factory(1)->create(['id_cliente' => $id_cliente]);

        // Obtener el registro creado
        $registro = Plato::get()->where('id_cliente', $id_cliente)->first();

        // Verificar que el mensaje haya sido creado
        $this->assertEquals($id_cliente, $registro->id_cliente);
    }

    /** @test */
    public function testCrearNuevoPlato()
    {
        $id_cliente = 'aa999';
        $accion = 'cena';
        $platos = ['legumbres', 'ensalada mixta'];

        $crearDBController = new Crear_DB_Controller();
        $creado = $crearDBController->crear_plato($id_cliente, $accion, $platos);

        $this->assertTrue($creado);
    }

    /** @test */
    public function testVerificarNuevoPlatoCreadoDataBase()
    {
        $id_cliente = 'aa999';
        $accion = 'cena';
        $platos = ['legumbres', 'ensalada mixta'];

        $crearDBController = new Crear_DB_Controller();
        $crearDBController->crear_plato($id_cliente, $accion, $platos);

        // Obtener el ID del mensaje creado
        $id = Plato::get()->where('id_cliente', 'aa999')->first()->id_cliente;

        $this->assertEquals('aa999', $id);
    }

    /** @test */
    public function testCrearPlatoConError()
    {
        $id_cliente = 'aa999';
        $platos = ['pollo asado', 'ensalada mixta'];
        // Fuerza un error al intentar guardar el plato
        $accion = 'cenac';
        $crearDBController = new Crear_DB_Controller();
        $result = $crearDBController->crear_plato($id_cliente, $accion, $platos);
        $this->assertFalse($result);
    }

    /** @test */
    public function testJsonCreadoCorrectamenteCrearPlato()
    {
        $id_cliente = 'aa999';
        $accion = 'cena';
        $platos = ['pollo asado', 'ensalada mixta'];
        $crearDBController = new Crear_DB_Controller();
        $crearDBController->crear_plato($id_cliente, $accion, $platos);
        $plato = Plato::where('id_cliente', $id_cliente)->where('accion', $accion)->first();
        $this->assertNotNull($plato);
        $this->assertJson($plato->platos);
    }
}
