<?php

namespace Tests\Unit;

use App\Models\Contacto_Externo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use App\Custom\Borrar_DB_Controller;


class UserTest extends TestCase
{
    /**
     * @test
     *
     */
    // public function a_post_can_be_created(): void
    // {
    //     $response = $this->post('/posts', [
    //         'title' => 'Test Title',
    //         'content' => 'Test content'
    //     ]);
    // }
    use RefreshDatabase;

    /** @test */

    public function testBorrarMensajeExternoExistente()
    {
        // Crear un mensaje externo de prueba
        $mensaje = new Contacto_Externo();
        Contacto_Externo::create([
            'nombre' => $mensaje['nombre'],
            'telefono' => $mensaje['telefono'],
            'email' => $mensaje['email'],
            'fecha' => $mensaje['fecha'],
            'mensaje' => $mensaje['mensaje'],
            'leido' => 0
        ]);
        $guardado = true;
        $mensaje->nombre = 'Nombre test';
        $mensaje->telefono = '111222333';
        $mensaje->email = 'test@test.com';
        $mensaje->fecha = '28-02-2023 17:45:59';
        $mensaje->mensaje = 'Este es un mensaje de prueba';
        $mensaje->leido = 0;
        $mensaje->save();

        // Obtener el ID del mensaje creado
        $id = $mensaje->id;

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
}
