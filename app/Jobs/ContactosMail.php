<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Models\Invitaciones_Amigos;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\DB;


class ContactosMail extends Job implements SelfHandling

{
    
      public function __construct($nombre,$apellido,$correo,$mensaje)
    {
        
          $this->nombre = $nombre;
          $this->apellido = $apellido;
          $this->correo = $correo;
          $this->mensaje = $mensaje;
          
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    
    public function handle(Mailer $mailer)
    {

        $nombreCOmpleto = $this->nombre." ".$this->apellido;
        $data = [
            'title'  => "Contáctanos iWaNaTrip.com",
            'nombrepara'   => $nombreCOmpleto,
            'correo' => $this->correo,
            'mensaje' => $this->mensaje,
        ];
        
        	        
        
        $mailer->send('emails.auth.contacto', $data, function($message) {
            $message->to( "info@iwannatrip.com", $this->nombre." ".$this->apellido)
                    ->subject("Contáctanos iWaNaTrip.com");
        });
    }
    
}
