<?php

namespace App\Http\Controllers;
use App\Http\Requests\StudentInvitationRequest;
use App\Http\Service\StudentService;
use App\Models\Invitations;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        // Validate main invitation data
        $validatedInvitation = $request->validate([
            'university_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => 'required|email|unique:invitations|max:255',
            'phone_number' => 'required|string|max:15',
            'university_specialization' => 'required|string|max:255',
            'team_leader' => 'nullable|string|max:255',
            'heard_about' => 'nullable|array',
            'reason_participation' => 'nullable|array',
        ]);

        // Add type and encode nullable arrays
        $validatedInvitation['type'] = 1;
        $validatedInvitation['heard_about'] = json_encode($request->input('heard_about', []), JSON_UNESCAPED_UNICODE);
        $validatedInvitation['reason_participation'] = json_encode($request->input('reason_participation', []), JSON_UNESCAPED_UNICODE);

        // Create the invitation record
        $invitation = Invitations::create($validatedInvitation);

        // Validate and create students
        foreach ($request->input('students', []) as $studentData) {
            $validatedStudent = $this->validateStudent($studentData);

            // Handle personal photo upload
            if (isset($studentData['personal_photo'])) {
                $validatedStudent['personal_photo'] = $studentData['personal_photo']->store('photos', 'public');
            }

            // Link student to the invitation
            $invitation->students()->create($validatedStudent);
        }

        // Redirect to success page
        return redirect()->route('success')->with('success', 'Form submitted successfully!');
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
}
