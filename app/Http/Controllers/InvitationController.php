<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorInvitationRequest;
use App\Http\Service\InvitationService;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    private $invitationService;

    public function __construct(InvitationService $invitationService)
    {
        $this->invitationService = $invitationService;
    }

    public function index(Request $request)
    {
        return $this->invitationService->index();
    }

    public function store(VisitorInvitationRequest $request)
    {
        return $this->invitationService->store($request);
    }
}
