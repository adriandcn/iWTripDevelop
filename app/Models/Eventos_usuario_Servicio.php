<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventos_usuario_Servicio extends Model
{
    //
    
    
    public static $rulesP = [
        
         'nombre_evento' => 'required'
    ];
    //
    	protected $table = 'eventos_usuario_servicios';
        protected $fillable = array('id_usuario_servicio', 'nombre_evento', 'descripcion_evento', 'observaciones_evento',
            'estado_evento', 'fecha_desde', 'fecha_hasta', 'longitud_evento','latitud_evento','tags','permanente',  'created_at', 'updated_at'); 
}
