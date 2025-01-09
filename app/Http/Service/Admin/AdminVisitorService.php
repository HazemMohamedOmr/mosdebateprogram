<?php

namespace App\Http\Service\Admin;

use App\Exports\VisitorExport;
use App\Mail\InvitationEmail;
use App\Models\Invitations;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class AdminVisitorService
{
    public function index($request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $searchTerm = $validated['search'] ?? null;
        if(isset($searchTerm)){
            $searchTerm = filter_var($searchTerm, FILTER_SANITIZE_STRING);
            $searchTerm = str_replace('%', '', $searchTerm);
            $searchTerm = str_replace('\%', '', $searchTerm);
            $searchTerm = Str::of($searchTerm)->trim();

            $searchTerm = strip_tags($searchTerm ?? null);
        }

        $invitations = Invitations::where('type', 0)
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('email', 'LIKE', "%$searchTerm%")
                        ->orWhere('first_name', 'LIKE', "%$searchTerm%")
                        ->orWhere('second_name', 'LIKE', "%$searchTerm%")
                        ->orWhere('sur_name', 'LIKE', "%$searchTerm%");
                });
            })
            ->paginate(10);

        return view('admin.visitors', compact('invitations'));
    }


    public function show($id)
    {
        $invitation = Invitations::find($id);

        return view('admin.visitors-show', compact('invitation'));
    }

    public function delete($id): RedirectResponse
    {
        $invitation = Invitations::find($id);

        $invitation->delete();

        return redirect()->route('admin.visitors');
    }

    public function statistics()
    {
        return view('admin.visitors-statistics');
    }

    public function exports()
    {
        return Excel::download(new VisitorExport, 'visitor.xlsx');
    }

    public function invitation($id): RedirectResponse
    {
        $invitation = Invitations::find($id);

        $this->sendEmail($invitation);

        return redirect()->route('admin.visitors');
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


}
