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

    public function crear_cliente_nuevo($datos_nuevo_cliente, $preguntas_extra_nuevo_cliente)
    {
        /**
         * Crea un nuevo cliente en la base de datos, en las tablas cliente y datos_iniciales_cliente
         * @param array $datos_nuevo_cliente
         * @param array $preguntas_extra_nuevo_cliente
         * @return boolean
         */
        $guardado = false;
        try {
            $guardado_datos_cliente = $this->guardar_db_nuevo_cliente($datos_nuevo_cliente);

            $id_cliente = $datos_nuevo_cliente['id_cliente'];
            $fecha = $datos_nuevo_cliente['fecha_inicio'];
            $guardado_preguntas_cliente = $this->guardar_db_datos_iniciales_nuevo_cliente($id_cliente, $fecha, $preguntas_extra_nuevo_cliente);

            if ($guardado_datos_cliente && $guardado_preguntas_cliente) {
                $guardado = true;
            }
        } catch (\Throwable $e) {
            # code...
        }

        return $guardado;
    }

    private function guardar_db_nuevo_cliente($datos_cliente_db)
    {
        /**
         * Guarda los datos del cliente en la tabla cliente
         * @param array $datos_cliente_db
         * @return boolean
         */
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
                'perdida_peso_1' => 0,
                'semanas_perdida_peso_1' => 0,
                'perdida_peso_2' => 0,
                'semanas_perdida_peso_2' => 0,
                'perdida_peso_final' => 0,
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
            dump($e);
        }
        return $guardado;
    }

    private function guardar_db_datos_iniciales_nuevo_cliente($id_cliente, $fecha, $preguntas_extra_nuevo_cliente_db)
    {
        /**
         * Guarda los datos iniciales del cliente en la tabla datos_iniciales_cliente
         * @param string $id_cliente
         * @param string $fecha
         * @param array $preguntas_extra_nuevo_cliente_db
         * @return boolean
         */
        $guardado = false;
        try {
            // Guardamos las preguntas estandar
            $preguntas_estandar = $this->preguntas_estandar();
            foreach ($preguntas_estandar as $pregunta) {
                Dato_Inicial_Cliente::create([
                    'id_cliente' => $id_cliente,
                    'fecha' => $fecha,
                    'pregunta' => $pregunta,
                    'respuesta' => 'respuesta_estandar'
                ]);
            }
            // Guardamos las preguntas extra
            foreach ($preguntas_extra_nuevo_cliente_db as $pregunta_extra) {
                Dato_Inicial_Cliente::create([
                    'id_cliente' => $id_cliente,
                    'fecha' => $fecha,
                    'pregunta' => $pregunta_extra,
                    'respuesta' => 'respuesta_estandar'
                ]);
            }
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }

    private function preguntas_estandar()
    {
        /**
         * Preguntas estandar que se guardan en la tabla datos_iniciales_cliente
         */
        return [
            '¿Se ha puesto anteriormente a dieta? ¿Cosas positivas que te aportaron esas dietas?',
            '¿Tienes el hábito de desayunar regularmente? ¿Motivo? Indica qué desayunos suele hacer.',
            '¿Tienes el hábito de comer algo a media mañana regularmente? ¿Motivo? Indica qué sueles hacerte.',
            '¿Te gusta picar entre horas? ¿Qué picoteas?',
            '¿Llegas con ansiedad a alguna de la tomas? ¿A cuál?',
        ];
    }

    public function guardar_mensaje_interno($mensaje)
    {
        /**
         * Guarda un mensaje interno en la base de datos
         *
         * @return bool
         */
        $guardado = false;
        try {
            Contacto_Interno::create([
                'id_cliente' => $mensaje['id_cliente'],
                'fecha' => $mensaje['fecha'],
                'mensaje' => $mensaje['mensaje'],
                'leido' => 0
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }

    public function guardar_mensaje_externo($mensaje)
    {
        /**
         * Guarda un mensaje externo en la base de datos
         *
         * @return true o false
         */
        $guardado = false;
        try {
            Contacto_Externo::create([
                'nombre' => $mensaje['nombre'],
                'telefono' => $mensaje['telefono'],
                'email' => $mensaje['email'],
                'fecha' => $mensaje['fecha'],
                'mensaje' => $mensaje['mensaje'],
                'leido' => 0
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }
}
