<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato_Inicial_Cliente extends Model
{
    use HasFactory;
    protected $table = 'datos_iniciales_clientes';
    protected $fillable = [
        'id_cliente',
        'fecha',
        'pregunta_respuesta'
    ];
    protected $hidden = [];
}
