<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;
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
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Borrar_DB_Controller.php';
            $funcion = 'borrar_mensaje_interno';
            $paginaWeb = '/mensajes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
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
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Borrar_DB_Controller.php';
            $funcion = 'borrar_mensaje_externo';
            $paginaWeb = '/mensajes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
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

        try {
            DB::beginTransaction();
            Contacto_Interno::where('id_cliente', $id)->delete();
            Dato_Inicial_Cliente::where('id_cliente', $id)->delete();
            Cliente::where('id_cliente', $id)->delete();
            Peso::where('id_cliente', $id)->delete();
            Plato::where('id_cliente', $id)->delete();
            Texto_Cliente::where('id_cliente', $id)->delete();
            DB::commit();
            $borrado = true;
        } catch (\Exception $e) {
            DB::rollBack();
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Borrar_DB_Controller.php';
            $funcion = 'borrar_cliente';
            $paginaWeb = '/dietas';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
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
            throw $e;
        }
        return $borrado;
    }
}
