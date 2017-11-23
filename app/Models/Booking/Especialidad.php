<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidads';
    
    protected $fillable = array('id_usuario_servicio', 'nombre_especialidad', 
                'descripcion_especialidad','activo','id_catalogo_especialidad'); 
    
    public function detalle_especialidad(){
		return $this->hasMany('App\Models\Booking\Detalle_Especialidad');
    }
}
