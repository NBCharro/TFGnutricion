<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;

class Borrar_DB_Controller
{
    function borrar_mensaje_interno($id)
    {
        $borrado = false;
        try {
            $mensaje = Contacto_Interno::get()->where('id', $id)->first();
            $borrado = $mensaje->delete();
        } catch (\Throwable $e) {
        }
        return $borrado;
    }

    function borrar_mensaje_externo($id)
    {
        $borrado = false;
        try {
            $mensaje = Contacto_Externo::get()->where('id', $id)->first();
            $borrado = $mensaje->delete();
        } catch (\Throwable $e) {
        }
        return $borrado;
    }
}
