<?php

namespace Tests\Unit;

use App\Custom\Actualizar_DB_Controller;
use App\Models\Dato_Inicial_Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActualizarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function testActualizarPreguntasRespuestas()
    {
        // Preparación de datos de prueba
        $id_cliente = 'jl3864';
        $preguntas_respuestas = [
            "¿Se ha puesto anteriormente a dieta? ¿Cosas positivas que te aportaron esas dietas?" => "Respuesta",
            "¿Tienes el hábito de desayunar regularmente? ¿Motivo? Indica qué desayunos suele hacer." => "Respuesta",
            "¿Tienes el hábito de comer algo a media mañana regularmente? ¿Motivo? Indica qué sueles hacerte." => "Respuesta",
            "¿Te gusta picar entre horas? ¿Qué picoteas?" => "Respuesta",
            "¿Llegas con ansiedad a alguna de la tomas? ¿A cuál?" => "Respuesta",
            "¿Te gustan los alimentos muy salados? ¿Qué tipo de sal usa?" => "Respuesta",
        ];

        // Ejecución de la función a probar
        $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
        $resultado = $funciones_actualizar_base_datos->actualizar_preguntas_respuestas($id_cliente, $preguntas_respuestas);

        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }

    /** @test */
    public function testActualizarPreguntasRespuestas_Error()
    {
        // Preparación de datos de prueba
        $id_cliente = 1;
        $preguntas_respuestas = [
            'pregunta1' => 'respuesta1',
            'pregunta2' => 'respuesta2',
        ];
        try {
            // Ejecución de la función a probar
            $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
            $funciones_actualizar_base_datos->actualizar_preguntas_respuestas($id_cliente, $preguntas_respuestas);
        } catch (\Throwable $e) {
            // Verificación de que el resultado es verdadero
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function testActualizarNuevoPeso()
    {
        $datos_nuevo_peso = [
            "id_cliente" => "jl3864",
            "fecha" => "9-4-2023",
            "peso" => "83",
            "nota_pasos" => "2"
        ];
        // Ejecución de la función a probar
        $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
        $resultado = $funciones_actualizar_base_datos->actualizar_nuevo_peso($datos_nuevo_peso);
        // Verificación de que el resultado es verdadero
        $this->assertTrue($resultado);
    }
    /** @test */
    public function testActualizarNuevoPeso_Error()
    {
        $datos_nuevo_peso = [
            "id_cliente" => "CodigoNoExistente",
            "fecha" => "9-4-2023",
            "peso" => "83",
            "nota_pasos" => "2"
        ];

        try {
            // Ejecución de la función a probar
            $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
            $funciones_actualizar_base_datos->actualizar_nuevo_peso($datos_nuevo_peso);
        } catch (\Throwable $e) {
            // Verificación de que el resultado es verdadero
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function TestMarcarMensajeInternoLeido_Error()
    {
        $id_mensaje = 1;
        try {
            // Ejecución de la función a probar
            $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
            $funciones_actualizar_base_datos->marcar_mensaje_leido_interno($id_mensaje);
        } catch (\Throwable $e) {
            // Verificación de que el resultado es verdadero
            $this->assertTrue(true);
        }
    }
}
