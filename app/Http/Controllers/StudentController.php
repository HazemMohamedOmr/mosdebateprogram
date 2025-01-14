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

    public function qrcode(Request $request, $uuid)
    {
        return $this->studentService->qrcode($uuid);
    }

    public function show(Request $request, $uuid)
    {
        return $this->studentService->show($uuid);
    }

    public function formQrcode(Request $request)
    {
        return $this->studentService->formQrcode();
    }
}
