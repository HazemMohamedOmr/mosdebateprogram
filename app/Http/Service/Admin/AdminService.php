<?php

namespace App\Http\Service\Admin;

use App\Models\Invitations;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;

class AdminService
{
    public function eventDate($request)
    {
        // Custom validation messages
        $messages = [
            'startRange.required' => 'تاريخ البداية مطلوب.',
            'startRange.date' => 'تاريخ البداية يجب أن يكون تاريخًا صحيحًا.',
            'endRange.required' => 'تاريخ النهاية مطلوب.',
            'endRange.date' => 'تاريخ النهاية يجب أن يكون تاريخًا صحيحًا.',
            'endRange.after_or_equal' => 'تاريخ النهاية يجب أن يكون مساويًا أو بعد تاريخ البداية.',
        ];

        // Validate the request
        $validated = $request->validate([
            'startRange' => 'required|date',
            'endRange' => 'required|date|after_or_equal:startRange',
        ], $messages);

        try {
            // Save start_range
            Setting::updateOrCreate(
                ['key' => 'start_range'], ['value' => $validated['startRange']]
            );

            // Save end_range
            Setting::updateOrCreate(
                ['key' => 'end_range'], ['value' =>  $validated['endRange']]
            );

            // Return success message
            return redirect()->back()->with('event_date_success', 'تم تحديث إعدادات الحدث بنجاح.');
        } catch (\Exception $e) {
            // Return failure message if saving to the database fails
            return redirect()->back()->with('event_date_failed', 'حدث خطأ أثناء حفظ الإعدادات. يرجى المحاولة مرة أخرى.');
        }
    }

    public function toggleForm($request, $formType): JsonResponse
    {
        // Map form types to descriptive keys
        $formKeys = [
            'invitation' => 'invitation_form',
            'students' => 'students_form',
        ];

        // Ensure the form type is valid
        if (!array_key_exists($formType, $formKeys)) {
            return response()->json(['message' => 'Invalid form type'], 400);
        }

        // Get the setting by key
        $key = $formKeys[$formType];
        $setting = Setting::firstOrCreate(['key' => $key]);

        // Toggle the value
        $setting->value = !$setting->value;
        $setting->save();

        return response()->json([
            'message' => ucfirst($formType) . " form has been " . ($setting->value ? 'opened' : 'closed'),
            'status' => $setting->value,
        ]);
    }


    public function index()
    {
        // Count visitors (type 0) and groups/students (type 1)
        $visitors = Invitations::where('type', 0)->count();
        $groups = Invitations::where('type', 1)->count();

        // Get the form statuses
        $invitationFormStatus = Setting::where('key', 'invitation_form')->value('value') ?? false;
        $studentsFormStatus = Setting::where('key', 'students_form')->value('value') ?? false;

        $startRange = Setting::where('key', 'start_range')->value('value');
        $endRange = Setting::where('key', 'end_range')->value('value');

//        dd(Setting::all());

        return view('admin.dashboard',
            compact('visitors', 'groups', 'invitationFormStatus', 'studentsFormStatus', 'startRange', 'endRange'));
    }
}
