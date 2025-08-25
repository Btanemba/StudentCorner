<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class NewMessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $messageData;

    public function __construct(Message $message)
    {
        $this->messageData = $message;
    }

    public function build()
    {
        return $this->subject('New Message Posted')
                    ->view('emails.new_message');
    }
}
