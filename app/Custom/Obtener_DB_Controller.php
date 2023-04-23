<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;

class Obtener_DB_Controller
{
    function obtener_mensajes_internos()
    {
        /**
         * Obtiene los mensajes internos de la base de datos.
         * @return array Retorna un array asociativo con los mensajes internos.
         */
        $mensajes_internos = [];
        try {
            $mensajes_db = Contacto_Interno::get();
            foreach ($mensajes_db as $value) {
                $mensajes_internos[] = [
                    'id' => $value->id,
                    'id_cliente' => $value->id_cliente,
                    'nombre' => $this->obtener_nombre_mediante_id($value->id_cliente),
                    'fecha' => $value->fecha,
                    'mensaje' => $value->mensaje,
                    'leido' => $value->leido,
                ];
            }
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_mensajes_internos';
            $paginaWeb = '/mensajes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $mensajes_internos;
    }

    function obtener_mensajes_externos()
    {
        /**
         * Obtiene los mensajes externos de la base de datos.
         * @return array Retorna un array asociativo con los mensajes externos.
         */
        $mensajes_externos = [];
        try {
            $mensajes_db = Contacto_Externo::get();
            foreach ($mensajes_db as $value) {
                $mensajes_externos[] = [
                    'id' => $value->id,
                    'nombre' => $value->nombre,
                    'telefono' => $value->telefono,
                    'email' => $value->email,
                    'fecha' => $value->fecha,
                    'mensaje' => $value->mensaje,
                    'leido' => $value->leido,
                ];
            }
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_mensajes_externos';
            $paginaWeb = '/mensajes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $mensajes_externos;
    }

    private function obtener_nombre_mediante_id($id_buscado)
    {
        /**
         * Obtiene el nombre y apellidos de un cliente a partir de su identificador.
         * @param mixed $id_buscado Identificador del cliente.
         * @return string Retorna el nombre y apellidos del cliente.
         */
        $nombre_apellidos = '';
        try {
            $cliente_coincide_db = Cliente::get()->where('id_cliente', $id_buscado)->first();
            $nombre_apellidos = $cliente_coincide_db->nombre_apellidos;
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_nombre_mediante_id';
            $paginaWeb = '/mensajes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $nombre_apellidos;
    }

    function obtener_datos_pesos_grafico($id_cliente)
    {
        /**
         * Obtiene los datos de peso y notas de un cliente para mostrar en un gráfico.
         *
         * @param mixed $id_cliente Identificador del cliente para obtener los datos.
         * @return array Retorna un array asociativo con las siguientes claves:
         *              - fecha: Array con las fechas de los registros.
         *              - peso: Array con los pesos de los registros.
         *              - peso_teorico: Array con los pesos teóricos de los registros.
         *              - nota_pasos: Array con las notas de los registros.
         *              - peso_final_1: Array con los pesos finales 1 de los registros.
         *              - peso_final_2: Array con los pesos finales 2 de los registros.
         */
        $datos_grafico = [];
        try {
            $cliente_existe_DB_peso = Peso::get()->where('id_cliente', $id_cliente);
            if ($cliente_existe_DB_peso) {
                // Obtener fechas, pesos, peso teorico y nota pasos de la tabla peso
                $fechas = [];
                $peso = [];
                $peso_teorico = [];
                $nota_pasos = [];

                foreach ($cliente_existe_DB_peso as $dato) {
                    $fechas[] = $dato->fecha;
                    $peso[] = $dato->peso;
                    $peso_teorico[] = $dato->peso_teorico;
                    $nota_pasos[] = $dato->nota_pasos;
                }

                $datos_grafico = [
                    'id_cliente' => $id_cliente,
                    'fecha' => $fechas,
                    'peso' => $peso,
                    'peso_teorico' => $peso_teorico,
                    'nota_pasos' => $nota_pasos,
                ];

                // Obtener pesos finales de la tabla cliente
                $datos_cliente_DB = Cliente::get()->where('id_cliente', $id_cliente)->first();

                $datos_grafico['peso_final_1'] = array_fill(0, count($fechas), $datos_cliente_DB['peso_final_1']);
                $datos_grafico['peso_final_2'] = array_fill(0, count($fechas), $datos_cliente_DB['peso_final_1']);
            }
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_datos_pesos_grafico';
            $paginaWeb = '/midieta - /clientes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $datos_grafico;
    }

    function obtener_fechas_pesos_notaspasos($id_cliente)
    {
        /**
         * Obtiene los datos de peso y notas de un cliente para mostrar en un gráfico.
         *
         * @param mixed $id_cliente Identificador del cliente para obtener los datos.
         * @return array Retorna un array asociativo con las siguientes claves:
         *              - fecha: Array con las fechas de los registros.
         *              - peso: Array con los pesos de los registros.
         *              - peso_teorico: Array con los pesos teóricos de los registros.
         *              - nota_pasos: Array con las notas de los registros.
         */
        $fechas_pesos_notaspasos = [];
        try {
            $cliente_existe_DB_peso = Peso::get()->where('id_cliente', $id_cliente);
            if ($cliente_existe_DB_peso) {
                // Obtener fechas, pesos y nota pasos de la tabla peso
                $fechas = [];
                $peso = [];
                $nota_pasos = [];

                foreach ($cliente_existe_DB_peso as $dato) {
                    $fechas[] = $dato->fecha;
                    $peso[] = $dato->peso;
                    $nota_pasos[] = $dato->nota_pasos;
                }

                $fechas_pesos_notaspasos = [
                    'id_cliente' => $id_cliente,
                    'fecha' => $fechas,
                    'peso' => $peso,
                    'nota_pasos' => $nota_pasos,
                ];
            }
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_fechas_pesos_notaspasos';
            $paginaWeb = '/midieta - /clientes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $fechas_pesos_notaspasos;
    }

    function obtener_datos_perdida_peso_cliente($id_cliente)
    {
        /**
         * Obtiene los datos de peso y notas de un cliente para mostrar en un gráfico.
         * @param mixed $id_cliente Identificador del cliente para obtener los datos.
         * @return array Retorna un array asociativo con las siguientes claves:
         */
        $datos_perdida_peso = [];
        try {
            $cliente_coincide_db_peso = Peso::get()->where('id_cliente', $id_cliente)->first();
            if ($cliente_coincide_db_peso) {
                $datos_perdida_peso = [
                    'id_cliente' => $cliente_coincide_db_peso->id_cliente,
                    'perdida_peso_1' => $cliente_coincide_db_peso->perdida_peso_1,
                    'semanas_perdida_peso_1' => $cliente_coincide_db_peso->semanas_perdida_peso_1,
                    'perdida_peso_2' => $cliente_coincide_db_peso->perdida_peso_2,
                    'semanas_perdida_peso_2' => $cliente_coincide_db_peso->semanas_perdida_peso_2,
                    'perdida_peso_final' => $cliente_coincide_db_peso->perdida_peso_final,
                ];
            }
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_datos_perdida_peso_cliente';
            $paginaWeb = '/midieta - /clientes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $datos_perdida_peso;
    }

    function obtener_platos_cliente($id_cliente)
    {
        /**
         * Devuelve un array con los platos asignados al cliente correspondiente al id indicado.
         *
         * @param int $id_cliente El id del cliente para el que se desean obtener los platos asignados.
         *
         * @return array El array con la información de los platos asignados al cliente. La estructura del array es la siguiente:
         * - id_cliente: el id del cliente.
         * - desayuno: un array con los platos asignados para el desayuno.
         * - media mañana: un array con los platos asignados para la media mañana.
         * - comida: un array con los platos asignados para la comida.
         * - merienda: un array con los platos asignados para la merienda.
         * - cena: un array con los platos asignados para la cena.
         * - recena: un array con los platos asignados para la recena.
         * - otro: un array con los platos asignados para otro momento del día.
         */
        $platos_cliente = [];
        try {
            $cliente_coincide_db_plato = Plato::get()->where('id_cliente', $id_cliente);
            $desayuno = [];
            $mediamanana = [];
            $comida = [];
            $merienda = [];
            $cena = [];
            $recena = [];
            $otro = [];
            foreach ($cliente_coincide_db_plato as $plato) {
                if ($plato->accion == 'desayuno') {
                    $desayuno[] = $plato->platos;
                }
                if ($plato->accion == 'media mañana') {
                    $mediamanana[] = $plato->platos;
                }
                if ($plato->accion == 'comida') {
                    $comida[] = $plato->platos;
                }
                if ($plato->accion == 'merienda') {
                    $merienda[] = $plato->platos;
                }
                if ($plato->accion == 'cena') {
                    $cena[] = $plato->platos;
                }
                if ($plato->accion == 'recena') {
                    $recena[] = $plato->platos;
                }
                if ($plato->accion == 'otro') {
                    $otro[] = $plato->platos;
                }
            }
            $platos_cliente = [
                'id_cliente' => $id_cliente,
                'desayuno' => $desayuno,
                'mediamanana' => $mediamanana,
                'comida' => $comida,
                'merienda' => $merienda,
                'cena' => $cena,
                'recena' => $recena,
                'otro' => $otro
            ];
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_platos_cliente';
            $paginaWeb = '/midieta - /clientes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $platos_cliente;
    }

    function obtener_texto_dietas_cliente($id_cliente)
    {
        /**
         * Obtiene el texto de las dietas de un cliente en particular.
         *
         * @param mixed $id_cliente Identificador del cliente para obtener los datos.
         * @return array Retorna un array asociativo con las siguientes claves:
         *              - titulo: Array con el titulo de la dieta.
         *              - parrafo1: Array con el primer parrafo de la dieta.
         *              - parrafo2: Array con el segundo parrafo de la dieta.
         *              - ...ingredientes: Multiples arrays con los ingredientes de la dieta.
         */
        $texto_cliente = [];
        try {
            $cliente_coincide_db_texto_cliente = Texto_Cliente::get()->where('id_cliente', $id_cliente);
            if ($cliente_coincide_db_texto_cliente) {
                foreach ($cliente_coincide_db_texto_cliente as $texto) {
                    if ($texto->tipo_texto == 'especifico') {
                        $texto_cliente[$texto->texto1] = $texto->texto2;
                    }
                    if ($texto->tipo_texto == 'general1') {
                        $texto_cliente['titulo'] = $texto->texto1;
                    }
                    if ($texto->tipo_texto == 'general2') {
                        $texto_cliente['parrafo1'] = $texto->texto1;
                    }
                    if ($texto->tipo_texto == 'general3') {
                        $texto_cliente['parrafo2'] = $texto->texto1;
                    }
                }
            }
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_texto_dietas_cliente';
            $paginaWeb = '/midieta - /clientes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $texto_cliente;
    }

    function obtener_preguntas_respuestas_iniciales_cliente($id_cliente)
    {
        /**
         * Obtiene las preguntas y respuestas iniciales de un cliente en particular.
         * @param mixed $id_cliente Identificador del cliente para obtener los datos.
         * @return array Retorna un array asociativo con las preguntas y respuestas iniciales del cliente.
         */
        $pregunta_respuesta = [];
        try {
            $pregunta_respuesta_db = Dato_Inicial_Cliente::get()->where('id_cliente', $id_cliente);
            foreach ($pregunta_respuesta_db as $value) {
                $pregunta_respuesta[$value->pregunta] = $value->respuesta;
            }
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_preguntas_respuestas_iniciales_cliente';
            $paginaWeb = '/comenzarmiplan';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $pregunta_respuesta;
    }

    function obtener_clientes()
    {
        /**
         * Obtiene los clientes de la base de datos.
         *
         * @return array Un array asociativo donde cada clave es el id del cliente y cada valor es el nombre y apellidos del cliente.
         * Ejemplo: [1 => 'nombre1 apellidos1', 2 => 'nombre2 apellidos2', ...]
         */

        $nombre_apellidos = [];
        try {
            $cliente_coincide_db = Cliente::get();
            foreach ($cliente_coincide_db as $cliente) {
                $nombre_apellidos[$cliente->id_cliente] = $cliente->nombre_apellidos;
            }
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_clientes';
            $paginaWeb = '/clientes - /dietas';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $nombre_apellidos;
    }

    function obtener_datos_cliente($id_cliente)
    {
        /**
         * Obtiene los datos de un cliente en particular.
         *
         * @param mixed $id_cliente Identificador del cliente para obtener los datos.
         * @return array Retorna un array asociativo con las siguientes claves:
         * - id_cliente: Identificador del cliente.
         * - nombre_apellidos: Nombre y apellidos del cliente.
         * - telefono: Teléfono del cliente.
         * - email: Email del cliente.
         * - direccion: Dirección del cliente.
         * - fecha_inicio: Fecha de inicio del cliente.
         * - peso_inicial: Peso inicial del cliente.
         * - peso_final_1: Peso final 1 del cliente.
         * - peso_final_2: Peso final 2 del cliente.
         * - perdida_peso_1: Perdida inicial de peso del cliente.
         * - semanas_perdida_1: Semanas perdida peso 1 del cliente.
         * - perdida_peso_2: Perdida de peso numero 2 del cliente.
         * - semanas_perdida_2: Semanas perdiendo peso 2 del cliente.
         * -perdida_peso_final: Perdida de peso final del cliente.
         */
        $cliente = [];
        try {
            $cliente_coincide_db = Cliente::get()->where('id_cliente', $id_cliente)->first();
            $cliente = [
                'id_cliente' => $cliente_coincide_db->id_cliente,
                'nombre_apellidos' => $cliente_coincide_db->nombre_apellidos,
                'telefono' => $cliente_coincide_db->telefono,
                'email' => $cliente_coincide_db->email,
                'direccion' => $cliente_coincide_db->direccion,
                'fecha_inicio' => $cliente_coincide_db->fecha_inicio,
                'peso_inicial' => $cliente_coincide_db->peso_inicial,
                'peso_final_1' => $cliente_coincide_db->peso_final_1,
                'peso_final_2' => $cliente_coincide_db->peso_final_2,
                'perdida_peso_1' => $cliente_coincide_db->perdida_peso_1,
                'semanas_perdida_peso_1' => $cliente_coincide_db->semanas_perdida_peso_1,
                'perdida_peso_2' => $cliente_coincide_db->perdida_peso_2,
                'semanas_perdida_peso_2' => $cliente_coincide_db->semanas_perdida_peso_2,
                'perdida_peso_final' => $cliente_coincide_db->perdida_peso_final
            ];
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Obtener_DB_Controller.php';
            $funcion = 'obtener_datos_cliente';
            $paginaWeb = '/dietas';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $cliente;
    }
}
