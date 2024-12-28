<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorInvitationRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
            'age_range' => 'required|string',
            'national_id' => 'required|string|size:10',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'university_name' => 'nullable|string|max:255',
            'university_specialization' => 'nullable|string|max:255',
            'graduation_date' => 'required|date_format:Y-m',
            'heard_about' => 'nullable|array',
            'reason_participation' => 'nullable|array',
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'الاسم الاول',
            'second_name' => 'الاسم الثاني',
            'sur_name' => 'اسم العائلة',
            'age_range' => 'الفئة العمرية',
            'national_id' => 'رقم الهوية الوطنية',
            'email' => 'البريد الالكتروني',
            'phone_number' => 'رقم الهاتف',
            'university_name' => 'اسم الجامعة',
            'university_specialization' => 'التخصص الجامعي',
            'graduation_date' => 'سنة الدراسة',
            'heard_about' => 'سمعت عنا',
            'reason_participation' => 'رغبة الحضور',
        ];
    }

}
