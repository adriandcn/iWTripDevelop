<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review_Usuario_Servicio extends Model
{
    //
    
       
    public static $rules= [
        
         'nombre_reviewer' => 'required',
        'email_reviewer' => 'required|email|max:255',
    ];
    
     public static $messages = [
        'nombre_reviewer.required' => 'El campo Nombre es requerido',
        'email_reviewer.required' => 'El campo email es requerido'
    ];
      
    //
    	protected $table = 'reviews_usuario_servicio';
        protected $fillable = array('id_usuario_servicio', 'nombre_reviewer', 'ip_reviewer', 'calificacion',
            'estado_review', 'id_user', 'id_tipo_review', 'review_verificado','confirmation_rev_code','created_at', 'updated_at'); 

}
