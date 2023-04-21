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
        'fecha',
        'peso',
        'peso_teorico',
        'nota_pasos'
    ];
    protected $hidden = [];
}
