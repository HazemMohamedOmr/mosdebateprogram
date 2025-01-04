<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeaderInvitationEmail extends Mailable
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
        $view = 'emails.leader_invitation_email';
        $link = route('visitor-invitation-qrcode', ['uuid' => $this->invitation->invitation_key]);
        return $this->subject('دعوة دوري المناظرات')
            ->view($view)
            ->with('invitation', $this->invitation)
            ->with('link', $link);
    }
}
