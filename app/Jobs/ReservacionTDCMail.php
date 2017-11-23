<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;

class ReservacionTDCMail extends Job implements SelfHandling
{
    
    public function __construct($infoReservas,$urlConsulta){
          $this->infoReservas = $infoReservas;
          $this->urlConsulta = $urlConsulta;
    }
    
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer){
        $data = [
            'title'  => "Confirmación Reservacion Booking iWaNaTrip.com",
            'nombrepara'   => $this->infoReservas[0]->c_name,
            'correo' => $this->infoReservas[0]->c_email,
            'uuid' => $this->infoReservas[0]->uuid,
            'url' => $this->urlConsulta
        ];
        $mailer->send('emails.auth.reservacionTDC', $data, function($message) {
            $message->to( $this->infoReservas[0]->c_email, $this->infoReservas[0]->c_name)
                    ->subject("Confirmación Reserva Booking iWaNaTrip.com");
        });
    }
    
}
