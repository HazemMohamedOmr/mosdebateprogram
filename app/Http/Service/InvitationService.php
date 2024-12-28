<?php

namespace App\Http\Service;

use App\Mail\InvitationEmail;
use App\Models\Invitations;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InvitationService
{
    public function index()
    {
        // Check if the form is open
        if (!Setting::isFormOpen('invitation_form')) {
            return view('invitation.visitor-registration', ['formClosed' => true]);
        }

        // Show the form
        return view('invitation.visitor-registration', ['formClosed' => false]);
    }

    public function store($request)
    {
        // Check if the form is open
        if (!Setting::isFormOpen('invitation_form')) {
            return view('invitation.visitor-registration', ['formClosed' => true]);
        }

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
            Mail::to($invitation->email)->send(new InvitationEmail($invitation, 1));
            $invitation->is_email_send = 1;
            $invitation->is_invited = 1;
        } catch (\Exception $e) {
            Log::error($e);
            $invitation->is_email_send = 0;
        }

        $invitation->save();
    }

    public function qrcode($uuid)
    {
        $invitation = Invitations::where('invitation_key', $uuid)->first();

        if (isset($invitation)) {
            $url = route('visitor-invitation-show', ['uuid' => $uuid]);
            $image = $this->generateBase64QrCode($url);

            return view('invitation.qrcode', compact('image'));
        }

        return view('invitation.not-found');
    }

    public function generateBase64QrCode($text, $size = 200)
    {
        return QrCode::size($size)
            ->format('svg')
            ->generate($text);
    }

    public function show($uuid)
    {
        if (!Auth::check()) {
            return view('invitation.cannot-view-data');
        }
        // Retrieve the invitation using the UUID (invitation_key)
        $invitation = Invitations::where('invitation_key', $uuid)->with('students')->first();

        // If no record is found, return a not found
        if (!$invitation) {
            return view('invitation.not-found');
        }

        // Format the graduation_date to "mm-yyyy"
        if ($invitation->graduation_date) {
//            dd($invitation);
            $invitation->graduation_date = Carbon::createFromFormat('Y-m-d', $invitation->graduation_date)->format('m-Y');
        }

        // Pass the invitation and related students to the view
        return view('invitation.visitor-show', compact('invitation'));
    }

}
