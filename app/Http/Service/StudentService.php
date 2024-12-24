<?php

namespace App\Http\Service;

use App\Mail\InvitationEmail;
use App\Models\Invitations;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class StudentService
{
    public function index()
    {
        return view('invitation.team-registration');
    }

    public function store($request): RedirectResponse
    {
        // Validate main invitation data
        $validatedInvitation = $request->all();

        // Add type and encode nullable arrays
        $validatedInvitation['type'] = 1;
        $validatedInvitation['heard_about'] = json_encode($request->input('heard_about', []), JSON_UNESCAPED_UNICODE);
        $validatedInvitation['reason_participation'] = json_encode($request->input('reason_participation', []), JSON_UNESCAPED_UNICODE);
        $validatedInvitation['phone_number'] = '+966' . $validatedInvitation['phone_number'];

        // Create the invitation record
        $invitation = Invitations::create($validatedInvitation);

        // Validate and create students
        foreach ($request->input('students', []) as $studentData) {

            // Handle personal photo upload
            if (isset($studentData['personal_photo'])) {
                $studentData['personal_photo'] = $studentData['personal_photo']->store('photos', 'public');
            }
            $studentData['phone_number'] = '+966' . $studentData['phone_number'];

            // Link student to the invitation
            $invitation->students()->create($studentData);
        }

        $this->sendEmail($invitation);

        // Redirect to success page
        return redirect()->route('team-invitation-success')->with('success', 'Form submitted successfully!');
    }

    public function success()
    {
        return view('invitation.success');
    }

    private function sendEmail($invitation)
    {
        Mail::to($invitation->email)->send(new InvitationEmail($invitation));
    }

}
