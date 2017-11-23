<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class PagoPaypal extends Model
{
    protected $table = 'pago_paypals';
    
    protected $fillable = array('id_reserva', 'nombreCalendario', 'estadoPago', 'fechaPago','montoPago');
}
