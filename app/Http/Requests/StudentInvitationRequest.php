<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentInvitationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'university_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => 'required|email|unique:invitations|max:255',
            'phone_number' => 'required|string|max:15',
            'university_specialization' => 'required|string|max:255',
            'team_leader' => 'nullable|string|max:255',
            'heard_about' => 'nullable|array',
            'reason_participation' => 'nullable|array',
            'students' => 'nullable|array',

            'students.*.first_name' => 'required|string|max:255',
            'students.*.second_name' => 'required|string|max:255',
            'students.*.sur_name' => 'required|string|max:255',
            'students.*.email' => 'required|email|unique:invitations|max:255',
            'students.*.gender' => 'nullable|boolean',
            'students.*.personal_photo' => 'nullable|file|image|max:2048',
            'students.*.age_range' => 'required|string|max:255',
            'students.*.national_id' => 'required|string|size:10',
            'students.*.phone_number' => 'required|string|max:15',
            'students.*.study_year_program' => 'required|string|max:255',
            'students.*.experience' => 'nullable|string',
        ];
    }
}
