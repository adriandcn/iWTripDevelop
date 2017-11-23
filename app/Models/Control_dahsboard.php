<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Control_dahsboard extends Model
{
    protected $table = 'control_dahsboards';
    
    protected $fillable = array('id_usuario_operador', 'catalogo_servicio', 'cantidad', 'estado');
}
