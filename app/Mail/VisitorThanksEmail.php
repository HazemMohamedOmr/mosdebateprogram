<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VisitorThanksEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;

    /**
     * Create a new message instance.
     */
    public function __construct($invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $view = 'emails.thanks.visitor_thanks_email';
        $link = 'form_link';
        return $this->subject('شكر دوري المناظرات')
            ->view($view)
            ->with('invitation', $this->invitation)
            ->with('link', $link);
    }
}
