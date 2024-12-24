<?php

namespace App\Http\Service;

use App\Models\Invitations;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

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

        // Create the invitation record
        $invitation = Invitations::create($validatedInvitation);

        // Validate and create students
        foreach ($request->input('students', []) as $studentData) {

            // Handle personal photo upload
            if (isset($studentData['personal_photo'])) {
                $studentData['personal_photo'] = $studentData['personal_photo']->store('photos', 'public');
            }

            // Link student to the invitation
            $invitation->students()->create($studentData);
        }

        // Redirect to success page
        return redirect()->route('team-invitation-success')->with('success', 'Form submitted successfully!');
    }

    private function validateStudent(array $data)
    {
        return validator($data, [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
            'gender' => 'nullable|boolean',
            'personal_photo' => 'nullable|file|image|max:2048',
            'age_range' => 'required|string|max:255',
            'national_id' => 'required|string|size:10',
            'email' => 'required|email|unique:students|max:255',
            'phone_number' => 'required|string|max:15',
            'study_year_program' => 'required|string|max:255',
            'experience' => 'nullable|string',
        ])->validate();
    }

    public function success()
    {
        return view('invitation.success');
    }

}
