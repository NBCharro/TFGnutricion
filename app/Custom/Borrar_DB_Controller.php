<?php

namespace App\Custom;

use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Peso;
use Illuminate\Support\Facades\DB;

class Borrar_DB_Controller
{
    function borrar_mensaje_interno($id)
    {
        /**
         * Borra un mensaje de la tabla contactos_internos
         * @param $id
         * @return bool
         */
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
        /**
         * Borra un mensaje de la tabla contactos_externos
         * @param $id
         * @return bool
         */
        $borrado = false;
        try {
            $mensaje = Contacto_Externo::get()->where('id', $id)->first();
            $borrado = $mensaje->delete();
        } catch (\Throwable $e) {
        }
        return $borrado;
    }

    function borrar_cliente($id)
    {
        /**
         * Borra todos los datos de un cliente de todas las tablas
         * @param $id
         * @return bool
         */
        $borrado = false;
        DB::beginTransaction();

        try {
            DB::table('contactos_internos')->where('id_cliente', $id)->delete();
            DB::table('datos_iniciales_clientes')->where('id_cliente', $id)->delete();
            DB::table('clientes')->where('id_cliente', $id)->delete();
            DB::table('pesos')->where('id_cliente', $id)->delete();
            DB::table('platos')->where('id_cliente', $id)->delete();
            DB::table('textos_clientes')->where('id_cliente', $id)->delete();
            DB::commit();
            $borrado = true;
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return $borrado;
    }

    function borrar_pesos_cliente($id)
    {
        /**
         * Borra todos los pesos de un cliente
         * @param $id
         * @return bool
         */
        $borrado = false;
        try {
            // Borrar todas las entradas del cliente de la tabla pesos segun su id
            Peso::where('id_cliente', $id)->delete();
        } catch (\Throwable $e) {
        }
        return $borrado;
    }
}
