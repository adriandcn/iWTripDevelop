<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo_Especialidad extends Model
{
    protected $table = 'catalogo_especialidad';
    
    protected $fillable = array('id_catalogo_servicio', 'nombre', 'descripcion','activo'); 
    
    public function catalogo_servicio(){
		return $this->hasMany('App\Models\Booking\Especialidad');
    }
}
