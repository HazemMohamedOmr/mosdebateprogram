<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $is_visitor;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $is_visitor = 0)
    {
        $this->data = $data;
        $this->is_visitor = $is_visitor;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $view = $this->is_visitor ? 'emails.invitation_email' : 'emails.team_invitation_email';
        return $this->subject('دعوة دوري المناظرات')
            ->view($view)
            ->with('invitation', $this->data);
    }
}
