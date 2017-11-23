<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    
    protected $fillable = array('id_calendario', 'id_usuario_servicio', 'uuid','consumido');
}
