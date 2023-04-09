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
}
