<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reportados extends Model
{
    protected $table = 'reportados';
    
    protected $fillable = array('id_usuario_operador', 'catalogo_servicio', 'cantidad', 'estado');
}
