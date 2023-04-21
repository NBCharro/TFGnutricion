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

class Actualizar_DB_Controller
{

    function actualizar_preguntas_respuestas($id_cliente, $preguntas_respuestas)
    {
        $actualizado = false;
        try {
            $preguntas_respuestas_json = json_encode($preguntas_respuestas);

            $pregunta_respuesta_db = Dato_Inicial_Cliente::get()->where('id_cliente', $id_cliente)->first();
            $pregunta_respuesta_db->pregunta_respuesta = $preguntas_respuestas_json;

            $pregunta_respuesta_db->save();
            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }

    // function actualizar_datos_cliente($datos_cliente)
    // {
    //     $actualizado = false;
    //     try {
    //         $cliente_db = Cliente::get()->where('id_cliente', $datos_cliente['id_cliente'])->first();
    //         $cliente_db->id_cliente = $datos_cliente['id_cliente'];
    //         $cliente_db->nombre_apellidos = $datos_cliente['nombre_apellidos'];
    //         $cliente_db->telefono = $datos_cliente['telefono'];
    //         $cliente_db->email = $datos_cliente['email'];
    //         $cliente_db->direccion = $datos_cliente['direccion'];
    //         $cliente_db->fecha_inicio = $datos_cliente['fecha_inicio'];
    //         $cliente_db->peso_inicial = $datos_cliente['peso_inicial'];
    //         $cliente_db->peso_final_1 = $datos_cliente['peso_final_1'];
    //         $cliente_db->peso_final_2 = $datos_cliente['peso_final_2'];

    //         $cliente_db->save();
    //         $actualizado = true;
    //     } catch (\Throwable $e) {
    //         # code...
    //     }
    //     return $actualizado;
    // }

    // function actualizar_platos($id_cliente, $platos)
    // {
    //     $actualizado = false;
    //     try {
    //         foreach ($platos as $key => $value) {
    //             $accion = strtolower($key);
    //             $platos_db = Plato::get()->where('id_cliente', $id_cliente)->where('accion', $accion)->first();
    //             if ($platos_db) {
    //                 $platos_json = json_encode($value);
    //                 $platos_db->platos = $platos_json;
    //                 $platos_db->save();
    //             } else {
    //                 $funciones_crear_base_datos = new Crear_DB_Controller;
    //                 $creado = $funciones_crear_base_datos->crear_plato($id_cliente, $accion, $value);
    //             }
    //         }
    //         $actualizado = true;
    //     } catch (\Throwable $e) {
    //         # code...
    //     }
    //     return $actualizado;
    // }
    // function actualizar_textos_clientes($textos_clientes)
    // {
    //     // CREAR SI NO EXISTE
    //     $actualizado = false;
    //     try {
    //         $texto_general_json = json_encode($textos_clientes['texto_general']);
    //         $texto_particular_json = json_encode($textos_clientes['texto_particular']);

    //         $textos_clientes_db = Texto_Cliente::get()->where('id_cliente', $textos_clientes['id_cliente'])->first();
    //         if ($textos_clientes_db) {
    //             // Actualizar
    //             $textos_clientes_db->id_cliente = $textos_clientes['id_cliente'];
    //             $textos_clientes_db->texto_general = $texto_general_json;
    //             $textos_clientes_db->texto_particular = $texto_particular_json;

    //             $textos_clientes_db->save();
    //         } else {
    //             // Crear
    //             $funciones_crear_base_datos = new Crear_DB_Controller;
    //             $creado = $funciones_crear_base_datos->crear_textos_clientes($textos_clientes);
    //         }

    //         $actualizado = true;
    //     } catch (\Throwable $e) {
    //         # code...
    //     }
    //     return $actualizado;
    // }

    function actualizar_nuevo_peso($nuevo_dato_peso)
    {
        $actualizado = false;
        try {
            $peso_cliente_db = Peso::get()->where('id_cliente', $nuevo_dato_peso['id_cliente'])->first();

            $pesos_decode = json_decode($peso_cliente_db->peso);
            $pesos_decode[] = doubleval($nuevo_dato_peso['peso']);
            $pesos_encode = json_encode($pesos_decode);
            $peso_cliente_db->peso = $pesos_encode;

            $nota_pasos_decode = json_decode($peso_cliente_db->nota_pasos);
            if (count($nota_pasos_decode) > 0) {
                // Arreglar si un cliente quiere ponerse nota a mitad de dieta
                $nota_pasos_decode[] = doubleval($nuevo_dato_peso['nota_pasos']);
                $nota_pasos_encode = json_encode($nota_pasos_decode);
                $peso_cliente_db->nota_pasos = $nota_pasos_encode;
            }

            $peso_cliente_db->save();
            $actualizado = true;
        } catch (\Throwable $e) {
        }
        return $actualizado;
    }

    // function actualizar_pesos($peso_cliente)
    // {
    //     $actualizado = false;
    //     try {
    //         $peso_cliente_db = Peso::get()->where('id_cliente', $peso_cliente['id_cliente'])->first();
    //         $cambia_algun_dato = $this->cambia_datos_pesos_cliente($peso_cliente);
    //         if ($peso_cliente_db) {
    //             // Actualizar
    //             if ($cambia_algun_dato) {
    //                 $peso_cliente_db->id_cliente = $peso_cliente['id_cliente'];
    //                 $peso_cliente_db->perdida_peso_1 = $peso_cliente['perdida_peso_1'];
    //                 $peso_cliente_db->semanas_perdida_peso_1 = $peso_cliente['semanas_perdida_peso_1'];
    //                 $peso_cliente_db->perdida_peso_2 = $peso_cliente['perdida_peso_2'];
    //                 $peso_cliente_db->semanas_perdida_peso_2 = $peso_cliente['semanas_perdida_peso_2'];
    //                 $peso_cliente_db->perdida_peso_final = $peso_cliente['perdida_peso_final'];

    //                 $array_pesos = $this->obtener_array_pesos_teoricos_perdida_peso($peso_cliente['peso_inicial'], $peso_cliente['peso_final_1'], $peso_cliente['peso_final_2'], $peso_cliente['perdida_peso_1'], $peso_cliente['semanas_perdida_peso_1'], $peso_cliente['perdida_peso_2'], $peso_cliente['semanas_perdida_peso_2'], $peso_cliente['perdida_peso_final']);
    //                 $array_pesos_json = json_encode($array_pesos);
    //                 $peso_cliente_db->peso_teorico = $array_pesos_json;

    //                 $semanas = count($array_pesos);
    //                 $array_fechas = $this->obtener_array_fechas_perdida_peso($peso_cliente['fecha_inicio'], $semanas);
    //                 $array_fechas_json = json_encode($array_fechas);
    //                 $peso_cliente_db->fecha = $array_fechas_json;

    //                 $peso_cliente_db->save();
    //             }
    //         } else {
    //             // Crear
    //             $funciones_crear_base_datos = new Crear_DB_Controller;
    //             $array_pesos = $this->obtener_array_pesos_teoricos_perdida_peso($peso_cliente['peso_inicial'], $peso_cliente['peso_final_1'], $peso_cliente['peso_final_2'], $peso_cliente['perdida_peso_1'], $peso_cliente['semanas_perdida_peso_1'], $peso_cliente['perdida_peso_2'], $peso_cliente['semanas_perdida_peso_2'], $peso_cliente['perdida_peso_final']);

    //             $semanas = count($array_pesos);
    //             $array_fechas = $this->obtener_array_fechas_perdida_peso($peso_cliente['fecha_inicio'], $semanas);
    //             // FALLA
    //             $creado = $funciones_crear_base_datos->crear_pesos($peso_cliente, $array_pesos, $array_fechas);
    //         }

    //         $actualizado = true;
    //     } catch (\Throwable $e) {
    //         # code...
    //     }
    //     return $actualizado;
    // }
    private function cambia_datos_pesos_cliente($peso_cliente)
    {
        $cambia_dato = false;
        try {
            $peso_cliente_db = Peso::get()->where('id_cliente', $peso_cliente['id_cliente'])->first();
            $cliente_db = Cliente::get()->where('id_cliente', $peso_cliente['id_cliente'])->first();
            $fecha_inicio_db = $cliente_db->fecha_inicio;
            $peso_inicial_db = $cliente_db->peso_inicial;
            $peso_final_1_db = $cliente_db->peso_final_1;
            $peso_final_2_db = $cliente_db->peso_final_2;
            $perdida_peso_1_db = $peso_cliente_db->perdida_peso_1;
            $semanas_perdida_peso_1_db = $peso_cliente_db->semanas_perdida_peso_1;
            $perdida_peso_2_db = $peso_cliente_db->perdida_peso_2;
            $semanas_perdida_peso_2_db = $peso_cliente_db->semanas_perdida_peso_2;
            $perdida_peso_final_db = $peso_cliente_db->perdida_peso_final;

            if (
                $peso_cliente['fecha_inicio'] != $fecha_inicio_db ||
                $peso_cliente['peso_inicial'] != $peso_inicial_db ||
                $peso_cliente['peso_final_1'] != $peso_final_1_db ||
                $peso_cliente['peso_final_2'] != $peso_final_2_db ||
                $peso_cliente['perdida_peso_1'] != $perdida_peso_1_db ||
                $peso_cliente['semanas_perdida_peso_1'] != $semanas_perdida_peso_1_db ||
                $peso_cliente['perdida_peso_2'] != $perdida_peso_2_db ||
                $peso_cliente['semanas_perdida_peso_2'] != $semanas_perdida_peso_2_db ||
                $peso_cliente['perdida_peso_final'] != $perdida_peso_final_db
            ) {
                $cambia_dato = true;
            }
        } catch (\Throwable $e) {
            # code...
        }
        return $cambia_dato;
    }

    // private function obtener_array_fechas_perdida_peso($fecha_inicio, $semanas)
    // {
    //     $fechas = [];
    //     for ($semana = 0; $semana < $semanas; $semana++) {
    //         $fecha = strtotime($fecha_inicio . "+ " . $semana . " week");
    //         $fechas[] = date("Y-m-d", $fecha);
    //     }
    //     return $fechas;
    // }
    // private function obtener_array_pesos_teoricos_perdida_peso($peso_inicial, $peso_final_1, $peso_final_2, $perdida_peso_1, $semanas_perdida_peso_1, $perdida_peso_2, $semanas_perdida_peso_2, $perdida_peso_final)
    // {
    //     if ($perdida_peso_final == 0) {
    //         return [];
    //     }

    //     $pesos = [];
    //     $semana = 1;
    //     $peso_iterativo = $peso_inicial;
    //     $peso_fin = $peso_final_1;
    //     if ($peso_final_2 > 0) {
    //         $peso_fin = $peso_final_2;
    //     }
    //     $pesos[] = intval($peso_iterativo);
    //     while ($peso_iterativo > $peso_fin) {
    //         if ($semana < $semanas_perdida_peso_1) {
    //             $peso_iterativo = $peso_iterativo - $perdida_peso_1 / 1000;
    //         } elseif ($perdida_peso_2 > 0 && $semanas_perdida_peso_2 > 0 && $semana < ($semanas_perdida_peso_1 + $semanas_perdida_peso_2)) {
    //             $peso_iterativo = $peso_iterativo - $perdida_peso_2 / 1000;
    //         } else {
    //             $peso_iterativo = $peso_iterativo - $perdida_peso_final / 1000;
    //         }
    //         $pesos[] = round($peso_iterativo, 2);
    //         $semana++;
    //     }
    //     return $pesos;
    // }

    function marcar_mensaje_leido_interno($id_mensaje)
    {
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
        }
        return $actualizado;
    }
    function marcar_mensaje_leido_externo($id_mensaje)
    {
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
        }
        return $actualizado;
    }

    // Transaccion
    public function actualizar_cliente($datos_cliente, $peso_cliente, $id_cliente, $platos, $textos_clientes)
    {
        $actualizado = false;
        DB::beginTransaction();

        try {
            $this->actualizar_datos_cliente($datos_cliente);
            $this->actualizar_pesos($peso_cliente);
            $this->actualizar_platos($id_cliente, $platos);
            $this->actualizar_textos_clientes($id_cliente,$textos_clientes);

            DB::commit();
            $actualizado = true;
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return $actualizado;
    }

    // [ 'id_cliente' => '', 'nombre_apellidos' => '', 'telefono' => '', 'email' => '', 'direccion' => '',
    // 'fecha_inicio' => '', 'peso_inicial' => 0, 'peso_final_1' => 0, 'peso_final_2' => 0, ]
    private function actualizar_datos_cliente($datos_cliente)
    {
        $actualizado = false;
        try {
            // $cliente_db = DB::table('clientes')->where('id_cliente', $datos_cliente['id_cliente'])->update(['nombre_apellidos' => $datos_cliente['nombre_apellidos']]);
            $cliente_db = Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['nombre_apellidos' => $datos_cliente['nombre_apellidos']]);
            $cliente_db = Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['telefono' => $datos_cliente['telefono']]);
            $cliente_db = Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['email' => $datos_cliente['email']]);
            $cliente_db = Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['direccion' =>$datos_cliente['direccion']]);
            $cliente_db = Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['fecha_inicio' => $datos_cliente['fecha_inicio']]);
            $cliente_db = Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['peso_inicial' =>$datos_cliente['peso_inicial']]);
            $cliente_db = Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['peso_final_1' => $datos_cliente['peso_final_1']]);
            $cliente_db = Cliente::where('id_cliente', $datos_cliente['id_cliente'])->update(['peso_final_2' => $datos_cliente['peso_final_2']]);
            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }

    // ['id_cliente' =>'', 'fecha_inicio' =>'', 'peso_inicial' =>'', 'peso_final_1' =>'', 'peso_final_2' =>'', 'perdida_peso_1' =>'',
    // 'semanas_perdida_peso_1' =>'', 'perdida_peso_2' =>'', 'semanas_perdida_peso_2' =>'', 'perdida_peso_final' =>'',];
    private function actualizar_pesos($peso_cliente)
    {
        $actualizado = false;
        try {
            // Obtengo los datos anteriores
            $peso_cliente_db = Peso::get()->where('id_cliente', $peso_cliente['id_cliente']);

            // Borro todos los anteriores
            Peso::where('id_cliente', $peso_cliente['id_cliente'])->delete();

            // Creo los datos de fechas y pesos_teoricos
            $fecha_inicio = $peso_cliente['fecha_inicio'];
            $peso_inicial = $peso_cliente['peso_inicial'];
            $peso_final_1 = $peso_cliente['peso_final_1'];
            $peso_final_2 = $peso_cliente['peso_final_2'];
            $perdida_peso_1 = $peso_cliente['perdida_peso_1'];
            $semanas_perdida_peso_1 = $peso_cliente['semanas_perdida_peso_1'];
            $perdida_peso_2 = $peso_cliente['perdida_peso_2'];
            $semanas_perdida_peso_2 = $peso_cliente['semanas_perdida_peso_2'];
            $perdida_peso_final = $peso_cliente['perdida_peso_final'];
            $array_pesos_teoricos = $this->obtener_array_fechas_pesos_teoricos($fecha_inicio,$peso_inicial,$peso_final_1,$peso_final_2,$perdida_peso_1,$semanas_perdida_peso_1,$perdida_peso_2,$semanas_perdida_peso_2,$perdida_peso_final);

            // Creo las entradas actualizadas
            $indice = 0;
            foreach ($array_pesos_teoricos as $fecha => $peso_teorico) {
                $cliente_db = Peso::create([
                    "id_cliente": $peso_cliente['id_cliente'],
                    "fecha": $fecha,
                    "peso": isset($peso_cliente_db[$indice]->peso)? $peso_cliente_db[$indice]->peso:0,
                    "peso_teorico": $peso_teorico,
                    "nota_pasos": isset($peso_cliente_db[$indice]->nota_pasos)? $peso_cliente_db[$indice]->nota_pasos:0
                ]);
                $indice++;
            };

            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }

    private function obtener_array_fechas_pesos_teoricos($fecha_inicio, $peso_inicial, $peso_final_1, $peso_final_2, $perdida_peso_1, $semanas_perdida_peso_1, $perdida_peso_2, $semanas_perdida_peso_2, $perdida_peso_final)
    {
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
        $pesos[] = intval($peso_iterativo);
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

    // ($id_cliente, ['desayuno'=>'tostadas'])
    private function actualizar_platos($id_cliente, $platos)
    {
        $actualizado = false;
        try {
            // Borro todos los anteriores
            Plato::where('id_cliente', $id_cliente)->delete();
            // Introduzco los nuevos datos
            foreach ($platos as $key => $value) {
                $accion = strtolower($key);
                $cliente_db = Plato::create([
                    "id_cliente": $id_cliente,
                    "accion": $accion,
                    "platos": $value
                ]);
            }
            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }

    // ($id_cliente, [[$tipo_texto, texto1, texto2]])
    private function actualizar_textos_clientes($id_cliente,$textos_clientes)
    {
        $actualizado = false;
        try {
            // Borro todos los anteriores
            Texto_Cliente::where('id_cliente', $id_cliente)->delete();
            // Creo los textos
            foreach ($textos_clientes as $texto) {
                $cliente_db = Plato::create([
                    "id_cliente": $id_cliente,
                    "tipo_texto": $texto[0],
                    "texto1": $texto[1],
                    "texto2": $texto[2]==0?'':$texto[2]
                ]);
            }
            $actualizado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $actualizado;
    }
}
