<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;
    public $is_visitor;

    /**
     * Create a new message instance.
     */
    public function __construct($invitation, $is_visitor = 0)
    {
        $this->invitation = $invitation;
        $this->is_visitor = $is_visitor;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $view = $this->is_visitor ? 'emails.invitation_email' : 'emails.team_invitation_email';
        $link = $this->is_visitor ? route('visitor-invitation-details', ['uuid' => $this->invitation->invitation_key]) : null;
        return $this->subject('دعوة دوري المناظرات')
            ->view($view)
            ->with('invitation', $this->invitation)
            ->with('link', $link);
    }
}
