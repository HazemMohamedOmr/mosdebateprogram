<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentInvitationRequest;
use App\Http\Service\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    public function index(Request $request)
    {
        return $this->studentService->index();
    }

    public function store(StudentInvitationRequest $request): RedirectResponse
    {
        return $this->studentService->store($request);
    }

    public function success(Request $request)
    {
        return $this->studentService->success();
    }

}
