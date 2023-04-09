<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    use HasFactory;
    protected $table = 'pesos';
    protected $fillable = [
        'id_cliente',
        'perdida_peso_1',
        'semanas_perdida_peso_1',
        'perdida_peso_2',
        'semanas_perdida_peso_2',
        'perdida_peso_final',
        'fecha',
        'peso',
        'peso_teorico',
        'nota_pasos'
    ];
    protected $hidden = [];
}
