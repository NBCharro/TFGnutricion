<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Crear_DB_Controller;

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
}
