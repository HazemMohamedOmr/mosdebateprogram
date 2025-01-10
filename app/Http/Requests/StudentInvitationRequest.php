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
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'university_specialization' => 'required|string|max:255',
            'team_leader' => 'nullable|string|max:255',
            'heard_about' => 'nullable|array',
            'reason_participation' => 'nullable|array',
            'students' => 'nullable|array',

            'students.*.first_name' => 'required|string|max:255',
            'students.*.second_name' => 'required|string|max:255',
            'students.*.sur_name' => 'required|string|max:255',
            'students.*.email' => 'required|email|max:255',
            'students.*.gender' => 'nullable|boolean',
            'students.*.personal_photo' => 'nullable|file|image|max:2048',
            'students.*.age_range' => 'required|string|max:255',
            'students.*.national_id' => 'required|string|size:10',
            'students.*.phone_number' => 'required|string|max:15',
            'students.*.study_year_program' => 'required|string|max:255',
            'students.*.experience' => 'nullable|string',
        ];
    }


    public function attributes(): array
    {
        return [
            'university_name' => 'اسم الجامعة',
            'first_name' => 'الاسم الاول',
            'second_name' => 'الاسم الثاني',
            'email' => 'البريد الالكتروني',
            'phone_number' => 'رقم الهاتف',
            'university_specialization' => 'اسم القسم/الكلية/البرنامج',
            'heard_about' => 'سمعت عنا',
            'reason_participation' => 'رغبة الحضور',
            'team_leader' => 'اسم قائد الفريق',


            'students.*.first_name' => 'الاسم الاول',
            'students.*.second_name' => 'الاسم الثاني',
            'students.*.sur_name' => 'اسم العائلة',
            'students.*.age_range' => 'الفئة العمرية',
            'students.*.national_id' => 'رقم الهوية الوطنية/ الإقامة',
            'students.*.email' => 'البريد الالكتروني',
            'students.*.phone_number' => 'رقم الهاتف',
            'students.*.study_year_program' => 'سنة الدراسة/البرنامج',
            'students.*.experience' => 'الخبرات',
            'students.*.personal_photo' => 'الصورة الشخصية',
            'students.*.gender' => 'الجنس',
        ];
    }
}
