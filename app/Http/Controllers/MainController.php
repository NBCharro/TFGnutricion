<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\DataBaseController;

class MainController extends Controller
{
    // private $funciones_control_base_datos = new DataBaseController;
    public function pruebas(Request $modificar_cliente)
    {
        $funciones_control_base_datos = new DataBaseController;
        $mock_datos_nuevo_cliente = [
            "id_cliente" => "id_cliente",
            "nombre_apellidos" => "Nombre Apellido",
            "telefono" => "111 222 333",
            "email" => "email@gmail.com",
            "direccion" => "Calle Falsa, 123",
            "fecha_inicio" => "2023-04-19",
            "peso_inicial" => "100",
            "peso_final_1" => "80",
            "peso_final_2" => "70"
        ];
        $mock_preguntas_extra_nuevo_cliente = [
            "Pregunta extra 1" => "respuesta",
            "Pregunta extra 2" => "respuesta",
        ];
        // $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        // if ($cliente_existe) {
        //     dump('cliente existe');
        //     return view('pruebas');
        // }
        $cliente_guardado = $funciones_control_base_datos->guardar_cliente_nuevo($mock_datos_nuevo_cliente, $mock_preguntas_extra_nuevo_cliente);
        return view('pruebas');
    }

    public function index()
    {
        return view('inicio');
    }

    public function midieta(Request $id_buscado)
    {
        if ($id_buscado['id_cliente_buscado'] == '') {
            return view('midieta');
        }
        $funciones_control_base_datos = new DataBaseController;
        $id_cliente = $id_buscado['id_cliente_buscado'];
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        if ($cliente_existe) {
            $datos_cliente_grafico = $funciones_control_base_datos->obtener_datos_pesos_grafico($id_cliente);
            $platos_cliente = $funciones_control_base_datos->obtener_platos_cliente($id_cliente);
            $texto_cliente = $funciones_control_base_datos->obtener_texto_dietas_cliente($id_cliente);
            return view('midieta')->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente);
        } else {
            return view('midieta')->with('mensaje', 'No existe');
        }
    }

    public function nuevadieta()
    {
        $funciones_control_base_datos = new DataBaseController;
        $clientes = $funciones_control_base_datos->obtener_clientes();
        return view('dietas')->with('clientes', $clientes);
    }

    public function nuevo_cliente(Request $nuevo_cliente)
    {
        $funciones_control_base_datos = new DataBaseController;
        $id_cliente = $nuevo_cliente->id_cliente;
        dump($nuevo_cliente);
        if ($id_cliente == '') {
            return view('dietas');
        }
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
                $preguntas_extra_nuevo_cliente[$value] = "respuesta";
            }
        }
        dump($preguntas_extra_nuevo_cliente);
        if ($cliente_existe) {
            return view('dietas')->with('cliente_existe', true)->with('cliente_nuevo', $cliente_nuevo)->with('preguntas_extra_nuevo_cliente', $preguntas_extra_nuevo_cliente);
        } else {
            $cliente_guardado = $funciones_control_base_datos->guardar_cliente_nuevo($cliente_nuevo, $preguntas_extra_nuevo_cliente);
            return view('dietas')->with('cliente_guardado', $cliente_guardado);
        }
    }

    public function modificar_cliente(Request $modificar_cliente)
    {
        $funciones_control_base_datos = new DataBaseController;
        $clientes = $funciones_control_base_datos->obtener_clientes();
        dump($modificar_cliente);

        if (isset($modificar_cliente['id_cliente'])) {
            // Significara que se ha pulsado el boton de guardar cambios
            dump($modificar_cliente['id_cliente']);
            // Accedemos a cada recurso de la request:
            // foreach ($modificar_cliente->request as $key => $value) {
            //     dump($key);
            //     dump($value);
            // }
            // return view('');
        }

        if ($modificar_cliente['selectClientes'] == '') {
            return view('dietas')->with('clientes', $clientes);
        }

        $id_cliente = $modificar_cliente['selectClientes'];

        $datos_cliente_seleccionado = $funciones_control_base_datos->obtener_datos_cliente($id_cliente);
        $platos_cliente_seleccionado = $funciones_control_base_datos->obtener_platos_cliente($id_cliente);
        $textos_cliente_seleccionado = $funciones_control_base_datos->obtener_texto_dietas_cliente($id_cliente);
        $pesos_cliente_seleccionado = $funciones_control_base_datos->obtener_datos_pesos_grafico($id_cliente);

        return view('dietas')->with('clientes', $clientes)->with('cliente_seleccionado', $datos_cliente_seleccionado)->with('platos_cliente_seleccionado', $platos_cliente_seleccionado)->with('textos_cliente_seleccionado', $textos_cliente_seleccionado)->with('pesos_cliente_seleccionado', $pesos_cliente_seleccionado);
    }

    public function clientes(Request $id_buscado)
    {
        $funciones_control_base_datos = new DataBaseController;
        $clientes = $funciones_control_base_datos->obtener_clientes();
        if ($id_buscado['selectClientes'] == '') {
            return view('conectado')->with('clientes', $clientes);
        }
        $id_cliente = $id_buscado['selectClientes'];
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        if ($cliente_existe) {
            $datos_cliente_grafico = $funciones_control_base_datos->obtener_datos_pesos_grafico($id_cliente);
            $platos_cliente = $funciones_control_base_datos->obtener_platos_cliente($id_cliente);
            $texto_cliente = $funciones_control_base_datos->obtener_texto_dietas_cliente($id_cliente);
            return view('conectado')->with('clientes', $clientes)->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente);
        } else {
            return view('conectado')->with('mensaje', 'No existe');
        }
    }

    public function mensajes()
    {
        $funciones_control_base_datos = new DataBaseController;
        $mensajes_internos = $funciones_control_base_datos->obtener_mensajes_internos();
        $mensajes_externos = $funciones_control_base_datos->obtener_mensajes_externos();
        return view('mensajes')->with('mensajes_internos', $mensajes_internos)->with('mensajes_externos', $mensajes_externos);
    }

    public function comenzarmiplan(Request $id_buscado)
    {
        if ($id_buscado['id_cliente_buscado'] == '') {
            return view('comenzarmiplan');
        }
        $funciones_control_base_datos = new DataBaseController;
        $id_cliente = $id_buscado['id_cliente_buscado'];
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        if ($cliente_existe) {
            $preguntas_clientes = $funciones_control_base_datos->obtener_preguntas_iniciales_cliente($id_cliente);
            return view('comenzarmiplan')->with('preguntas_clientes', $preguntas_clientes)->with('id_cliente', $id_buscado);
        } else {
            return view('comenzarmiplan')->with('mensaje', 'No existe');
        }
    }
}
