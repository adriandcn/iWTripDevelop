<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Review_Usuario_Servicio;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;

class VerifyReview extends Job implements SelfHandling

{
    protected $reviewU;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Review_Usuario_Servicio $reviewU)
    {
        //
          $this->reviewU = $reviewU;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    
    public function handle(Mailer $mailer)
    {
        $data = [
            'title'  => trans('front/verify.ReviewEmail'),
            'intro'  => trans('front/verify.email-intro'),
            'link'   => trans('front/verify.email-link'),
            'confirmation_code' => $this->reviewU->confirmation_rev_code
        ];
        
        $mailer->send('emails.auth.VerifyReview', $data, function($message) {
            $message->to( $this->reviewU->email_reviewer, $this->reviewU->nombre_reviewer)
                    ->subject("Review Verify iWaNaTrip.com");
        });
    }
    
}
