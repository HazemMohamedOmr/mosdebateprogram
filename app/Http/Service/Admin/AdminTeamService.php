<?php

namespace App\Http\Service\Admin;

use App\Models\Invitations;

class AdminTeamService
{
    public function index()
    {
        $invitations = Invitations::where('type', 1)->paginate(10);

        return view('admin.register', compact('invitations'));
    }

    public function show($id)
    {
        $invitation = Invitations::find($id);

        return view('admin.register-show', compact('invitation'));
    }
}
