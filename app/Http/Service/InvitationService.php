<?php

namespace App\Http\Service;

use App\Mail\InvitationEmail;
use App\Models\Invitations;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        if (isset($request->graduation_date)) {
            $validatedData['graduation_date'] = Carbon::createFromFormat('Y-m', $validatedData['graduation_date'])->startOfMonth()->toDateString();
        }
        $validatedData['reason_participation'] = json_encode($request->input('reason_participation', []), JSON_UNESCAPED_UNICODE);
        $validatedData['phone_number'] = '+966' . $validatedData['phone_number'];

        // Create the invitation record
        $invitation = Invitations::create($validatedData);

        $this->sendEmail($invitation);

        // Redirect to success page
        return redirect()->route('visitor-invitation-success')->with('success', 'Form submitted successfully!');
    }


    public function success()
    {
        return view('invitation.success');
    }

    private function sendEmail($invitation)
    {
        try {
            Mail::to($invitation->email)->send(new InvitationEmail($invitation));
            $invitation->is_email_send = 1;
        } catch (\Exception $e) {
            Log::error($e);
            $invitation->is_email_send = 0;
        }

        $invitation->save();
    }

}
