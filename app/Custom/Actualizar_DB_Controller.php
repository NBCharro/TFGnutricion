<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;

use App\Custom\Crear_DB_Controller;
use Illuminate\Support\Facades\DB;

class Actualizar_DB_Controller
{

    function actualizar_preguntas_respuestas($id_cliente, $preguntas_respuestas)
    {
        /**
         * Funcion que actualiza las preguntas y respuestas iniciales de un cliente de la base de datos
         * @param $id_cliente: id del cliente
         * @param $preguntas_respuestas: array con las preguntas y respuestas
         * @return bool
         */
        $actualizado = false;
        try {
            foreach ($preguntas_respuestas as $pregunta => $respuesta) {
                Dato_Inicial_Cliente::where(['id_cliente' => $id_cliente, 'pregunta' => $pregunta])->update(['respuesta' => $respuesta]);
            }
            $actualizado = true;
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Actualizar_DB_Controller.php';
            $funcion = 'actualizar_preguntas_respuestas';
            $paginaWeb = '/comenzarmiplan';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $actualizado;
    }

    function actualizar_nuevo_peso($nuevo_dato_peso)
    {
        /**
         * Funcion que actualiza un nuevo dato de peso en la base de datos
         * @param $nuevo_dato_peso: array con los datos del nuevo peso
         * @return bool
         */
        $actualizado = false;
        try {
            // Si el cliente quiere empezar a usar nota_pasos hay que actualizar la DB de las entradas anteriores a la fecha de inicio
            if ($nuevo_dato_peso['nota_pasos'] > 0) {
                // Buscar todas las entradas anteriores a la fecha dada con nota igual a 0
                $entradas = Peso::get()->where('id_cliente', $nuevo_dato_peso['id_cliente']);
                // Actualizar las entradas encontradas con nota igual a 5 o con los pasos del cliente
                $valor_nota_pasos = 5;
                if ($nuevo_dato_peso['nota_pasos'] > 10) {
                    $valor_nota_pasos = $nuevo_dato_peso['nota_pasos'];
                }
                foreach ($entradas as $entrada) {
                    if ($entrada->nota_pasos == 0 && strtotime($entrada->fecha) < strtotime($nuevo_dato_peso['fecha'])) {
                        Peso::where(['id_cliente' => $entrada->id_cliente, 'fecha' => $entrada->fecha])->update(['nota_pasos' => $valor_nota_pasos]);
                    }
                }
            }
            Peso::where(['id_cliente' => $nuevo_dato_peso['id_cliente'], 'fecha' => $nuevo_dato_peso['fecha']])
                ->update([
                    'peso' => $nuevo_dato_peso['peso'],
                    'nota_pasos' => $nuevo_dato_peso['nota_pasos'],
                ]);
            $actualizado = true;
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Actualizar_DB_Controller.php';
            $funcion = 'actualizar_nuevo_peso';
            $paginaWeb = '/clientes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $actualizado;
    }

    function marcar_mensaje_leido_interno($id_mensaje)
    {
        /**
         * Marca un mensaje interno como leido
         * @param int $id_mensaje
         * @return bool
         */
        $actualizado = false;
        try {
            $mensaje_db = Contacto_Interno::get()->where('id', $id_mensaje)->first();

            if ($mensaje_db->leido != 1) {
                $mensaje_db->leido = 1;
                $mensaje_db->save();
                $actualizado = true;
            }
        } catch (\Throwable $e) {
            $actualizado = 'error';
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Actualizar_DB_Controller.php';
            $funcion = 'marcar_mensaje_leido_interno';
            $paginaWeb = '/mensajes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $actualizado;
    }

    function marcar_mensaje_leido_externo($id_mensaje)
    {
        /**
         * Marca un mensaje externo como leido
         * @param int $id_mensaje
         * @return bool
         */
        $actualizado = false;
        try {
            $mensaje_db = Contacto_Externo::get()->where('id', $id_mensaje)->first();

            if ($mensaje_db->leido != 1) {
                $mensaje_db->leido = 1;
                $mensaje_db->save();
                $actualizado = true;
            }
        } catch (\Throwable $e) {
            $actualizado = 'error';
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Actualizar_DB_Controller.php';
            $funcion = 'marcar_mensaje_leido_externo';
            $paginaWeb = '/mensajes';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $actualizado;
    }

    // Transaccion
    public function actualizar_cliente($datos_cliente, $peso_cliente, $id_cliente, $platos, $textos_clientes)
    {
        $actualizado = false;

        try {
            DB::beginTransaction();

            $this->actualizar_datos_cliente($datos_cliente);
            $this->actualizar_pesos_cliente($peso_cliente);
            $this->actualizar_platos_cliente($id_cliente, $platos);
            $this->actualizar_textos_clientes($id_cliente, $textos_clientes);

            DB::commit();
            $actualizado = true;
        } catch (\Exception $e) {
            DB::rollBack();
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Actualizar_DB_Controller.php';
            $funcion = 'actualizar_cliente';
            $paginaWeb = '/dietas';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }

        return $actualizado;
    }

    private function actualizar_datos_cliente($datos_cliente)
    {
        /**
         * Funcion que actualiza los datos del cliente de la tabla clientes
         * @param array $datos_cliente
         * @return boolean
         */
        $actualizado = false;
        try {
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['nombre_apellidos' => $datos_cliente['nombre_apellidos']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['telefono' => $datos_cliente['telefono']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['email' => $datos_cliente['email']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['direccion' => $datos_cliente['direccion']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['fecha_inicio' => $datos_cliente['fecha_inicio']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['peso_inicial' => $datos_cliente['peso_inicial']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['peso_final_1' => $datos_cliente['peso_final_1']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['peso_final_2' => $datos_cliente['peso_final_2']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['perdida_peso_1' => $datos_cliente['perdida_peso_1']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['semanas_perdida_peso_1' => $datos_cliente['semanas_perdida_peso_1']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['perdida_peso_2' => $datos_cliente['perdida_peso_2']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['semanas_perdida_peso_2' => $datos_cliente['semanas_perdida_peso_2']]);
            Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['perdida_peso_final' => $datos_cliente['perdida_peso_final']]);
            $actualizado = true;
        } catch (\Throwable $e) {
            throw $e;
        }
        return $actualizado;
    }

    private function actualizar_pesos_cliente($peso_cliente)
    {
        /**
         * Funcion que actualiza los datos de la tabla pesos
         * @param array $peso_cliente
         * @return boolean
         */
        $actualizado = false;
        try {
            // Obtengo los datos anteriores de la tabla pesos
            $peso_cliente_db = Peso::get()->where('id_cliente', $peso_cliente['id_cliente']);
            // Si no hay datos anteriores se generan nuevos datos
            if (count($peso_cliente_db) == 0) {
                $pesos = [];
                $nota_pasos = [];
                // Generamos los pesos teoricos con sus fechas correspondientes
                $array_fecha_peso = $this->obtener_array_fechas_pesos_teoricos($peso_cliente);
                $fechas = array_keys($array_fecha_peso);
                $peso_teorico = array_values($array_fecha_peso);
                // Creamos los nuevos datos en la base de datos
                $funciones_crear_base_datos = new Crear_DB_Controller;
                $funciones_crear_base_datos->crear_nuevos_pesos($peso_cliente['id_cliente'], $fechas, $pesos, $peso_teorico, $nota_pasos);
            }
            // Si hay cambios en los datos del cliente se borran los pesos anteriores y se generan nuevos
            $cambian_datos_cliente = $this->comparar_datos_pesos_cliente($peso_cliente);
            if ($cambian_datos_cliente) {
                // Borramos las entradas anteriores para que no haya duplicados ni conflictos
                $funciones_borrar_base_datos = new Borrar_DB_Controller;
                $funciones_borrar_base_datos->borrar_pesos_cliente($peso_cliente['id_cliente']);
                // Guardamos los pesos anteriores y las notas_pasos de la base de datos en arrays independientes
                $pesos = [];
                $nota_pasos = [];
                foreach ($peso_cliente_db as $value) {
                    $pesos[] = $value['peso'];
                    $nota_pasos[] = $value['nota_pasos'];
                }
                // Generamos los pesos teoricos con sus fechas correspondientes
                $array_fecha_peso = $this->obtener_array_fechas_pesos_teoricos($peso_cliente);
                $fechas = array_keys($array_fecha_peso);
                $peso_teorico = array_values($array_fecha_peso);
                // Creamos las entradas con los nuevos valores
                $funciones_crear_base_datos = new Crear_DB_Controller;
                $funciones_crear_base_datos->crear_nuevos_pesos($peso_cliente['id_cliente'], $fechas, $pesos, $peso_teorico, $nota_pasos);
            }
            // Si el cliente ya existia en la base de datos y no cambian datos, no se hace nada
            $actualizado = true;
        } catch (\Throwable $e) {
            throw $e;
        }
        return $actualizado;
    }

    private function obtener_array_fechas_pesos_teoricos($peso_cliente)
    {
        /**
         * Funcion que devuelve un array con fechas y pesos teoricos en formato ['d-m-Y' => number]
         * @param $peso_cliente array con los datos del cliente
         * @return array con fechas y pesos teoricos
         */
        $fecha_inicio = $peso_cliente['fecha_inicio'];
        $peso_inicial = $peso_cliente['peso_inicial'];
        $peso_final_1 = $peso_cliente['peso_final_1'];
        $peso_final_2 = $peso_cliente['peso_final_2'];
        $perdida_peso_1 = $peso_cliente['perdida_peso_1'];
        $semanas_perdida_peso_1 = $peso_cliente['semanas_perdida_peso_1'];
        $perdida_peso_2 = $peso_cliente['perdida_peso_2'];
        $semanas_perdida_peso_2 = $peso_cliente['semanas_perdida_peso_2'];
        $perdida_peso_final = $peso_cliente['perdida_peso_final'];
        $array_pesos_teoricos = $this->fechas_pesos_teoricos($fecha_inicio, $peso_inicial, $peso_final_1, $peso_final_2, $perdida_peso_1, $semanas_perdida_peso_1, $perdida_peso_2, $semanas_perdida_peso_2, $perdida_peso_final);

        $array_fecha_peso = [];
        foreach ($array_pesos_teoricos as $key => $value) {
            $array_fecha_peso[date('d-m-Y', $key)] = $value;
        }
        return $array_fecha_peso;
    }

    private function fechas_pesos_teoricos($fecha_inicio, $peso_inicial, $peso_final_1, $peso_final_2, $perdida_peso_1, $semanas_perdida_peso_1, $perdida_peso_2, $semanas_perdida_peso_2, $perdida_peso_final)
    {
        /**
         * Funcion que calcula la perdida de peso semanal del cliente
         * @return [fecha => peso_teorico]
         */
        if ($perdida_peso_final == 0) {
            return [];
        }

        $pesos = [];
        $semana = 1;

        $peso_iterativo = $peso_inicial;
        $peso_fin = $peso_final_1;
        if ($peso_final_2 > 0) {
            $peso_fin = $peso_final_2;
        }
        $pesos[strtotime($fecha_inicio)] = intval($peso_iterativo);
        while ($peso_iterativo > $peso_fin) {
            if ($semana < $semanas_perdida_peso_1) {
                $peso_iterativo = $peso_iterativo - $perdida_peso_1 / 1000;
            } elseif ($perdida_peso_2 > 0 && $semanas_perdida_peso_2 > 0 && $semana < ($semanas_perdida_peso_1 + $semanas_perdida_peso_2)) {
                $peso_iterativo = $peso_iterativo - $perdida_peso_2 / 1000;
            } else {
                $peso_iterativo = $peso_iterativo - $perdida_peso_final / 1000;
            }
            $fecha = strtotime($fecha_inicio . "+ " . $semana . " week");
            $pesos[$fecha] = round($peso_iterativo, 2);
            $semana++;
        }
        return $pesos;
    }

    private function comparar_datos_pesos_cliente($peso_cliente)
    {
        /**
         * Funcion que compara los datos de un cliente con los de la base de datos
         * @param $peso_cliente array con los datos del cliente
         * @return boolean true si los datos son iguales, false si cambian
         */
        $cambian = false;
        try {
            $datos_cliente_db = Cliente::get()->where('id_cliente', $peso_cliente['id_cliente'])->first();
            if (
                $peso_cliente['peso_inicial'] != $datos_cliente_db['peso_inicial'] ||
                $peso_cliente['peso_final_1'] != $datos_cliente_db['peso_final_1'] ||
                $peso_cliente['peso_final_2'] != $datos_cliente_db['peso_final_2'] ||
                $peso_cliente['perdida_peso_1'] != $datos_cliente_db['perdida_peso_1'] ||
                $peso_cliente['semanas_perdida_peso_1'] != $datos_cliente_db['semanas_perdida_peso_1'] ||
                $peso_cliente['perdida_peso_2'] != $datos_cliente_db['perdida_peso_2'] ||
                $peso_cliente['semanas_perdida_peso_2'] != $datos_cliente_db['semanas_perdida_peso_2'] ||
                $peso_cliente['perdida_peso_final'] != $datos_cliente_db['perdida_peso_final']
            ) {
                $cambian = true;
            }
        } catch (\Throwable $e) {
            $funciones_crear_base_datos = new Crear_DB_Controller;
            $archivo = '/app/Custom/Actualizar_DB_Controller.php';
            $funcion = 'comparar_datos_pesos_cliente';
            $paginaWeb = '/dietas';
            $funciones_crear_base_datos->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $cambian;
    }

    private function actualizar_platos_cliente($id_cliente, $platos)
    {
        /**
         * Funcion que actualiza los platos de un cliente
         * @param $id_cliente id del cliente
         * @param $platos array con los platos: ['desayuno'=>['tostadas','magdalenas]]
         * @return boolean true si se actualiza, false si no
         */
        $actualizado = false;
        try {
            // Borro todos los anteriores
            Plato::where('id_cliente', $id_cliente)->delete();
            // Introduzco los nuevos datos
            $funciones_crear_base_datos = new Crear_DB_Controller;
            foreach ($platos as $key => $array_platos) {
                $accion = strtolower($key);
                foreach ($array_platos as $plato) {
                    $funciones_crear_base_datos->crear_nuevo_plato($id_cliente, $accion, $plato);
                }
            }
            $actualizado = true;
        } catch (\Throwable $e) {
            throw $e;
        }
        return $actualizado;
    }

    private function actualizar_textos_clientes($id_cliente, $textos_clientes)
    {
        /**
         * Funcion que actualiza los textos de un cliente
         * @param $id_cliente id del cliente
         * @param $textos_clientes array con los textos [[$tipo_texto, texto1, texto2]]
         * @return boolean true si se actualiza, false si no
         */
        $actualizado = false;
        try {
            // Borro todos los anteriores
            Texto_Cliente::where('id_cliente', $id_cliente)->delete();
            // // Creo los textos
            $funciones_crear_base_datos = new Crear_DB_Controller;
            foreach ($textos_clientes as $key => $textos) {
                $funciones_crear_base_datos->crear_textos_clientes($id_cliente, $key, $textos);
            }
            $actualizado = true;
        } catch (\Throwable $e) {
            throw $e;
        }
        return $actualizado;
    }
}
