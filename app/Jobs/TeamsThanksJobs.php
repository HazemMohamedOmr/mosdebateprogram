<?php

namespace App\Jobs;

use App\Mail\TeamThanksEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TeamsThanksJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $invitation;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->invitation->email)->send(new TeamThanksEmail($this->invitation));
    }
}
