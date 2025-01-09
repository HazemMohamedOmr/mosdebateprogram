<?php

namespace App\Http\Service\Admin;

use App\Exports\TeamExport;
use App\Jobs\TeamsThanksJobs;
use App\Mail\LeaderInvitationEmail;
use App\Mail\StudentInvitationEmail;
use App\Models\Invitations;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class AdminTeamService
{
    public function index($request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $searchTerm = $validated['search'] ?? null;
        if (isset($searchTerm)) {
            $searchTerm = filter_var($searchTerm, FILTER_SANITIZE_STRING);
            $searchTerm = str_replace('%', '', $searchTerm);
            $searchTerm = str_replace('\%', '', $searchTerm);
            $searchTerm = Str::of($searchTerm)->trim();

            $searchTerm = strip_tags($searchTerm ?? null);
        }

        $invitations = Invitations::where('type', 1)
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('email', 'LIKE', "%$searchTerm%")
                        ->orWhere('first_name', 'LIKE', "%$searchTerm%")
                        ->orWhere('second_name', 'LIKE', "%$searchTerm%")
                        ->orWhere('sur_name', 'LIKE', "%$searchTerm%");
                });
            })->with('students')->paginate(10);

        return view('admin.register', compact('invitations'));
    }

    public function show($id)
    {
        $invitation = Invitations::find($id);

        $invitation->load([
            'students'
        ]);

        return view('admin.register-show', compact('invitation'));
    }

    public function delete($id): RedirectResponse
    {
        $invitation = Invitations::find($id);

        $invitation->delete();

        return redirect()->route('admin.register')->with('event_date_success', 'تم الحذف بنجاح');
    }

    public function invitation($request): JsonResponse
    {
        if ($request->user_type == 'OWNER') {
            $invitation = Invitations::find($request->id);
            $this->sendInvitationEmail($invitation);
        } else {
            $invitation = Student::find($request->id);
            $this->sendStudentInvitationEmail($invitation);
        }

        return response()->json([
            'status' => 'success',
        ]);

    }

    private function sendInvitationEmail($invitation)
    {
        try {
            Mail::to($invitation->email)->send(new LeaderInvitationEmail($invitation));
            $invitation->is_invited = 1;
        } catch (\Exception $e) {
            Log::error($e);
        }

        $invitation->save();
    }

    private function sendStudentInvitationEmail($invitation)
    {
        try {
            Mail::to($invitation->email)->send(new StudentInvitationEmail($invitation));
            $invitation->is_invited = 1;
        } catch (\Exception $e) {
            Log::error($e);
        }

        $invitation->save();
    }

    public function statistics($date)
    {
        $invitations = Invitations::where('type', 1)->where('attendance_dates', 'LIKE', "%$date%")->paginate(10);

        $students = Student::where('attendance_dates', 'LIKE', "%$date%")->paginate(10);

        return view('admin.team.register-statistics.register-statistics', compact('invitations', 'date', 'students'));
    }

    public function exports()
    {
        return Excel::download(new TeamExport, 'teams.xlsx');
    }

    public function thanksEmail(): RedirectResponse
    {
//        $leaders = $this->getLeaders();
        $leaders = $this->testsEmails();

        foreach ($leaders as $leader) {
            TeamsThanksJobs::dispatch($leader);
        }

//        $students = $this->getStudents();
        $students = $this->testsEmails();

        foreach ($students as $student) {
            TeamsThanksJobs::dispatch($student);
        }

        return redirect()->route('admin.dashboard')->with('event_date_success', 'تم ارسال بريد الشكر للطلاب بنجاح');
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
