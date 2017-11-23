<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitaciones_Amigos extends Model
{
    //
         protected $table = 'invitaciones_amigos';

          public static $rulesP = [
        
         'invitacion_para' => 'required'
    ];
}
