<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\DataBaseController;
use App\Custom\Actualizar_DB_Controller;
use App\Custom\Borrar_DB_Controller;
use App\Custom\Crear_DB_Controller;
use App\Custom\Obtener_DB_Controller;

class MainController extends Controller
{
    // private $funciones_control_base_datos = new DataBaseController;
    public function pruebas(Request $modificar_cliente)
    {

        return view('pruebas');
    }

    // Pagina inicio
    public function index()
    {
        return view('inicio');
    }

    // Pagina en la que los clientes podran ver sus datos previa introduccion de un codigo de cliente
    // Web: /midieta
    public function midieta(Request $id_buscado)
    {
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

    // Pagina que permite crear nuevas dietas y modificar dietas existentes
    // Web: /dietas
    public function dietas()
    {
        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $clientes = $funciones_obtener_base_datos->obtener_clientes();
        return view('dietas')->with('clientes', $clientes);
    }

    // Pagina en la que se podra crear un nuevo cliente
    // Web: nuevo_cliente
    public function nuevo_cliente(Request $nuevo_cliente)
    {
        $funciones_control_base_datos = new DataBaseController;
        $funciones_crear_base_datos = new Crear_DB_Controller;
        $id_cliente = $nuevo_cliente->id_cliente;
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
        if ($cliente_existe) {
            return view('dietas')->with('cliente_existe', true)->with('cliente_nuevo', $cliente_nuevo)->with('preguntas_extra_nuevo_cliente', $preguntas_extra_nuevo_cliente);
        } else {
            $cliente_guardado = $funciones_crear_base_datos->crear_cliente_nuevo($cliente_nuevo, $preguntas_extra_nuevo_cliente);
            return view('dietas')->with('cliente_guardado', $cliente_guardado);
        }
    }

    // Pagina que modificara un cliente elegido de la lista desplegable
    // Web: /modificar_cliente
    public function modificar_cliente(Request $modificar_cliente)
    {
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
            if (substr($key, 0, 12) == "input_plato_") {
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
        $clientes_actualizado = $funciones_actualizar_base_datos->actualizar_datos_cliente($datos_cliente);
        $pesos_actualizado = $funciones_actualizar_base_datos->actualizar_pesos($peso);
        $platos_actualizado = $funciones_actualizar_base_datos->actualizar_platos($actualizar_cliente->id_cliente, $platos);
        $textos_actualizado = $funciones_actualizar_base_datos->actualizar_textos_clientes($textos_clientes);

        $mensaje_actualizado = 'fallo';
        if ($clientes_actualizado && $pesos_actualizado && $platos_actualizado && $textos_actualizado) {
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

    // Permite obtener un desplegable de todos los clientes
    public function clientes(Request $id_buscado)
    {
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
            return view('conectado')->with('clientes', $clientes)->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente);
        } else {
            return view('conectado')->with('mensaje', 'No existe');
        }
    }

    // Permite que un cliente se ponga en contacto con nosotros
    public function mensaje_interno(Request $mensaje)
    {
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

    // Permite que una persona NO cliente se ponga en contacto con nosotros
    public function mensaje_externo(Request $mensaje)
    {
        $funciones_crear_base_datos = new Crear_DB_Controller;
        $mensaje_externo = [
            "nombre" => $mensaje['nombre'],
            "telefono" => $mensaje['telefono'],
            "email" => $mensaje['email'],
            "fecha" => date("d/m/Y H:i:s"),
            "mensaje" => $mensaje['mensaje']
        ];
        $mensaje_guardado = $funciones_crear_base_datos->guardar_mensaje_externo($mensaje_externo);
        $mensaje_enviado = 'fallo';
        if ($mensaje_guardado) {
            $mensaje_enviado = 'exito';
        }
        return view('inicio')->with('mensaje_enviado', $mensaje_enviado);
    }

    // Permite guardar el peso y la nota_pasos de un cliente
    public function guardar_peso(Request $datos_cliente)
    {
        $nuevo_dato_peso = [
            'id_cliente' => $datos_cliente['id_cliente'],
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

    // Permite volver a la pagina Dietas. Es para separar codigo
    private function volver_dietas_conectado($id_cliente, $mensaje)
    {
        $funciones_obtener_base_datos = new Obtener_DB_Controller;
        $clientes = $funciones_obtener_base_datos->obtener_clientes();
        $datos_cliente_grafico = $funciones_obtener_base_datos->obtener_datos_pesos_grafico($id_cliente);
        $platos_cliente = $funciones_obtener_base_datos->obtener_platos_cliente($id_cliente);
        $texto_cliente = $funciones_obtener_base_datos->obtener_texto_dietas_cliente($id_cliente);
        return view('conectado')->with('mensaje', $mensaje)->with('clientes', $clientes)->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente);
    }
}
