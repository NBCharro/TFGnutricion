<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;

use App\Custom\Crear_DB_Controller;

class Actualizar_DB_Controller
{
    function actualizar_preguntas_respuestas($id_cliente, $preguntas_respuestas)
    {
        $actualizado = false;
        try {
            $preguntas_respuestas_json = json_encode($preguntas_respuestas);

            $pregunta_respuesta_db = Dato_Inicial_Cliente::get()->where('id_cliente', $id_cliente)->first();
            $pregunta_respuesta_db->pregunta_respuesta = $preguntas_respuestas_json;

            $pregunta_respuesta_db->save();
            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }

    function actualizar_datos_cliente($datos_cliente)
    {
        $actualizado = false;
        try {
            $cliente_db = Cliente::get()->where('id_cliente', $datos_cliente['id_cliente'])->first();
            $cliente_db->id_cliente = $datos_cliente['id_cliente'];
            $cliente_db->nombre_apellidos = $datos_cliente['nombre_apellidos'];
            $cliente_db->telefono = $datos_cliente['telefono'];
            $cliente_db->email = $datos_cliente['email'];
            $cliente_db->direccion = $datos_cliente['direccion'];
            $cliente_db->fecha_inicio = $datos_cliente['fecha_inicio'];
            $cliente_db->peso_inicial = $datos_cliente['peso_inicial'];
            $cliente_db->peso_final_1 = $datos_cliente['peso_final_1'];
            $cliente_db->peso_final_2 = $datos_cliente['peso_final_2'];

            $cliente_db->save();
            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }

    function actualizar_platos($id_cliente, $platos)
    {
        $actualizado = false;
        try {
            foreach ($platos as $key => $value) {
                $accion = strtolower($key);
                $platos_db = Plato::get()->where('id_cliente', $id_cliente)->where('accion', $accion)->first();
                if ($platos_db) {
                    $platos_json = json_encode($value);
                    $platos_db->platos = $platos_json;
                    $platos_db->save();
                } else {
                    $funciones_crear_base_datos = new Crear_DB_Controller;
                    $creado = $funciones_crear_base_datos->crear_plato($id_cliente, $accion, $value);
                }
            }
            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }
    function actualizar_textos_clientes($textos_clientes)
    {
        // CREAR SI NO EXISTE
        $actualizado = false;
        try {
            $texto_general_json = json_encode($textos_clientes['texto_general']);
            $texto_particular_json = json_encode($textos_clientes['texto_particular']);

            $textos_clientes_db = Texto_Cliente::get()->where('id_cliente', $textos_clientes['id_cliente'])->first();
            if ($textos_clientes_db) {
                // Actualizar
                $textos_clientes_db->id_cliente = $textos_clientes['id_cliente'];
                $textos_clientes_db->texto_general = $texto_general_json;
                $textos_clientes_db->texto_particular = $texto_particular_json;

                $textos_clientes_db->save();
            } else {
                // Crear
                $funciones_crear_base_datos = new Crear_DB_Controller;
                $creado = $funciones_crear_base_datos->crear_textos_clientes($textos_clientes);
            }

            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }
    function actualizar_pesos($peso_cliente)
    {
        $actualizado = false;
        try {
            $peso_cliente_db = Peso::get()->where('id_cliente', $peso_cliente['id_cliente'])->first();
            $cambia_algun_dato = $this->cambia_datos_pesos_cliente($peso_cliente);
            if ($peso_cliente_db) {
                // Actualizar
                if ($cambia_algun_dato) {
                    $peso_cliente_db->id_cliente = $peso_cliente['id_cliente'];
                    $peso_cliente_db->perdida_peso_1 = $peso_cliente['perdida_peso_1'];
                    $peso_cliente_db->semanas_perdida_peso_1 = $peso_cliente['semanas_perdida_peso_1'];
                    $peso_cliente_db->perdida_peso_2 = $peso_cliente['perdida_peso_2'];
                    $peso_cliente_db->semanas_perdida_peso_2 = $peso_cliente['semanas_perdida_peso_2'];
                    $peso_cliente_db->perdida_peso_final = $peso_cliente['perdida_peso_final'];

                    $array_pesos = $this->obtener_array_pesos_teoricos_perdida_peso($peso_cliente['peso_inicial'], $peso_cliente['peso_final_1'], $peso_cliente['peso_final_2'], $peso_cliente['perdida_peso_1'], $peso_cliente['semanas_perdida_peso_1'], $peso_cliente['perdida_peso_2'], $peso_cliente['semanas_perdida_peso_2'], $peso_cliente['perdida_peso_final']);
                    $array_pesos_json = json_encode($array_pesos);
                    $peso_cliente_db->peso_teorico = $array_pesos_json;

                    $semanas = count($array_pesos);
                    $array_fechas = $this->obtener_array_fechas_perdida_peso($peso_cliente['fecha_inicio'], $semanas);
                    $array_fechas_json = json_encode($array_fechas);
                    $peso_cliente_db->fecha = $array_fechas_json;

                    $peso_cliente_db->save();
                }
            } else {
                // Crear
                $funciones_crear_base_datos = new Crear_DB_Controller;
                $array_pesos = $this->obtener_array_pesos_teoricos_perdida_peso($peso_cliente['peso_inicial'], $peso_cliente['peso_final_1'], $peso_cliente['peso_final_2'], $peso_cliente['perdida_peso_1'], $peso_cliente['semanas_perdida_peso_1'], $peso_cliente['perdida_peso_2'], $peso_cliente['semanas_perdida_peso_2'], $peso_cliente['perdida_peso_final']);

                $semanas = count($array_pesos);
                $array_fechas = $this->obtener_array_fechas_perdida_peso($peso_cliente['fecha_inicio'], $semanas);
                // FALLA
                $creado = $funciones_crear_base_datos->crear_pesos($peso_cliente, $array_pesos, $array_fechas);
            }

            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }
    private function cambia_datos_pesos_cliente($peso_cliente)
    {
        $cambia_dato = false;
        try {
            $peso_cliente_db = Peso::get()->where('id_cliente', $peso_cliente['id_cliente'])->first();
            $cliente_db = Cliente::get()->where('id_cliente', $peso_cliente['id_cliente'])->first();
            $fecha_inicio_db = $cliente_db->fecha_inicio;
            $peso_inicial_db = $cliente_db->peso_inicial;
            $peso_final_1_db = $cliente_db->peso_final_1;
            $peso_final_2_db = $cliente_db->peso_final_2;
            $perdida_peso_1_db = $peso_cliente_db->perdida_peso_1;
            $semanas_perdida_peso_1_db = $peso_cliente_db->semanas_perdida_peso_1;
            $perdida_peso_2_db = $peso_cliente_db->perdida_peso_2;
            $semanas_perdida_peso_2_db = $peso_cliente_db->semanas_perdida_peso_2;
            $perdida_peso_final_db = $peso_cliente_db->perdida_peso_final;

            if (
                $peso_cliente['fecha_inicio'] != $fecha_inicio_db ||
                $peso_cliente['peso_inicial'] != $peso_inicial_db ||
                $peso_cliente['peso_final_1'] != $peso_final_1_db ||
                $peso_cliente['peso_final_2'] != $peso_final_2_db ||
                $peso_cliente['perdida_peso_1'] != $perdida_peso_1_db ||
                $peso_cliente['semanas_perdida_peso_1'] != $semanas_perdida_peso_1_db ||
                $peso_cliente['perdida_peso_2'] != $perdida_peso_2_db ||
                $peso_cliente['semanas_perdida_peso_2'] != $semanas_perdida_peso_2_db ||
                $peso_cliente['perdida_peso_final'] != $perdida_peso_final_db
            ) {
                $cambia_dato = true;
            }
        } catch (\Throwable $e) {
            # code...
        }
        return $cambia_dato;
    }

    private function obtener_array_fechas_perdida_peso($fecha_inicio, $semanas)
    {
        $fechas = [];
        for ($semana = 0; $semana < $semanas; $semana++) {
            $fecha = strtotime($fecha_inicio . "+ " . $semana . " week");
            $fechas[] = date("Y-m-d", $fecha);
        }
        return $fechas;
    }
    private function obtener_array_pesos_teoricos_perdida_peso($peso_inicial, $peso_final_1, $peso_final_2, $perdida_peso_1, $semanas_perdida_peso_1, $perdida_peso_2, $semanas_perdida_peso_2, $perdida_peso_final)
    {
        $semana = 1;
        $pesos = [];
        $peso_iterativo = $peso_inicial;
        $peso_fin = $peso_final_1;
        if ($peso_final_2 > 0) {
            $peso_fin = $peso_final_2;
        }
        $pesos[] = intval($peso_iterativo);
        while ($peso_iterativo > $peso_fin) {
            if ($semana < $semanas_perdida_peso_1) {
                $peso_iterativo = $peso_iterativo - $perdida_peso_1 / 1000;
            } elseif ($perdida_peso_2 > 0 && $semanas_perdida_peso_2 > 0 && $semana < ($semanas_perdida_peso_1 + $semanas_perdida_peso_2)) {
                $peso_iterativo = $peso_iterativo - $perdida_peso_2 / 1000;
            } else {
                $peso_iterativo = $peso_iterativo - $perdida_peso_final / 1000;
            }
            $pesos[] = round($peso_iterativo, 2);
            $semana++;
        }
        return $pesos;
    }
}
