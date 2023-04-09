<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto_Externo extends Model
{
    use HasFactory;
    protected $table = 'contactos_externos';
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'fecha',
        'mensaje',
        'leido'
    ];
    protected $hidden = [];
}
