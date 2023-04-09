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
    function actualizar_pesos($peso)
    {
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
        dump(Plato::get()->where('id_cliente', $id_cliente));
        return $actualizado;
    }
    function actualizar_textos_clientes($textos_clientes)
    {
        $actualizado = false;
        try {
            $texto_general_json = json_encode($textos_clientes['texto_general']);
            $texto_particular_json = json_encode($textos_clientes['texto_particular']);

            $textos_clientes_db = Texto_Cliente::get()->where('id_cliente', $textos_clientes['id_cliente'])->first();
            $textos_clientes_db->id_cliente = $textos_clientes['id_cliente'];
            $textos_clientes_db->texto_general = $texto_general_json;
            $textos_clientes_db->texto_particular = $texto_particular_json;

            $textos_clientes_db->save();
            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }
}
