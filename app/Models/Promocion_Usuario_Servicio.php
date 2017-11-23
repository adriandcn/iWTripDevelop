<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocion_Usuario_Servicio extends Model
{
      public static $rulesP = [
        
         'nombre_promocion' => 'required'
    ];
    //
    	protected $table = 'promocion_usuario_servicio';
        protected $fillable = array('nombre_promocion', 'descripcion_promocion', 'estado_promocion', 'fecha_desde',
            'fecha_hasta', 'precio_normal', 'descuento', 'codigo_promocion', 'permanente','created_at', 'updated_at','tags','observaciones_promocion'); 
       
        
        
}
