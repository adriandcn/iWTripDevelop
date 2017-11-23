<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Models\Invitaciones_Amigos;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use \Milon\Barcode\DNS2D;

class ReservacionMail extends Job implements SelfHandling

{
    
      public function __construct($infoReservas,$infoPago,$infoReserva2,$statusReserva)
    {
        
          $this->infoReservas = $infoReservas;
          $this->infoPago = $infoPago;
          $this->infoReserva2 = $infoReserva2;
          $this->statusReserva = $statusReserva;
          
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    
    public function handle(Mailer $mailer)
    {

         if($this->statusReserva === 0){
                $estado ="Pendiente";
            }else{
                $estado = "Confirmada";
            }
            
            $codigo = $this->infoReservas[0]->uuid;
            //$qr = DNS2D::getBarcodeHTML($codigo, "QRCODE"); 
            /*$d = new DNS2D();
            $d->setStorPath(__DIR__."/cache/");
            $d->getBarcodeHTML($codigo, "QRCODE");*/
            
        $data = [
            'title'  => "Confirmación Reserva iWaNaTrip.com",
            'nombrepara'   => $this->infoReservas[0]->c_name,
            'correo' => $this->infoReservas[0]->c_email,
            'desde' => $this->infoReservas[0]->date_from,
            'hasta' => $this->infoReservas[0]->date_to,
            'uuid' => $this->infoReservas[0]->uuid,
            'adultos' => $this->infoReservas[0]->c_adults,
            'ninos' => $this->infoReservas[0]->c_children,
            'montopago' =>$this->infoReservas[0]->amount,
            'nombrecalendario' =>$this->infoPago[0]->nombre_calendario,
            'estadoreserva' => $estado,
            'fechapago' =>$this->infoPago[0]->fecha_pago,
            'nombreoperador' => $this->infoReserva2[0]->nombre_contacto_operador_1,
            'empresaoperador' => $this->infoReserva2[0]->nombre_empresa_operador,
            'telefonooperador' => $this->infoReserva2[0]->telf_contacto_operador_1,
            'correooperador' => $this->infoReserva2[0]->email_contacto_operador,
            'direccionoperador' => $this->infoReserva2[0]->direccion_empresa_operador,
            'direccionoperador' => $this->infoReserva2[0]->direccion_empresa_operador,
            //'codigoqr' => $d,
            
        ];
        
        	        
        
        $mailer->send('emails.auth.reservacion', $data, function($message) {
            $message->to( $this->infoReservas[0]->c_email, $this->infoReservas[0]->c_name)
                    ->subject("Confirmación Reserva iWaNaTrip.com");
        });
    }
    
}
