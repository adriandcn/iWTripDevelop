<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactanos extends Model
{
    protected $table = 'contactanos';
    
    protected $fillable = array('estado_atendido', 'correo_cliente');
}
