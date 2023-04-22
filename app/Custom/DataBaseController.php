<?php

namespace App\Custom;

use App\Models\Cliente;

class DataBaseController
{
    function comprobar_cliente_existe($id_cliente)
    {
        /**
         * Comprueba si existe un cliente en la base de datos
         * @param string $id_cliente
         * @return bool
         */
        $existe = false;
        $cliente_coincide_db = Cliente::get()->where('id_cliente', $id_cliente)->first();
        if ($cliente_coincide_db) {
            $existe = true;
        }
        return $existe;
    }
}
