<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;

class DataBaseController
{
    function comprobar_cliente_existe($id_cliente)
    {
        $existe = false;
        $cliente_coincide_db = Cliente::get()->where('id_cliente', $id_cliente)->first();
        if ($cliente_coincide_db) {
            $existe = true;
        }
        return $existe;
    }

    function obtener_mensajes_internos()
    {
        $mensajes_db = Contacto_Interno::get();
        $mensajes_internos = [];
        foreach ($mensajes_db as $value) {
            $mensajes_internos[] = [
                'id' => $value->id,
                'id_cliente' => $value->id_cliente,
                'nombre' => $this->obtener_nombre_mediante_id($value->id_cliente),
                'fecha' => $value->fecha,
                'mensaje' => $value->mensaje
            ];
        }
        return $mensajes_internos;
    }

    function obtener_mensajes_externos()
    {
        $mensajes_db = Contacto_Externo::get();
        $mensajes_externos = [];
        foreach ($mensajes_db as $value) {
            $mensajes_externos[] = [
                'id' => $value->id,
                'nombre' => $value->nombre,
                'telefono' => $value->telefono,
                'email' => $value->telefono,
                'fecha' => $value->fecha,
                'mensaje' => $value->mensaje
            ];
        }
        return $mensajes_externos;
    }

    private function obtener_nombre_mediante_id($id_buscado)
    {
        $cliente_coincide_db = Cliente::get()->where('id_cliente', $id_buscado)->first();
        $nombre = $cliente_coincide_db->nombre_apellidos;
        return $nombre;
    }

    function obtener_datos_pesos_grafico($id_cliente)
    {
        $cliente_coincide_db_peso = Peso::get()->where('id_cliente', $id_cliente)->first();
        $datos_pesos = [
            'id_cliente' => $id_cliente,
            'fecha' => json_decode(str_replace("'", '"', $cliente_coincide_db_peso->fecha), true),
            'peso' => json_decode(str_replace("'", '"', $cliente_coincide_db_peso->peso), true),
            'nota_pasos' => json_decode(str_replace("'", '"', $cliente_coincide_db_peso->nota_pasos), true),
            'peso_teorico' => json_decode(str_replace("'", '"', $cliente_coincide_db_peso->peso_teorico), true),
        ];
        $cliente_coincide_db_cliente = Cliente::get()->where('id_cliente', $id_cliente)->first();
        $datos_cliente = [
            'peso_final_1' => $cliente_coincide_db_cliente->peso_final_1,
            'peso_final_2' => $cliente_coincide_db_cliente->peso_final_2
        ];
        $peso_final_1_array = array_fill(0, count($datos_pesos['fecha']), $datos_cliente['peso_final_1']);
        $peso_final_2_array = array_fill(0, count($datos_pesos['fecha']), $datos_cliente['peso_final_2']);
        $datos_grafico = [...$datos_pesos, 'peso_final_1' => $peso_final_1_array, 'peso_final_2' => $peso_final_2_array];
        return $datos_grafico;
    }

    function obtener_platos_cliente($id_cliente)
    {
        $cliente_coincide_db_plato = Plato::get()->where('id_cliente', $id_cliente);
        $desayuno = [];
        $mediamanana = [];
        $comida = [];
        $merienda = [];
        $cena = [];
        $recena = [];
        $otro = [];
        foreach ($cliente_coincide_db_plato as $plato) {
            if ($plato->accion == 'desayuno') {
                $desayuno = json_decode(str_replace("'", '"', $plato->platos), true);
            }
            if ($plato->accion == 'media mañana') {
                $mediamanana = json_decode(str_replace("'", '"', $plato->platos), true);
            }
            if ($plato->accion == 'comida') {
                $comida = json_decode(str_replace("'", '"', $plato->platos), true);
            }
            if ($plato->accion == 'merienda') {
                $merienda = json_decode(str_replace("'", '"', $plato->platos), true);
            }
            if ($plato->accion == 'cena') {
                $cena = json_decode(str_replace("'", '"', $plato->platos), true);
            }
            if ($plato->accion == 'recena') {
                $recena = json_decode(str_replace("'", '"', $plato->platos), true);
            }
            if ($plato->accion == 'otro') {
                $otro = json_decode(str_replace("'", '"', $plato->platos), true);
            }
        }
        $platos_cliente = [
            'id_cliente' => $id_cliente,
            'desayuno' => $desayuno,
            'mediamanana' => $mediamanana,
            'comida' => $comida,
            'merienda' => $merienda,
            'cena' => $cena,
            'recena' => $recena,
            'otro' => $otro
        ];
        return $platos_cliente;
    }

    function obtener_texto_dietas_cliente($id_cliente)
    {
        $cliente_coincide_db_texto_cliente = Texto_Cliente::get()->where('id_cliente', $id_cliente)->first();
        $texto_general = json_decode(str_replace("'", '"', $cliente_coincide_db_texto_cliente->texto_general), true);
        $texto_particular = json_decode(str_replace("'", '"', $cliente_coincide_db_texto_cliente->texto_particular), true);
        $titulo = $texto_general['titulo'];
        $parrafo1 = $texto_general['parrafo1'];
        $parrafo2 = $texto_general['parrafo2'];
        $texto_cliente = [
            'titulo' => $titulo,
            'parrafo1' => $parrafo1,
            'parrafo2' => $parrafo2,
        ];
        foreach ($texto_particular as $nombre => $texto) {
            $texto_cliente[$nombre] = $texto;
        }
        return $texto_cliente;
    }

    function obtener_preguntas_respuestas_iniciales_cliente($id_cliente)
    {
        $pregunta_respuesta_db = Dato_Inicial_Cliente::get()->where('id_cliente', $id_cliente)->first();
        $pregunta_respuesta_json = json_decode($pregunta_respuesta_db->pregunta_respuesta);
        $pregunta_respuesta = [];
        foreach ($pregunta_respuesta_json as $key => $value) {
            $pregunta_respuesta[$key] = $value;
        }
        return $pregunta_respuesta;
    }

    function obtener_preguntas_iniciales_cliente($id_cliente)
    {
        $pregunta_respuesta = $this->obtener_preguntas_respuestas_iniciales_cliente($id_cliente);
        $preguntas_cliente = [];
        $index = 1;
        foreach ($pregunta_respuesta as $pregunta => $respuesta) {
            $preguntas_cliente["pregunta_$index"] = $pregunta;
            $index++;
        }
        return $preguntas_cliente;
    }
}
