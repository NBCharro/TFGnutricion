<?php

namespace App\Http\Controllers;

use App\Custom\Actualizar_DB_Controller;
use App\Custom\Borrar_DB_Controller;
use App\Custom\Crear_DB_Controller;
use App\Custom\DataBaseController;
use App\Custom\Obtener_DB_Controller;
use Illuminate\Http\Request;

class DietasController extends Controller
{
    public function dietas()
    {
        /**
         * Funcion que permite obtener los clientes de la base de datos y mostrarlos en la pagina
         * Web: /dietas
         * return view('dietas')
         */
        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $clientes = $funciones_obtener_base_datos->obtener_clientes();
        return view('dietas')->with('clientes', $clientes);
    }

    public function nuevo_cliente(Request $nuevo_cliente)
    {
        /**
         * Funcion que permite crear un nuevo cliente en la base de datos
         * Web: /nuevo_cliente
         * return view('dietas')
         */
        $id_cliente = $nuevo_cliente->id_cliente;
        if ($id_cliente == '') {
            return view('dietas');
        }
        $funciones_control_base_datos = new DataBaseController;
        $funciones_crear_base_datos = new Crear_DB_Controller;
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        $cliente_nuevo = [
            "id_cliente" => $nuevo_cliente->id_cliente,
            "nombre_apellidos" => $nuevo_cliente->nombre_apellidos,
            "telefono" => $nuevo_cliente->telefono,
            "email" => $nuevo_cliente->email,
            "direccion" => $nuevo_cliente->direccion,
            "fecha_inicio" => $nuevo_cliente->fecha_inicio,
            "peso_inicial" => $nuevo_cliente->peso_inicial,
            "peso_final_1" => $nuevo_cliente->peso_final_1,
            "peso_final_2" => $nuevo_cliente->peso_final_2
        ];
        $preguntas_extra_nuevo_cliente = [];
        foreach ($nuevo_cliente->request as $key => $value) {
            if (strpos($key, 'pregunta_') !== false && $value != null) {
                $preguntas_extra_nuevo_cliente[] = $value;
            }
        }
        if ($cliente_existe) {
            // Si el cliente ya existe, vuelve a la misma pagina y mantiene los datos del cliente introducidos anteriormente
            return view('dietas')->with('cliente_existe', true)->with('cliente_nuevo', $cliente_nuevo)->with('preguntas_extra_nuevo_cliente', $preguntas_extra_nuevo_cliente);
        } else {
            // SI el cliente no existe, se crea y se redirige a la pagina de dietas
            $cliente_guardado = $funciones_crear_base_datos->crear_cliente_nuevo($cliente_nuevo, $preguntas_extra_nuevo_cliente);
            return view('dietas')->with('cliente_guardado', $cliente_guardado);
        }
    }

    public function modificar_cliente(Request $modificar_cliente)
    {
        /**
         * Funcion que permite obtener los datos de un cliente de la base de datos y mostrarlos en la pagina
         * Web: /modificar_cliente
         * return view('dietas')
         */
        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $clientes = $funciones_obtener_base_datos->obtener_clientes();
        if ($modificar_cliente['selectClientes'] == '') {
            return view('dietas')->with('clientes', $clientes);
        }

        $id_cliente = $modificar_cliente['selectClientes'];

        $datos_cliente_seleccionado = $funciones_obtener_base_datos->obtener_datos_cliente($id_cliente);
        $platos_cliente_seleccionado = $funciones_obtener_base_datos->obtener_platos_cliente($id_cliente);
        $textos_cliente_seleccionado = $funciones_obtener_base_datos->obtener_texto_dietas_cliente($id_cliente);
        $perdida_peso_cliente_seleccionado = $funciones_obtener_base_datos->obtener_datos_perdida_peso_cliente($id_cliente);
        $preguntas_respuestas_cliente_seleccionado = $funciones_obtener_base_datos->obtener_preguntas_respuestas_iniciales_cliente($id_cliente);

        return view('dietas')->with('clientes', $clientes)->with('cliente_seleccionado', $datos_cliente_seleccionado)->with('platos_cliente_seleccionado', $platos_cliente_seleccionado)->with('textos_cliente_seleccionado', $textos_cliente_seleccionado)->with('perdida_peso_cliente_seleccionado', $perdida_peso_cliente_seleccionado)->with('preguntas_respuestas_cliente_seleccionado', $preguntas_respuestas_cliente_seleccionado);
    }

    // Cuando se actualizan los datos de un cliente desde /modificar_cliente se usa la siguiente funcion
    // public function actualizar_cliente(Request $actualizar_cliente)
    public function actualizar_cliente(Request $actualizar_cliente)
    {
        $funciones_actualizar_base_datos = new Actualizar_DB_Controller;
        $datos_cliente = [
            'id_cliente' => $actualizar_cliente->id_cliente,
            'nombre_apellidos' => $actualizar_cliente->nombre_apellidos,
            'telefono' => $actualizar_cliente->telefono,
            'email' => $actualizar_cliente->email,
            'direccion' => $actualizar_cliente->direccion,
            'fecha_inicio' => $actualizar_cliente->fecha_inicio,
            'peso_inicial' => $actualizar_cliente->peso_inicial,
            'peso_final_1' => $actualizar_cliente->peso_final_1,
            'peso_final_2' => $actualizar_cliente->peso_final_2,
        ];

        $peso = [
            'id_cliente' => $actualizar_cliente->id_cliente,
            'fecha_inicio' => $actualizar_cliente->fecha_inicio,
            'peso_inicial' => $actualizar_cliente->peso_inicial,
            'peso_final_1' => $actualizar_cliente->peso_final_1,
            'peso_final_2' => $actualizar_cliente->peso_final_2,
            'perdida_peso_1' => $actualizar_cliente->perdida_peso_1,
            'semanas_perdida_peso_1' => $actualizar_cliente->semanas_perdida_peso_1,
            'perdida_peso_2' => $actualizar_cliente->perdida_peso_2,
            'semanas_perdida_peso_2' => $actualizar_cliente->semanas_perdida_peso_2,
            'perdida_peso_final' => $actualizar_cliente->perdida_peso_final,
        ];

        $platos = [];
        $hora = '';
        foreach ($actualizar_cliente->request as $key => $value) {
            if (substr($key, 0, 13) == "select_plato_") {
                $hora = $value;
            }
            if (substr($key, 0, 12) == "input_plato_" && $value) {
                $platos[$hora][] = $value;
            }
        }

        $textos_especificos = [];
        $alimento = '';
        foreach ($actualizar_cliente->request as $key => $value) {
            if (substr($key, 0, 26) == "texto_particular_alimento_" && $value != '') {
                $alimento = $value;
            }
            if (substr($key, 0, 29) == "texto_particular_descripcion_" && $value != '') {
                $textos_especificos[$alimento] = $value;
            }
        }
        $textos_clientes = [
            'id_cliente' => $actualizar_cliente->id_cliente,
            'texto_general' => [
                'titulo' => $actualizar_cliente->texto_general_titulo,
                'parrafo1' => $actualizar_cliente->texto_general_parrafo_1,
                'parrafo2' => $actualizar_cliente->texto_general_parrafo_2,
            ],
            'texto_particular' => $textos_especificos,
        ];

        // Crear transaccion
        // $clientes_actualizado = $funciones_actualizar_base_datos->actualizar_datos_cliente($datos_cliente);
        // $pesos_actualizado = $funciones_actualizar_base_datos->actualizar_pesos($peso);
        // $platos_actualizado = $funciones_actualizar_base_datos->actualizar_platos($actualizar_cliente->id_cliente, $platos);
        // $textos_actualizado = $funciones_actualizar_base_datos->actualizar_textos_clientes($textos_clientes);
        $actualizar_cliente = $funciones_actualizar_base_datos->actualizar_cliente($datos_cliente, $peso, $actualizar_cliente->id_cliente, $platos, $textos_clientes);

        $mensaje_actualizado = 'fallo';
        // if ($clientes_actualizado && $pesos_actualizado && $platos_actualizado && $textos_actualizado) {
        if ($actualizar_cliente) {
            $mensaje_actualizado = 'exito';
        }

        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $clientes = $funciones_obtener_base_datos->obtener_clientes();
        // Volver a la pagina con los datos del cliente lanzando una alerta de bien o mal
        return view('dietas')->with('clientes', $clientes)->with('mensaje_actualizado', $mensaje_actualizado);
    }

    // Borrado de un cliente de la DB
    // Web: /borrar_cliente
    public function borrar_cliente(Request $id_cliente)
    {
        $funciones_borrar_base_datos = new Borrar_DB_Controller;
        $mensaje_borrado = $funciones_borrar_base_datos->borrar_cliente($id_cliente['id_cliente']);

        $mensaje_cliente_borrado = 'fallo';
        if ($mensaje_borrado) {
            $mensaje_cliente_borrado = 'exito';
        }
        return view('dietas')->with('mensaje_cliente_borrado', $mensaje_cliente_borrado);
    }
}
