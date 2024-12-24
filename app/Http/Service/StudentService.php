<?php

namespace App\Http\Service;

use App\Models\Invitations;
use Carbon\Carbon;

class StudentService
{
    public function index()
    {
        return view('student');
    }

    public function store($request)
    {

    }
}
