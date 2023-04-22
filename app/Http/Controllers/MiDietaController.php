<?php

namespace App\Http\Controllers;

use App\Custom\Crear_DB_Controller;
use App\Custom\DataBaseController;
use App\Custom\Obtener_DB_Controller;
use Illuminate\Http\Request;

class MiDietaController extends Controller
{
    public function midieta(Request $id_buscado)
    {
        /**
         * Pagina en la que los clientes podran ver sus datos previa introduccion de un codigo de cliente
         * Web: /midieta
         * @param Request $id_buscado
         * @return view('midieta')
         */
        if ($id_buscado['id_cliente_buscado'] == '') {
            return view('midieta');
        }
        $funciones_control_base_datos = new DataBaseController;
        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $id_cliente = $id_buscado['id_cliente_buscado'];
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        if ($cliente_existe) {
            $datos_cliente_grafico = $funciones_obtener_base_datos->obtener_datos_pesos_grafico($id_cliente);
            $platos_cliente = $funciones_obtener_base_datos->obtener_platos_cliente($id_cliente);
            $texto_cliente = $funciones_obtener_base_datos->obtener_texto_dietas_cliente($id_cliente);
            return view('midieta')->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente);
        } else {
            return view('midieta')->with('mensaje', 'No existe');
        }
    }

    public function mensaje_interno(Request $mensaje)
    {
        /**
         * Permite que un cliente se ponga en contacto con nosotros
         * @return view('midieta')
         */
        $funciones_crear_base_datos = new Crear_DB_Controller;
        $mensaje_externo = [
            "id_cliente" => $mensaje['id_cliente'],
            "fecha" => date("d/m/Y H:i:s"),
            "mensaje" => $mensaje['mensaje']
        ];
        $mensaje_guardado = $funciones_crear_base_datos->guardar_mensaje_interno($mensaje_externo);
        $mensaje_enviado = 'fallo';
        if ($mensaje_guardado) {
            $mensaje_enviado = 'exito';
        }
        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $datos_cliente_grafico = $funciones_obtener_base_datos->obtener_datos_pesos_grafico($mensaje['id_cliente']);
        $platos_cliente = $funciones_obtener_base_datos->obtener_platos_cliente($mensaje['id_cliente']);
        $texto_cliente = $funciones_obtener_base_datos->obtener_texto_dietas_cliente($mensaje['id_cliente']);
        return view('midieta')->with('mensaje_enviado', $mensaje_enviado)->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente);
    }
}
