<?php

namespace App\Http\Service\Admin;

use App\Models\Invitations;
use App\Models\Setting;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AdminService
{
    public function eventDate($request): RedirectResponse
    {
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
                ['key' => 'end_range'], ['value' => $validated['endRange']]
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
        $visitors = Invitations::where('type', 0)->count();
        $groups = Invitations::where('type', 1)->count();

        list($is_range_set, $ranges) = $this->prepareRange();

        return view('admin.dashboard',
            compact('visitors', 'groups', 'is_range_set', 'ranges'));
    }

    private function prepareRange(): array
    {
        $start_range = Setting::where('key', 'start_range')->value('value');
        $end_range = Setting::where('key', 'end_range')->value('value');

        $is_range_set = false;
        $ranges = collect([]);
        if (isset($start_range) && isset($end_range)) {
            $visitors = Invitations::where('type', 0)->where('attendance_dates', '!=', null)->get();
            $leaders = Invitations::where('type', 1)->where('attendance_dates', '!=', null)->get();
            $students = Student::where('attendance_dates', '!=', null)->get();

            $is_range_set = true;
            $start_range = Carbon::make($start_range);
            $end_range = Carbon::make($end_range);

            for ($date = $start_range; $date->lte($end_range); $date->addDay()) {
                $target_date = $date->toDateString();
                $visitors_count = $visitors->filter(function ($item) use ($target_date) {
                    return in_array($target_date, $item->attendance_dates ?? []);
                })->count();

                $leaders_count = $leaders->filter(function ($item) use ($target_date) {
                    return in_array($target_date, $item->attendance_dates ?? []);
                })->count();

                $student_count = $students->filter(function ($item) use ($target_date) {
                    return in_array($target_date, $item->attendance_dates ?? []);
                })->count();

                $ranges->push((object)[
                    'date' => $target_date,
                    'visitors_count' => $visitors_count,
                    'team_count' => $leaders_count + $student_count,
                ]);
            }
        }

        return [$is_range_set, $ranges];
    }

    public function settings()
    {
        // Get the form statuses
        $invitationFormStatus = Setting::where('key', 'invitation_form')->value('value') ?? false;
        $studentsFormStatus = Setting::where('key', 'students_form')->value('value') ?? false;

        $start_range = Setting::where('key', 'start_range')->value('value');
        $end_range = Setting::where('key', 'end_range')->value('value');

        return view('admin.settings',
            compact('invitationFormStatus', 'studentsFormStatus', 'start_range', 'end_range'));
    }
}
