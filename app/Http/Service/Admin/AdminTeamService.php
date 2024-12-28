<?php

namespace App\Http\Service\Admin;

use App\Mail\InvitationEmail;
use App\Mail\StudentInvitationEmail;
use App\Models\Invitations;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminTeamService
{
    public function index()
    {
        $invitations = Invitations::where('type', 1)->with('students')->paginate(10);

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
            Mail::to($invitation->email)->send(new InvitationEmail($invitation, 1));
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

}
