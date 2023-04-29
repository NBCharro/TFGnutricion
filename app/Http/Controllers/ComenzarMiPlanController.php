<?php

namespace App\Http\Controllers;

use App\Custom\Actualizar_DB_Controller;
use App\Custom\DataBaseController;
use App\Custom\Obtener_DB_Controller;
use Illuminate\Http\Request;

class ComenzarMiPlanController extends Controller
{
    public function comenzarmiplan(Request $id_buscado)
    {
        /**
         * Pagina que permite a los clientes rellenar la encuesta inicial
         * Web: /comenzarmiplan
         * @return view('comenzarmiplan')
         */
        if ($id_buscado['id_cliente_buscado'] == '') {
            return view('comenzarmiplan');
        }

        $funcion_no_existe_conexion_db = new DataBaseController;
        $no_existe_conexion_db = $funcion_no_existe_conexion_db->comprobar_no_existe_conexion_db();
        if ($no_existe_conexion_db) {
            return view('error');
        }

        $funciones_control_base_datos = new DataBaseController;
        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $id_cliente = $id_buscado['id_cliente_buscado'];
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        if ($cliente_existe) {
            $preguntas_respuestas_clientes = $funciones_obtener_base_datos->obtener_preguntas_respuestas_iniciales_cliente($id_cliente);
            return view('comenzarmiplan')->with('preguntas_respuestas_clientes', $preguntas_respuestas_clientes)->with('id_cliente', $id_buscado);
        } else {
            return view('comenzarmiplan')->with('mensaje', 'No existe');
        }
    }

    public function guardar_respuestas_comenzarmiplan(Request $preguntas_respuestas_cliente)
    {
        /**
         * Funcion que guarda las respuestas a las preguntas iniciales
         * @return view('comenzarmiplan')
         */

        $funcion_no_existe_conexion_db = new DataBaseController;
        $no_existe_conexion_db = $funcion_no_existe_conexion_db->comprobar_no_existe_conexion_db();
        if ($no_existe_conexion_db) {
            return view('error');
        }

        $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
        $preguntas_respuestas = [];
        foreach ($preguntas_respuestas_cliente->request as $key => $value) {
            if (strpos($key, 'pregunta_') === 0) {
                $numero = str_replace('pregunta_', '', $key);
                $preguntas_respuestas[$value] = $preguntas_respuestas_cliente['respuesta_' . $numero];
            }
        }
        $datos_actualizados = $funciones_actualizar_base_datos->actualizar_preguntas_respuestas($preguntas_respuestas_cliente->id_cliente, $preguntas_respuestas);
        return view('comenzarmiplan')->with('datos_actualizados', $datos_actualizados);
    }
}
