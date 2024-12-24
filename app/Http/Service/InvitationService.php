<?php

namespace App\Http\Service;

use App\Models\Invitations;
use Carbon\Carbon;

class InvitationService
{
    public function index()
    {
        return view('invitation.visitor-registration');
    }

    public function store($request)
    {
        $validatedData = $request->all();

        // Add type and default null values
        $validatedData['type'] = 0;
        $validatedData['heard_about'] = json_encode($request->input('heard_about', []), JSON_UNESCAPED_UNICODE);
        $validatedData['graduation_date'] = Carbon::createFromFormat('Y-m', $validatedData['graduation_date'])->startOfMonth()->toDateString();
        $validatedData['reason_participation'] = json_encode($request->input('reason_participation', []), JSON_UNESCAPED_UNICODE);
        $validatedData['phone_number'] = '+966' . $validatedData['phone_number'];
//        dd($validatedData);
        // Create the invitation record
        Invitations::create($validatedData);

        // Redirect to success page
        return redirect()->route('visitor-invitation-success')->with('success', 'Form submitted successfully!');
    }


    public function success()
    {
        return view('invitation.success');
    }

}
