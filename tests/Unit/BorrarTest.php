<?php

namespace Tests\Unit;

use App\Custom\Borrar_DB_Controller;
use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BorrarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testAccesoABaseDeDatosContactoExterno()
    {
        // Crear un mensaje externo de prueba
        $contacto = Contacto_Externo::factory(1)->create(['nombre' => 'Nombre test']);

        // Obtener el registro creado
        $registro = Contacto_Externo::get()->where('nombre', 'Nombre test')->first();

        // Verificar que el mensaje haya sido creado
        $this->assertEquals('Nombre test', $registro->nombre);
    }

    /** @test */
    public function testBorrarMensajeExternoExistente()
    {
        // Crear un mensaje externo de prueba
        Contacto_Externo::factory(1)->create(['nombre' => 'Nombre test']);

        // Obtener el ID del mensaje creado
        $id = Contacto_Externo::get()->where('nombre', 'Nombre test')->first()->id;

        // Llamar a la función borrar_mensaje_externo con el ID del mensaje creado
        $borrarDBController = new Borrar_DB_Controller();
        $borrado = $borrarDBController->borrar_mensaje_externo($id);

        // Verificar que el mensaje haya sido eliminado
        $this->assertTrue($borrado);
        $this->assertNull(Contacto_Externo::find($id));
    }

    /** @test */
    public function testBorrarMensajeExternoInexistente()
    {
        // Llamar a la función borrar_mensaje_externo con un ID inexistente
        $borrarDBController = new Borrar_DB_Controller();
        $borrado = $borrarDBController->borrar_mensaje_externo(9999);

        // Verificar que el mensaje no haya sido eliminado
        $this->assertFalse($borrado);
    }

    /** @test */
    public function testObtenerContactoInterno()
    {
        // Crear un mensaje interno de prueba
        Contacto_Interno::factory(1)
            ->create(['id_cliente' => 'aa999']);
        // Obtener el registro creado
        $registro = Contacto_Interno::get()
            ->where('id_cliente', 'aa999')->first();
        // Verificar que el mensaje haya sido creado
        $this->assertEquals('aa999', $registro->id_cliente);
    }

    /** @test */
    public function testBorrarMensajeInternoExistente()
    {
        // Crear un mensaje interno de prueba
        Contacto_Interno::factory(1)->create(['id_cliente' => 'aa999']);

        // Obtener el ID del mensaje creado
        $id = Contacto_Interno::get()->where('id_cliente', 'aa999')->first()->id;

        // Llamar a la función borrar_mensaje_interno con el ID del mensaje creado
        $borrarDBController = new Borrar_DB_Controller();
        $borrado = $borrarDBController->borrar_mensaje_interno($id);

        // Verificar que el mensaje haya sido eliminado
        $this->assertTrue($borrado);
        $this->assertNull(Contacto_Interno::find($id));
    }

    /** @test */
    public function testBorrarMensajeInternoInexistente()
    {
        // Llamar a la función borrar_mensaje_interno con un ID inexistente
        $borrarDBController = new Borrar_DB_Controller();
        $borrado = $borrarDBController->borrar_mensaje_interno(9999);

        // Verificar que el mensaje no haya sido eliminado
        $this->assertFalse($borrado);
    }


    /** @test */
    public function testBorrarClienteExistente()
    {
        // Obtener el ID del cliente creado
        $id_cliente = 'aa999';

        // Crear un cliente de prueba
        Cliente::factory(1)->create(['id_cliente' => $id_cliente]);
        Contacto_Interno::factory(3)->create(['id_cliente' => $id_cliente]);
        Dato_Inicial_Cliente::factory(1)->create(['id_cliente' => $id_cliente]);
        Peso::factory(1)->create(['id_cliente' => $id_cliente]);
        Plato::factory(5)->create(['id_cliente' => $id_cliente]);
        Texto_Cliente::factory(1)->create(['id_cliente' => $id_cliente]);

        // Llamar a la función borrar_cliente con el ID del cliente creado
        $borrarDBController = new Borrar_DB_Controller();
        $borrado = $borrarDBController->borrar_cliente($id_cliente);

        // Verificar que el cliente y sus registros relacionados hayan sido eliminados
        $this->assertTrue($borrado);
        $this->assertNull(Cliente::find($id_cliente));
        $this->assertNull(Contacto_Interno::where('id_cliente', $id_cliente)->first());
        $this->assertNull(Dato_Inicial_Cliente::where('id_cliente', $id_cliente)->first());
        $this->assertNull(Peso::where('id_cliente', $id_cliente)->first());
        $this->assertNull(Plato::where('id_cliente', $id_cliente)->first());
        $this->assertNull(Texto_Cliente::where('id_cliente', $id_cliente)->first());
    }
}
