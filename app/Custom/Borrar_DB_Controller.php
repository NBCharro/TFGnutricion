<?php

namespace App\Custom;

use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use Illuminate\Support\Facades\DB;

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

    function borrar_cliente($id)
    {
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
}
