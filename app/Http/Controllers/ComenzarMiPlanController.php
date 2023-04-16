<?php

namespace App\Http\Controllers;

use App\Custom\Actualizar_DB_Controller;
use App\Custom\DataBaseController;
use App\Custom\Obtener_DB_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComenzarMiPlanController extends Controller
{
    // Pagina que permite a los clientes rellenar la encuesta inicial
    // Web: /comenzarmiplan
    public function comenzarmiplan(Request $id_buscado)
    {
        if ($id_buscado['id_cliente_buscado'] == '') {
            $alimentosAPI = Http::get('http://localhost:3000/api/v1/lista');
            $listaAlimentosAPI = $alimentosAPI->json();
            return view('comenzarmiplan')->with('listaAlimentosAPI', $listaAlimentosAPI);
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

    // Funcion que obtiene de la API un alimento y devuelve su informacion al usuario
    public function mostrarNutrientesAlimento(Request $alimento)
    {
        $nombreAlimento = $alimento->nombreAlimento;
        $alimentoAPI = Http::get("http://localhost:3000/api/v1/nombre={$nombreAlimento}");
        $alimentoElegidoAPI = $alimentoAPI->json();

        $alimentosAPI = Http::get('http://localhost:3000/api/v1/lista');
        $listaAlimentosAPI = $alimentosAPI->json();

        return view('comenzarmiplan')->with('listaAlimentosAPI', $listaAlimentosAPI)->with('alimentoElegidoAPI', $alimentoElegidoAPI[0]);
    }
}
