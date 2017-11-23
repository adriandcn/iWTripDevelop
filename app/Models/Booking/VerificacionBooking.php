<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class VerificacionBooking extends Model
{
    protected $table = 'booking_abcalendar_verificacion_bookings';
    
    protected $fillable = array('id_usuario', 'id_usuario_servicio', 'consumido','uuid');
}

