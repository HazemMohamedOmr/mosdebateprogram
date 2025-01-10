<?php

namespace App\Jobs;

use App\Models\Invitations;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AllTeamsThanksJobs implements ShouldQueue
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
        $leaders = $this->getLeaders();
        $leaders = $this->testsEmails();

        foreach ($leaders as $leader) {
            TeamsThanksJobs::dispatch($leader);
        }

        $students = $this->getStudents();
        $students = $this->testsEmails();

        foreach ($students as $student) {
            TeamsThanksJobs::dispatch($student);
        }
    }

    private function getLeaders()
    {
        return Invitations::where('type', 1)->where('attendance_dates', '!=', 'null')->get();
    }

    private function getStudents()
    {
        return Student::where('attendance_dates', '!=', 'null')->get();
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
