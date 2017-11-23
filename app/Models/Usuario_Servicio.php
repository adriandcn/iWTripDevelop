<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario_Servicio extends Model
{
    //
    protected $table = 'usuario_servicios';
    public $timestamps = false;
    
    
    /* Es la representacion de ELOQUENT de que el Usuaro Servico pertenece a un Usuario Operador
     * En el Modelo de Usuario Operador se encuentra la funcion inversa     */
    public function usuario_operador(){
        
     //   return $this->belongsTo('App\Models\Usuario_Operador');
        
    }
    
      public function catalogo_servicio(){
        
      //  return $this->belongsTo('App\Models\Catalogo_Servicio');
        
    }
}
