<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = [
        'id_cliente',
        'nombre_apellidos',
        'telefono',
        'email',
        'direccion',
        'fecha_inicio',
        'peso_inicial',
        'peso_final_1',
        'peso_final_2',
    ];
    protected $hidden = [];
}
