<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Errores extends Model
{
    protected $table = 'errores';
    
    protected $fillable = array('id_usuario_operador', 'catalogo_servicio', 'cantidad', 'estado');
}
