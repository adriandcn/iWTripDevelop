<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario_Operador extends Model
{
    //
    protected $table = 'usuario_operadores';
    
    
    /* Representacion de Eloquent de que un usuario operador tiene varios usuario servicios */
    public function usuario_servicios(){
        
        return $this->hasMany('App\Models\Usuario_Servicio');
        
    }
}
