<?php

namespace App\Http\Controllers;

use App\Custom\Actualizar_DB_Controller;
use App\Custom\DataBaseController;
use App\Custom\Obtener_DB_Controller;
use Illuminate\Http\Request;

class ComenzarMiPlanController extends Controller
{
    // Pagina que permite a los clientes rellenar la encuesta inicial
    // Web: /comenzarmiplan
    public function comenzarmiplan(Request $id_buscado)
    {
        if ($id_buscado['id_cliente_buscado'] == '') {
            return view('comenzarmiplan');
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

    // Cuando un cliente quiere guardar las respuestas a las preguntas iniciales se invoca esta funcion
    public function guardar_respuestas_comenzarmiplan(Request $preguntas_respuestas_cliente)
    {
        $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
        $preguntas_respuestas = [];
        foreach ($preguntas_respuestas_cliente->request as $pregunta => $respuesta) {
            if ($pregunta != '_token' && $pregunta != 'id_cliente') {
                $preguntas_respuestas[$pregunta] = $respuesta;
            }
        }
        $datos_actualizados = $funciones_actualizar_base_datos->actualizar_preguntas_respuestas($preguntas_respuestas_cliente->id_cliente, $preguntas_respuestas);
        return view('comenzarmiplan')->with('datos_actualizados', $datos_actualizados);
    }
}
