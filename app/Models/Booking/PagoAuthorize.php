<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class PagoAuthorize extends Model
{
    protected $table = 'pago_authorizes';
    
    protected $fillable = array('id_reserva', 'nombreCalendario', 'estadoPago', 'fechaPago','montoPago');
}
