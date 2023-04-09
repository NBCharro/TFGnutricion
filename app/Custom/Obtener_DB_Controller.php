<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;

class Obtener_DB_Controller
{
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
        $nombre_apellidos = $cliente_coincide_db->nombre_apellidos;
        return $nombre_apellidos;
    }

    function obtener_datos_pesos_grafico($id_cliente)
    {
        $cliente_coincide_db_peso = Peso::get()->where('id_cliente', $id_cliente)->first();
        $datos_grafico = [];
        if ($cliente_coincide_db_peso) {
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
        }
        return $datos_grafico;
    }

    function obtener_datos_perdida_peso_cliente($id_cliente)
    {
        $cliente_coincide_db_peso = Peso::get()->where('id_cliente', $id_cliente)->first();
        $datos_perdida_peso = [];
        if ($cliente_coincide_db_peso) {
            $datos_perdida_peso = [
                'id_cliente' => $cliente_coincide_db_peso->id_cliente,
                'perdida_peso_1' => $cliente_coincide_db_peso->perdida_peso_1,
                'semanas_perdida_peso_1' => $cliente_coincide_db_peso->semanas_perdida_peso_1,
                'perdida_peso_2' => $cliente_coincide_db_peso->perdida_peso_2,
                'semanas_perdida_peso_2' => $cliente_coincide_db_peso->semanas_perdida_peso_2,
                'perdida_peso_final' => $cliente_coincide_db_peso->perdida_peso_final,
            ];
        }
        return $datos_perdida_peso;
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
        $texto_cliente = [];
        if ($cliente_coincide_db_texto_cliente) {
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

    function obtener_clientes()
    {
        $cliente_coincide_db = Cliente::get();
        $nombre_apellidos = [];
        foreach ($cliente_coincide_db as $cliente) {
            $nombre_apellidos[$cliente->id_cliente] = $cliente->nombre_apellidos;
        }
        return $nombre_apellidos;
    }

    function obtener_datos_cliente($id_cliente)
    {
        $cliente_coincide_db = Cliente::get()->where('id_cliente', $id_cliente)->first();
        $cliente = [
            'id_cliente' => $cliente_coincide_db->id_cliente,
            'nombre_apellidos' => $cliente_coincide_db->nombre_apellidos,
            'telefono' => $cliente_coincide_db->telefono,
            'email' => $cliente_coincide_db->email,
            'direccion' => $cliente_coincide_db->direccion,
            'fecha_inicio' => $cliente_coincide_db->fecha_inicio,
            'peso_inicial' => $cliente_coincide_db->peso_inicial,
            'peso_final_1' => $cliente_coincide_db->peso_final_1,
            'peso_final_2' => $cliente_coincide_db->peso_final_2
        ];
        return $cliente;
    }
}
