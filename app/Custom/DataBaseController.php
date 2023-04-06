<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;

class DataBaseController
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
        $nombre = $cliente_coincide_db->nombre_apellidos;
        return $nombre;
    }
}
