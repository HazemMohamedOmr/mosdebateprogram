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
            'national_id' => 'required|string',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'university_name' => 'required|string|max:255',
            'university_specialization' => 'required|string|max:255',
            'heard_about' => 'nullable|array',
            'reason_participation' => 'nullable|array',
            'nationality' => 'required|string|max:255',
            'card_type' => 'required|boolean',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'academic_qualifications' => 'required|string|max:255',
            'employer' => 'required|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'الاسم الاول',
            'second_name' => 'الاسم الثاني',
            'sur_name' => 'اسم العائلة',
            'age_range' => 'الفئة العمرية',
            'national_id' => 'رقم الهوية الوطنية/ رقم الجواز',
            'email' => 'البريد الالكتروني',
            'phone_number' => 'رقم الهاتف',
            'university_name' => 'اسم الجامعة',
            'university_specialization' => 'التخصص الجامعي',
            'graduation_date' => 'سنة الدراسة',
            'heard_about' => 'سمعت عنا',
            'reason_participation' => 'رغبة الحضور',
            'nationality' => 'الجنسية',
            'card_type' => 'نوع البطاقة',
            'region' => 'المنطقة',
            'city' => 'المدينة',
            'academic_qualifications' => 'المؤهلات العلمية',
            'employer' => 'جهة العمل',
        ];
    }

}
