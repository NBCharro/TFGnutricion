<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Texto_Cliente extends Model
{
    use HasFactory;
    protected $table = 'textos_clientes';
    protected $fillable = [
        'id_cliente',
        'texto_general',
        'texto_especifico'
    ];
    protected $hidden = [];
}
