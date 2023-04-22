<?php

namespace App\Http\Controllers;

use App\Custom\Actualizar_DB_Controller;
use App\Custom\Borrar_DB_Controller;
use App\Custom\Obtener_DB_Controller;
use Illuminate\Http\Request;

class MensajesController extends Controller
{
    public function mensajes(Request $mensajes)
    {
        /**
         * Funcion que obtiene los mensajes internos y externos
         * @return view('mensajes')
         */
        $with = [];
        $funciones_obtener_base_datos = new Obtener_DB_Controller;

        if ($mensajes->id_mensaje != '' && !isset($mensajes->mensaje_interno_externo)) {
            // Si solo se recibe el id del mensaje, se borra
            $borrar_mensaje = explode("_", $mensajes->id_mensaje);
            $mensaje_borrado = $this->borrar_mensaje($borrar_mensaje[0], $borrar_mensaje[1]);
            $with['mensaje_borrado'] = $mensaje_borrado;
        }

        $mensajes_externos = $funciones_obtener_base_datos->obtener_mensajes_externos();
        if (count($mensajes_externos) > 0) {
            $with['mensajes_externos'] = $mensajes_externos;
            $with['mensaje_mostrado'] = [...$mensajes_externos[0], 'mensaje_interno_externo' => 'externo'];
        }

        $mensajes_internos = $funciones_obtener_base_datos->obtener_mensajes_internos();
        if (count($mensajes_internos) > 0) {
            $with['mensajes_internos'] = $mensajes_internos;
            $with['mensaje_mostrado'] = [...$mensajes_internos[0], 'mensaje_interno_externo' => 'interno'];
        }

        if ($mensajes->id_mensaje != '' && $mensajes->mensaje_interno_externo != '') {
            // Si se recibe el id del mensaje y el tipo de mensaje, se marca como leido
            $this->marcar_mensaje_leido($mensajes->id_mensaje, $mensajes->mensaje_interno_externo);
            // Si el mensaje recibido es interno
            if ($mensajes->mensaje_interno_externo == 'interno') {
                foreach ($mensajes_internos as $key => $mensaje) {
                    if ($mensaje['id'] == $mensajes->id_mensaje) {
                        // Se actualiza el array de mensajes internos con el mensaje marcado como leido
                        $with['mensajes_internos'][$key]['leido'] = 1;
                        // Se actualiza el mensaje mostrado para que aparezca seleccionado
                        $with['mensaje_mostrado'] = [...$mensaje, 'mensaje_interno_externo' => 'interno'];
                    }
                }
            }
            // Si el mensaje recibido es externo
            if ($mensajes->mensaje_interno_externo == 'externo') {
                foreach ($mensajes_externos as $key => $mensaje) {
                    if ($mensaje['id'] == $mensajes->id_mensaje) {
                        $with['mensajes_externos'][$key]['leido'] = 1;
                        $with['mensaje_mostrado'] = [...$mensaje, 'mensaje_interno_externo' => 'externo'];
                    }
                }
            }
        }

        return view('mensajes', $with);
    }

    private function borrar_mensaje($interno_externo, $id_mensaje)
    {
        /**
         * Funcion que borra el mensaje interno o externo
         * @param string $interno_externo
         * @param int $id_mensaje
         * @return bool
         *
         */
        $borrado = "no borrado";
        $funciones_borrar_base_datos = new Borrar_DB_Controller;
        if ($interno_externo == 'interno') {
            $mensaje_borrado = $funciones_borrar_base_datos->borrar_mensaje_interno($id_mensaje);
        } else {
            $mensaje_borrado = $funciones_borrar_base_datos->borrar_mensaje_externo($id_mensaje);
        }
        if ($mensaje_borrado) {
            $borrado = 'borrado';
        }
        return $borrado;
    }

    private function marcar_mensaje_leido($id_mensaje, $interno_externo)
    {
        /**
         * Funcion que actualiza la base de datos con el mensaje marcado como leido
         * @param int $id_mensaje
         * @param string $interno_externo
         * @return bool
         */
        $mensaje_leido = false;
        $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
        if ($interno_externo == 'interno') {
            $mensaje_leido = $funciones_actualizar_base_datos->marcar_mensaje_leido_interno($id_mensaje);
        }
        if ($interno_externo == 'externo') {
            $mensaje_leido = $funciones_actualizar_base_datos->marcar_mensaje_leido_externo($id_mensaje);
        }
        return $mensaje_leido;
    }
}
