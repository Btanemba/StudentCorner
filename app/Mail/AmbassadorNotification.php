<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AmbassadorNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingData;

    public function __construct($bookingData)
    {
        $this->bookingData = $bookingData;
    }

   public function build()
    {
        return $this->subject('New Consultation Request - Action Required')
                    ->view('emails.ambassador_notification');
    }
}
