<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    use HasFactory;
    protected $table = 'errores';
    protected $fillable = [
        'codigoError',
        'mensajeError',
        'archivo',
        'funcion',
        'linea',
        'fecha',
        'paginaWeb'
    ];
    protected $hidden = [];
}
