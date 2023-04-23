<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Error;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;

class Crear_DB_Controller
{
    function crear_nuevos_pesos($id_cliente, $fechas, $pesos, $peso_teorico, $nota_pasos)
    {
        /**
         * Crea las entradas de fechas y pesos teoricos de un cliente
         * @param $id_cliente
         * @param [$fechas]
         * @param [$pesos]
         * @param [$peso_teorico]
         * @param [$nota_pasos]
         * @return bool
         */
        $guardado = false;
        try {
            for ($i = 0; $i < count($fechas); $i++) {
                $peso = isset($pesos[$i]) ? $pesos[$i] : 0;
                $nota_pasos = isset($nota_pasos[$i]) ? $nota_pasos[$i] : 0;
                Peso::create([
                    'id_cliente' => $id_cliente,
                    'fecha' => $fechas[$i],
                    'peso' => $peso,
                    'peso_teorico' => $peso_teorico[$i],
                    'nota_pasos' => $nota_pasos
                ]);
            }
            // Establezco el primer peso igual al peso teorico porque es desde donde comienza
            Peso::where(['id_cliente' => $id_cliente, 'fecha' => $fechas[0],])->update([
                'peso' => $peso_teorico[0]
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
            throw $e;
        }
        return $guardado;
    }

    function crear_textos_clientes($id_cliente, $tipo, $texto)
    {
        /**
         * Crea los textos de un cliente en la tabla texto_cliente
         * @param $id_cliente
         * @param $tipo: enum [general1, general2, general3, especifico]
         * @param $texto
         * @return bool
         */
        $guardado = false;
        try {
            if ($tipo == 'general1' || $tipo == 'general2' || $tipo == 'general3') {
                Texto_Cliente::create([
                    'id_cliente' => $id_cliente,
                    'tipo_texto' => $tipo,
                    'texto1' => $texto,
                    'texto2' => ''
                ]);
            }
            if ($tipo == 'texto_particular') {
                foreach ($texto as $alimento => $texto) {
                    Texto_Cliente::create([
                        'id_cliente' => $id_cliente,
                        'tipo_texto' => "especifico",
                        'texto1' => $alimento,
                        'texto2' => $texto
                    ]);
                }
            }
            $guardado = true;
        } catch (\Throwable $e) {
            throw $e;
        }
        return $guardado;
    }

    function crear_nuevo_plato($id_cliente, $accion, $plato)
    {
        /**
         * Crea un nuevo plato en la tabla plato
         * @param $id_cliente
         * @param $accion: enum ['desayuno','media manaña','comida','merienda','cena','recena','otro']
         * @param $plato: array
         * @return bool
         */
        $creado = false;
        try {
            Plato::create([
                "id_cliente" => $id_cliente,
                "accion" => $accion,
                "platos" => $plato
            ]);
            $creado = true;
        } catch (\Throwable $e) {
            throw $e;
        }
        return $creado;
    }

    public function crear_cliente_nuevo($datos_nuevo_cliente, $preguntas_extra_nuevo_cliente)
    {
        /**
         * Crea un nuevo cliente en la base de datos, en las tablas cliente y datos_iniciales_cliente
         * @param array $datos_nuevo_cliente
         * @param array $preguntas_extra_nuevo_cliente
         * @return boolean
         */
        $guardado = false;
        try {
            $guardado_datos_cliente = $this->guardar_db_nuevo_cliente($datos_nuevo_cliente);

            $id_cliente = $datos_nuevo_cliente['id_cliente'];
            $fecha = $datos_nuevo_cliente['fecha_inicio'];
            $guardado_preguntas_cliente = $this->guardar_db_datos_iniciales_nuevo_cliente($id_cliente, $fecha, $preguntas_extra_nuevo_cliente);

            if ($guardado_datos_cliente && $guardado_preguntas_cliente) {
                $guardado = true;
            }
        } catch (\Throwable $e) {
            $archivo = '/app/Custom/Crear_DB_Controller.php';
            $funcion = 'crear_cliente_nuevo';
            $paginaWeb = '/dietas';
            $this->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }

        return $guardado;
    }

    private function guardar_db_nuevo_cliente($datos_cliente_db)
    {
        /**
         * Guarda los datos del cliente en la tabla cliente
         * @param array $datos_cliente_db
         * @return boolean
         */
        $guardado = false;
        try {
            Cliente::create([
                'id_cliente' => $datos_cliente_db['id_cliente'],
                'nombre_apellidos' => $datos_cliente_db['nombre_apellidos'],
                'telefono' => $datos_cliente_db['telefono'],
                'email' => $datos_cliente_db['email'],
                'direccion' => $datos_cliente_db['direccion'],
                'fecha_inicio' => $datos_cliente_db['fecha_inicio'],
                'peso_inicial' => $datos_cliente_db['peso_inicial'],
                'peso_final_1' => $datos_cliente_db['peso_final_1'],
                'peso_final_2' => $datos_cliente_db['peso_final_2'],
                'perdida_peso_1' => 0,
                'semanas_perdida_peso_1' => 0,
                'perdida_peso_2' => 0,
                'semanas_perdida_peso_2' => 0,
                'perdida_peso_final' => 0,
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
            $archivo = '/app/Custom/Crear_DB_Controller.php';
            $funcion = 'guardar_db_nuevo_cliente';
            $paginaWeb = '/dietas';
            $this->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $guardado;
    }

    private function guardar_db_datos_iniciales_nuevo_cliente($id_cliente, $fecha, $preguntas_extra_nuevo_cliente_db)
    {
        /**
         * Guarda los datos iniciales del cliente en la tabla datos_iniciales_cliente
         * @param string $id_cliente
         * @param string $fecha
         * @param array $preguntas_extra_nuevo_cliente_db
         * @return boolean
         */
        $guardado = false;
        try {
            // Guardamos las preguntas estandar
            $preguntas_estandar = $this->preguntas_estandar();
            foreach ($preguntas_estandar as $pregunta) {
                Dato_Inicial_Cliente::create([
                    'id_cliente' => $id_cliente,
                    'fecha' => $fecha,
                    'pregunta' => $pregunta,
                    'respuesta' => 'respuesta_estandar'
                ]);
            }
            // Guardamos las preguntas extra
            foreach ($preguntas_extra_nuevo_cliente_db as $pregunta_extra) {
                Dato_Inicial_Cliente::create([
                    'id_cliente' => $id_cliente,
                    'fecha' => $fecha,
                    'pregunta' => $pregunta_extra,
                    'respuesta' => 'respuesta_estandar'
                ]);
            }
            $guardado = true;
        } catch (\Throwable $e) {
            $archivo = '/app/Custom/Crear_DB_Controller.php';
            $funcion = 'guardar_db_datos_iniciales_nuevo_cliente';
            $paginaWeb = '/dietas';
            $this->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $guardado;
    }

    private function preguntas_estandar()
    {
        /**
         * Preguntas estandar que se guardan en la tabla datos_iniciales_cliente
         */
        return [
            '¿Se ha puesto anteriormente a dieta? ¿Cosas positivas que te aportaron esas dietas?',
            '¿Tienes el hábito de desayunar regularmente? ¿Motivo? Indica qué desayunos suele hacer.',
            '¿Tienes el hábito de comer algo a media mañana regularmente? ¿Motivo? Indica qué sueles hacerte.',
            '¿Te gusta picar entre horas? ¿Qué picoteas?',
            '¿Llegas con ansiedad a alguna de la tomas? ¿A cuál?',
        ];
    }

    public function guardar_mensaje_interno($mensaje)
    {
        /**
         * Guarda un mensaje interno en la base de datos
         *
         * @return bool
         */
        $guardado = false;
        try {
            Contacto_Interno::create([
                'id_cliente' => $mensaje['id_cliente'],
                'fecha' => $mensaje['fecha'],
                'mensaje' => $mensaje['mensaje'],
                'leido' => 0
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
            $archivo = '/app/Custom/Crear_DB_Controller.php';
            $funcion = 'guardar_mensaje_interno';
            $paginaWeb = '/midieta';
            $this->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $guardado;
    }

    public function guardar_mensaje_externo($mensaje)
    {
        /**
         * Guarda un mensaje externo en la base de datos
         *
         * @return true o false
         */
        $guardado = false;
        try {
            Contacto_Externo::create([
                'nombre' => $mensaje['nombre'],
                'telefono' => $mensaje['telefono'],
                'email' => $mensaje['email'],
                'fecha' => $mensaje['fecha'],
                'mensaje' => $mensaje['mensaje'],
                'leido' => 0
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
            $archivo = '/app/Custom/Crear_DB_Controller.php';
            $funcion = 'guardar_mensaje_externo';
            $paginaWeb = '/inicio';
            $this->guardar_error_db($e, $archivo, $funcion, $paginaWeb);
        }
        return $guardado;
    }

    public function guardar_error_db($e, $archivo, $funcion, $paginaWeb)
    {
        $codigo_error = $e->getCode();
        $mensaje_error = $e->getMessage();
        $linea = $e->getLine();
        $fecha = date('d-m-Y H:i:s');
        Error::create([
            'codigoError' => $codigo_error,
            'mensajeError' => $mensaje_error,
            'archivo' => $archivo,
            'funcion' => $funcion,
            'linea' => $linea,
            'fecha' => $fecha,
            'paginaWeb' => $paginaWeb
        ]);
    }
}
