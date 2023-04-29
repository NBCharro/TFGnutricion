<?php

namespace App\Custom;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class DataBaseController
{
    public function comprobar_cliente_existe($id_cliente)
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

    public function comprobar_no_existe_conexion_db()
    {
        /**
         * Comprueba si existe una conexion con la base de datos
         * @return bool
         */
        $existe = true;
        try {
            DB::connection()->getPdo();
            $existe = false;
        } catch (\Throwable $th) {
            $existe = true;
        }
        return $existe;
    }
}
