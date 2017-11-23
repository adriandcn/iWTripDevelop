<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UbicacionGeografica extends Model
{
    //
    protected $table = 'ubicacion_geografica';
    public $timestamps = false;
    
    protected $fillable = array('descripcion_esp', 'descripcion_eng', 'descripcion_adicional_eng', 'descripcion_adicional_esp', 'capital_provincia'); 

}
