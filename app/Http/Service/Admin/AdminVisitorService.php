<?php

namespace App\Http\Service\Admin;

use App\Exports\VisitorExport;
use App\Models\Invitations;
use Maatwebsite\Excel\Facades\Excel;

class AdminVisitorService
{
    public function index()
    {
        $invitations = Invitations::where('type', 0)->paginate(10);

        return view('admin.visitors', compact('invitations'));
    }


    public function show($id)
    {
        $invitation = Invitations::find($id);

        return view('admin.visitors-show', compact('invitation'));
    }

    public function exports()
    {
        return Excel::download(new VisitorExport, 'visitor.xlsx');
    }

}
