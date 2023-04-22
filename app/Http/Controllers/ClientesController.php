<?php

namespace App\Http\Controllers;

use App\Custom\Actualizar_DB_Controller;
use App\Custom\DataBaseController;
use App\Custom\Obtener_DB_Controller;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    // Permite obtener un desplegable de todos los clientes
    public function clientes(Request $id_buscado)
    {
        /**
         * Pagina en la que los clientes podran ver sus datos previa introduccion de un codigo de cliente
         * Web: /clientes
         * @param Request $id_buscado
         * @return view('conectado')
         */
        $funciones_control_base_datos = new DataBaseController;
        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $clientes = $funciones_obtener_base_datos->obtener_clientes();
        if ($id_buscado['selectClientes'] == '') {
            return view('conectado')->with('clientes', $clientes);
        }
        $id_cliente = $id_buscado['selectClientes'];
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        if ($cliente_existe) {
            $datos_cliente_grafico = $funciones_obtener_base_datos->obtener_datos_pesos_grafico($id_cliente);
            $platos_cliente = $funciones_obtener_base_datos->obtener_platos_cliente($id_cliente);
            $texto_cliente = $funciones_obtener_base_datos->obtener_texto_dietas_cliente($id_cliente);
            $fechas_pesos_notaspasos = $funciones_obtener_base_datos->obtener_fechas_pesos_notaspasos($id_cliente);
            return view('conectado')->with('clientes', $clientes)->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente)->with('fechas_pesos_notaspasos', $fechas_pesos_notaspasos);
        } else {
            return view('conectado')->with('mensaje', 'No existe');
        }
    }

    public function guardar_peso(Request $datos_cliente)
    {
        /**
         * Permite guardar el peso y la nota_pasos de un cliente
         * @param Request $datos_cliente
         * @return funcion volver_dietas_conectado()
         */
        $nuevo_dato_peso = [
            'id_cliente' => $datos_cliente['id_cliente'],
            'fecha' => $datos_cliente['fechaPeso'],
            'peso' => $datos_cliente['peso'],
            'nota_pasos' => $datos_cliente['nota_pasos'],
        ];

        $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
        $datos_peso_actualizados = $funciones_actualizar_base_datos->actualizar_nuevo_peso($nuevo_dato_peso);
        if ($datos_peso_actualizados) {
            return $this->volver_dietas_conectado($datos_cliente['id_cliente'], 'exito');
        }
        return $this->volver_dietas_conectado($datos_cliente['id_cliente'], 'fallo');
    }

    private function volver_dietas_conectado($id_cliente, $mensaje)
    {
        /**
         * Permite volver a la pagina Dietas
         * @param string $id_cliente
         * @param string $mensaje
         * @return view('conectado')
         */
        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $clientes = $funciones_obtener_base_datos->obtener_clientes();
        $datos_cliente_grafico = $funciones_obtener_base_datos->obtener_datos_pesos_grafico($id_cliente);
        $platos_cliente = $funciones_obtener_base_datos->obtener_platos_cliente($id_cliente);
        $texto_cliente = $funciones_obtener_base_datos->obtener_texto_dietas_cliente($id_cliente);
        $fechas_pesos_notaspasos = $funciones_obtener_base_datos->obtener_fechas_pesos_notaspasos($id_cliente);
        return view('conectado')->with('mensaje', $mensaje)->with('clientes', $clientes)->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente)->with('fechas_pesos_notaspasos', $fechas_pesos_notaspasos);
    }
}
