<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class MD5 extends Model
{
   protected $table = 'tokens';
    
    protected $fillable = array('url_redirect', 'fecha');
}
