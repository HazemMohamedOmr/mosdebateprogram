<?php

namespace App\Http\Controllers;

use App\Models\Invitations;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function toggleForm(Request $request, $formType)
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

        return view('admin.dashboard', compact('visitors', 'groups', 'invitationFormStatus', 'studentsFormStatus'));
    }

}
