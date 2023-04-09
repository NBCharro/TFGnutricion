<?php

namespace App\Custom;

use App\Models\Cliente;
use App\Models\Contacto_Externo;
use App\Models\Contacto_Interno;
use App\Models\Dato_Inicial_Cliente;
use App\Models\Peso;
use App\Models\Plato;
use App\Models\Texto_Cliente;

class Crear_DB_Controller
{
    function crear_plato($id_cliente, $accion, $platos)
    {
        $guardado = false;
        try {
            $platos_json = json_encode($platos);
            Plato::create([
                'id_cliente' => $id_cliente,
                'accion' => $accion,
                'platos' => $platos_json
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
            # code...
        }
        return $guardado;
    }

    function crear_pesos($datos_cliente, $array_pesos, $array_fechas)
    {
        $guardado = false;
        try {
            $peso_cliente_db = Peso::get()->where('id_cliente', 'jl3864')->first();
            Peso::create([
                'id_cliente' => $datos_cliente['id_cliente'],
                'perdida_peso_1' => $datos_cliente['perdida_peso_1'],
                'semanas_perdida_peso_1' => $datos_cliente['semanas_perdida_peso_1'],
                'perdida_peso_2' => $datos_cliente['perdida_peso_2'],
                'semanas_perdida_peso_2' => $datos_cliente['semanas_perdida_peso_2'],
                'perdida_peso_final' => $datos_cliente['perdida_peso_final'],
                'fecha' => json_encode($array_fechas),
                'peso' => json_encode([]),
                'peso_teorico' => json_encode($array_pesos),
                'nota_pasos' => json_encode([]),
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }
    function crear_textos_clientes($textos_clientes)
    {
        $guardado = false;
        dump($textos_clientes);
        try {
            $texto_general_json = json_encode($textos_clientes['texto_general']);
            $texto_particular_json = json_encode($textos_clientes['texto_particular']);
            Texto_Cliente::create([
                'id_cliente' => $textos_clientes['id_cliente'],
                'texto_general' => $texto_general_json,
                'texto_particular' => $texto_particular_json
            ]);
            $guardado = true;
        } catch (\Throwable $e) {
        }
        return $guardado;
    }
}
