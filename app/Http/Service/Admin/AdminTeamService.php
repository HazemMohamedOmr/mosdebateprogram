<?php

namespace App\Http\Service\Admin;

use App\Models\Invitations;

class AdminTeamService
{
    public function index()
    {
        $invitations = Invitations::where('type', 1)->with('students')->paginate(10);

        return view('admin.register', compact('invitations'));
    }

    public function show($id)
    {
        $invitation = Invitations::find($id);

        $invitation->load([
            'students'
        ]);

        return view('admin.register-show', compact('invitation'));
    }
}
