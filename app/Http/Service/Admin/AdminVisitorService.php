<?php

namespace App\Http\Service\Admin;

use App\Models\Invitations;

class AdminVisitorService
{
    public function index()
    {
        $invitations = Invitations::where('type', 0)->paginate(10);

        return view('admin.visitors', compact('invitations'));
    }
}
