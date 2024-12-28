<?php

namespace App\Http\Service;

use App\Mail\InvitationEmail;
use App\Models\Invitations;
use App\Models\Setting;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentService
{
    public function index()
    {
        // Check if the form is open
        if (!Setting::isFormOpen('students_form')) {
            return view('invitation.team-registration', ['formClosed' => true]);
        }

        // Show the form
        return view('invitation.team-registration', ['formClosed' => false]);
    }

    public function store($request)
    {
        if (!Setting::isFormOpen('students_form')) {
            return view('invitation.team-registration', ['formClosed' => true]);
        }

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
        foreach ($request->input('students', []) as $index => $studentData) {

            // Check if the file exists in the request
            if ($request->hasFile("students.$index.personal_photo")) {
                // Store the uploaded file and save the path
                $studentData['personal_photo'] = $request->file("students.$index.personal_photo")->store('photos', 'public');
            } else {
                $studentData['personal_photo'] = null; // Handle case where no file is uploaded
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
        try {
            Mail::to($invitation->email)->send(new InvitationEmail($invitation));
            $invitation->is_email_send = 1;
        } catch (\Exception $e) {
            Log::error($e);
            $invitation->is_email_send = 0;
        }

        $invitation->save();
    }

    public function qrcode($uuid)
    {
        $invitation = Student::where('invitation_key', $uuid)->first();

        if (isset($invitation)){
            $url = route('student-invitation-show', ['uuid' => $uuid]);
            $image = $this->generateBase64QrCode($url);

            return view('invitation.qrcode', compact('image'));
        }

        return view('invitation.not-found');
    }

    public function generateBase64QrCode($text, $size = 200)
    {
        return QrCode::size($size)
            ->format('svg')
            ->generate($text);
    }

    public function show($uuid)
    {
        if (!Auth::check()) {
            return view('invitation.cannot-view-data');
        }

        // Retrieve the invitation using the UUID (invitation_key)
        $student = Student::where('invitation_key', $uuid)->first();

        // If no record is found, return a not found
        if (!$student) {
            return view('invitation.not-found');
        }

        $student->attend = 1;
        $student->save();

        // Pass the invitation and related students to the view
        return view('invitation.student-show', compact('student'));
    }

}
