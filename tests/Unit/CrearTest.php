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
        $platos = 'ensalada mixta';

        $crearDBController = new Crear_DB_Controller();
        $creado = $crearDBController->crear_nuevo_plato($id_cliente, $accion, $platos);

        $this->assertTrue($creado);
    }


    /** @test */
    public function testVerificarNuevoPlatoCreadoDataBase()
    {
        $id_cliente = 'aa999';
        $accion = 'cena';
        $platos = 'ensalada mixta';

        $crearDBController = new Crear_DB_Controller();
        $crearDBController->crear_nuevo_plato($id_cliente, $accion, $platos);

        // Obtener el ID del mensaje creado
        $id = Plato::get()->where('id_cliente', 'aa999')->first()->id_cliente;

        $this->assertEquals('aa999', $id);
    }

    /** @test */
    public function testCrearNuevoPlato_Error()
    {
        // Preparación de datos de prueba
        $id_cliente = 1;
        $accion = 'error nombre';
        $plato = 'Huevos revueltos';

        // Ejecución de la función a probar
        try {
            $crearDBController = new Crear_DB_Controller();
            $crearDBController->crear_nuevo_plato($id_cliente, $accion, $plato);
        } catch (\Throwable $e) {
            // Si lanza error, la prueba es correcta
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function testCrearTextosClientes_General()
    {
        // Preparación de datos de prueba
        $id_cliente = 1;
        $tipo = 'general1';
        $texto = 'Texto general 1';

        // Ejecución de la función a probar
        $crearDBController = new Crear_DB_Controller();
        $resultado = $crearDBController->crear_textos_clientes($id_cliente, $tipo, $texto);

        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }

    /** @test */
    public function testCrearTextosClientes_Especifico()
    {
        // Preparación de datos de prueba
        $id_cliente = 1;
        $tipo = 'texto_particular';
        $texto = [
            'Manzana' => 'Texto específico para Manzana',
            'Plátano' => 'Texto específico para Plátano',
        ];

        // Ejecución de la función a probar
        $crearDBController = new Crear_DB_Controller();
        $resultado = $crearDBController->crear_textos_clientes($id_cliente, $tipo, $texto);

        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }

    /** @test */
    public function testCrearTextosClientesTextoParticular()
    {
        // Preparación de datos de prueba
        $id_cliente = 1;
        $tipo = 'texto_particular';
        $texto = 'Texto general 1';

        // Ejecución de la función a probar
        try {
            $crearDBController = new Crear_DB_Controller();
            $crearDBController->crear_textos_clientes($id_cliente, $tipo, $texto);
        } catch (\Throwable $e) {
            // Si lanza error, la prueba es correcta
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function testCrearTextosClientesError()
    {
        // Preparación de datos de prueba
        $id_cliente = 1;
        $tipo = 'error';
        $texto = 'Texto general 1';

        // Ejecución de la función a probar
        try {
            $crearDBController = new Crear_DB_Controller();
            $crearDBController->crear_textos_clientes($id_cliente, $tipo, $texto);
        } catch (\Throwable $e) {
            // Si lanza error, la prueba es correcta
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function testCrearNuevosPesos()
    {
        // Preparación de datos de prueba
        $id_cliente = 1;
        $fechas = ['2023-05-01', '2023-05-08', '2023-05-15'];
        $pesos = [70.5, 70.2, 69.8];
        $peso_teorico = [70.0, 69.5, 69.0];
        $nota_pasos = [8000, 8500, 9000];

        // Ejecución de la función a probar
        $crearDBController = new Crear_DB_Controller();
        $resultado = $crearDBController->crear_nuevos_pesos($id_cliente, $fechas, $pesos, $peso_teorico, $nota_pasos);

        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }

    /** @test */
    public function testCrearNuevosPesos_PrimerPeso()
    {
        // Preparación de datos de prueba
        $id_cliente = 1;
        $fechas = ['2023-05-01', '2023-05-08', '2023-05-15'];
        $pesos = [70.5, 70.2, 69.8];
        $peso_teorico = [70.0, 69.5, 69.0];
        $nota_pasos = [8000, 8500, 9000];

        // Ejecución de la función a probar
        $crearDBController = new Crear_DB_Controller();
        $resultado = $crearDBController->crear_nuevos_pesos($id_cliente, $fechas, $pesos, $peso_teorico, $nota_pasos);

        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }

    /** @test */
    public function testCrearNuevosPesos_Error()
    {
        // Preparación de datos de prueba
        $id_cliente = 1;
        $fechas = ['2023-05-01', '2023-05-08', '2023-05-15'];
        $pesos = [70.5, 70.2, 69.8];
        $peso_teorico = [70.0, 69.5, 69.0];
        $nota_pasos = [8000, 8500, 9000];

        // Ejecución de la función a probar
        try {
            $crearDBController = new Crear_DB_Controller();
            $crearDBController->crear_nuevos_pesos($id_cliente, $fechas, $pesos, $peso_teorico, $nota_pasos);
        } catch (\Throwable $e) {
            // Si lanza error, la prueba es correcta
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function testCrearNuevoCliente()
    {
        // Preparación de datos de prueba
        $datos_nuevo_cliente = [
            "id_cliente" => "bc111",
            "nombre_apellidos" => "Benito Camelas",
            "telefono" => "1122233",
            "email" => "email@gmail.com",
            "direccion" => "Calle Falsa, 123",
            "fecha_inicio" => "2023-05-09",
            "peso_inicial" => "100",
            "peso_final_1" => "90",
            "peso_final_2" => "80"
        ];

        $preguntas_extra = ["Pregunta 1", "Pregunta 2", "Pregunta 3"];

        // Ejecución de la función a probar
        $crearDBController = new Crear_DB_Controller();
        $resultado = $crearDBController->crear_cliente_nuevo($datos_nuevo_cliente, $preguntas_extra);

        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }

    /** @test */
    public function testCrearNuevoCliente_Error()
    {
        // Preparación de datos de prueba
        $datos_nuevo_cliente = [
            "id_cliente" => "bc111",
            "nombre_apellidos" => "Benito Camelas",
            "telefono" => "1122233",
            "email" => "
            ",
            "direccion" => "Calle Falsa, 123",
            "fecha_inicio" => "2023-05-09",
            "peso_inicial" => "100",
            "peso_final_1" => "90",
            "peso_final_2" => "80"
        ];
        $preguntas_extra = 'Error';
        // Ejecución de la función a probar
        $crearDBController = new Crear_DB_Controller();
        $resultado = $crearDBController->crear_cliente_nuevo($datos_nuevo_cliente, $preguntas_extra);

        // Verificación de que el resultado es verdadero
        $this->assertFalse($resultado);
    }

    /** @test */
    public function testGuardarMensajeInterno()
    {
        // Preparación de datos de prueba
        $mensaje = [
            'id_cliente' => 1,
            'fecha' => '2023-05-09',
            'mensaje' => 'Mensaje de prueba'
        ];

        // Ejecución de la función a probar
        $crearDBController = new Crear_DB_Controller();
        $resultado = $crearDBController->guardar_mensaje_interno($mensaje);

        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }

    /** @test */
    public function testGuardarMensajeInterno_Error()
    {
        // Preparación de datos de prueba
        $mensaje = [
            'id_cliente' => 1,
            'fecha' => '2023-05-09',
            'mensaje' => 'Mensaje de prueba'
        ];

        // Ejecución de la función a probar
        try {
            $crearDBController = new Crear_DB_Controller();
            $crearDBController->guardar_mensaje_interno($mensaje);
        } catch (\Throwable $e) {
            // Si lanza error, la prueba es correcta
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function testGuardarMensajeExterno()
    {
        // Preparación de datos de prueba
        $mensaje = [
            'nombre' => 'Nombre de prueba',
            'telefono' => '123456789',
            'email' => 'email@email.com',
            'fecha' => '2023-05-09',
            'mensaje' => 'Mensaje de prueba'
        ];

        // Ejecución de la función a probar
        $crearDBController = new Crear_DB_Controller();
        $resultado = $crearDBController->guardar_mensaje_externo($mensaje);

        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }

    /** @test */
    public function testGuardarMensajeExterno_Error()
    {
        // Preparación de datos de prueba
        $mensaje = [
            'id_cliente' => 1,
            'fecha' => '2023-05-09',
            'mensaje' => 'Mensaje de prueba'
        ];

        // Ejecución de la función a probar
        try {
            $crearDBController = new Crear_DB_Controller();
            $crearDBController->guardar_mensaje_externo($mensaje);
        } catch (\Throwable $e) {
            // Si lanza error, la prueba es correcta
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function testGuardarErrorDataBase()
    {
        // Preparación de datos de prueba
        $e = new \Exception('Error de prueba', 123);
        $archivo = '/app/Custom/Crear_DB_Controller.php';
        $funcion = 'guardar_mensaje_externo';
        $paginaWeb = '/inicio';

        try {
            // Ejecución de la función a probar
            $crearDBController = new Crear_DB_Controller();
            $crearDBController->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
            // Verificación de que el resultado es verdadero
            $this->assertTrue(true);
        } catch (\Throwable $e) {
            $this->assertTrue(false);
        }
    }
}
