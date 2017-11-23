<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerario_Usuario_Servicio extends Model
{
    //
     public static $rulesP = [
        
         'nombre_itinerario' => 'required'
    ];
     protected $table = 'itinerarios_usuario_servicios';
      
             protected $fillable = array('id_usuario_servicio', 'id_catalogo_dificultad', 'descripcion_itinerario', 'nombre_itinerario',
             'fecha_desde', 'fecha_hasta', 'tags', 'precio_normal','descuento','observaciones_itinerario','created_at', 'updated_at','tags','observaciones_promocion'); 

}
