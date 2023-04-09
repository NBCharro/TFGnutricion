<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;

class Crear_DB_Controller
{
    function crear_plato($id_cliente, $accion, $platos)
    {
        $guardado = false;
        try {
            $platos_json = json_encode($platos);
            Plato::create([
                'id_cliente' => $id_cliente,
                'accion' => $accion,
                'platos' => $platos_json
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $guardado;
    }

    function crear_pesos($datos_cliente, $array_pesos, $array_fechas)
    {
        $guardado = false;
        try {
            $peso_cliente_db = Peso::get()->where('id_cliente', 'jl3864')->first();
            Peso::create([
                'id_cliente' => $datos_cliente['id_cliente'],
                'perdida_peso_1' => $datos_cliente['perdida_peso_1'],
                'semanas_perdida_peso_1' => $datos_cliente['semanas_perdida_peso_1'],
                'perdida_peso_2' => $datos_cliente['perdida_peso_2'],
                'semanas_perdida_peso_2' => $datos_cliente['semanas_perdida_peso_2'],
                'perdida_peso_final' => $datos_cliente['perdida_peso_final'],
                'fecha' => json_encode($array_fechas),
                'peso' => json_encode([]),
                'peso_teorico' => json_encode($array_pesos),
                'nota_pasos' => json_encode([]),
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }
    function crear_textos_clientes($textos_clientes)
    {
        $guardado = false;
        dump($textos_clientes);
        try {
            $texto_general_json = json_encode($textos_clientes['texto_general']);
            $texto_particular_json = json_encode($textos_clientes['texto_particular']);
            Texto_Cliente::create([
                'id_cliente' => $textos_clientes['id_cliente'],
                'texto_general' => $texto_general_json,
                'texto_particular' => $texto_particular_json
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }

    function crear_cliente_nuevo($datos_nuevo_cliente, $preguntas_extra_nuevo_cliente)
    {
        $guardado = false;

        $guardado_datos_cliente = $this->guardar_db_nuevo_cliente($datos_nuevo_cliente);

        $preguntas_estandar = $this->preguntas_estandar();
        $preguntas_json = json_encode([...$preguntas_estandar, ...$preguntas_extra_nuevo_cliente]);
        $preguntas_extra_nuevo_cliente_db = [
            'id_cliente' => $datos_nuevo_cliente['id_cliente'],
            'fecha_inicio' => $datos_nuevo_cliente['fecha_inicio'],
            'preguntas' => $preguntas_json,
        ];
        $guardado_preguntas_cliente = $this->guardar_db_datos_iniciales_nuevo_cliente($preguntas_extra_nuevo_cliente_db);

        if ($guardado_datos_cliente && $guardado_preguntas_cliente) {
            $guardado = true;
        } else {
            // Si falla alguno, deshacer guardado
        }

        return $guardado;
    }

    private function guardar_db_nuevo_cliente($datos_cliente_db)
    {
        $guardado = false;
        try {
            Cliente::create([
                'id_cliente' => $datos_cliente_db['id_cliente'],
                'nombre_apellidos' => $datos_cliente_db['nombre_apellidos'],
                'telefono' => $datos_cliente_db['telefono'],
                'email' => $datos_cliente_db['email'],
                'direccion' => $datos_cliente_db['direccion'],
                'fecha_inicio' => $datos_cliente_db['fecha_inicio'],
                'peso_inicial' => $datos_cliente_db['peso_inicial'],
                'peso_final_1' => $datos_cliente_db['peso_final_1'],
                'peso_final_2' => $datos_cliente_db['peso_final_2'],
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }

    private function preguntas_estandar()
    {
        return [
            '¿Se ha puesto anteriormente a dieta? ¿Cosas positivas que te aportaron esas dietas?' => 'respuesta_estandar',
            '¿Tienes el hábito de desayunar regularmente? ¿Motivo? Indica qué desayunos suele hacer.' => 'respuesta_estandar',
            '¿Tienes el hábito de comer algo a media mañana regularmente? ¿Motivo? Indica qué sueles hacerte.' => 'respuesta_estandar',
            '¿Te gusta picar entre horas? ¿Qué picoteas?' => 'respuesta_estandar',
            '¿Llegas con ansiedad a alguna de la tomas? ¿A cuál?' => 'respuesta_estandar',
        ];
    }

    private function guardar_db_datos_iniciales_nuevo_cliente($preguntas_extra_nuevo_cliente_db)
    {
        $guardado = false;
        try {
            Dato_Inicial_Cliente::create([
                'id_cliente' => $preguntas_extra_nuevo_cliente_db['id_cliente'],
                'fecha' => $preguntas_extra_nuevo_cliente_db['fecha_inicio'],
                'pregunta_respuesta' => $preguntas_extra_nuevo_cliente_db['preguntas']
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }

    public function guardar_mensaje_interno($mensaje)
    {
        $guardado = false;
        try {
            Contacto_Interno::create([
                'id_cliente' => $mensaje['id_cliente'],
                'fecha' => $mensaje['fecha'],
                'mensaje' => $mensaje['mensaje']
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }

    public function guardar_mensaje_externo($mensaje)
    {
        $guardado = false;
        try {
            Contacto_Externo::create([
                'nombre' => $mensaje['nombre'],
                'telefono' => $mensaje['telefono'],
                'email' => $mensaje['email'],
                'fecha' => $mensaje['fecha'],
                'mensaje' => $mensaje['mensaje']
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }
}
