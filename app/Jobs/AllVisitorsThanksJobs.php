<?php

namespace App\Jobs;

use App\Models\Invitations;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AllVisitorsThanksJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $visitors = $this->getVisitors();
        $visitors = $this->testsEmails();

        foreach ($visitors as $visitor) {
            VisitorsThanksJobs::dispatch($visitor);
        }
    }

    private function getVisitors()
    {
        return Invitations::where('type', 0)->where('attendance_dates', '!=', 'null')->get();
    }

    private function testsEmails()
    {
        $visitors = collect([]);
        $visitors->push((object)[
            'first_name' => 'Sameh',
            'email' => 'conan.sameh@gmail.com',
        ]);

        $visitors->push((object)[
            'first_name' => 'Sameh Mo',
            'email' => 'samehmohamedomar22@gmail.com',
        ]);

        $visitors->push((object)[
            'first_name' => 'Sameh Omar',
            'email' => 'samehomaratis@gmail.com',
        ]);

        return $visitors;
    }

}
