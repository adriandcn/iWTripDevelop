<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Detalle_Especialidad extends Model
{
    protected $table = 'detalle__especialidads';
    
    protected $fillable = array('id_especialidad', 'fecha_inicio', 'fecha_fin','hora_inicio','hora_fin',
                                'numero_reservas', 'precio','descuento','bookeable','activo','descripcion');
    
    public function especialidades(){
		return $this->belongsTo('App\Models\Booking\Especialidad');
    }
}
