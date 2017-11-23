<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Itinerario extends Model
{
    //
    
    public static $rulesP = [
        
         'lugar_punto' => 'required'
    ];
    //
    	protected $table = 'detalles_itinerario';
        protected $fillable = array('lugar_punto', 'longitud_punto', 'latitud_punto', 'estado_punto',
            'diahora_punto', 'descripcion_punto', 'incluye_punto', 'tags_punto', 'created_at', 'updated_at'); 
      
}
