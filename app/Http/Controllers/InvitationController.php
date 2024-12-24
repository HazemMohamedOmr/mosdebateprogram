<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisitorInvitationRequest;
use App\Http\Service\InvitationService;
use Illuminate\Http\RedirectResponse;
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

    public function store(VisitorInvitationRequest $request): RedirectResponse
    {
        return $this->invitationService->store($request);
    }

    public function success(Request $request)
    {
        return $this->invitationService->success();
    }

    public function qrcode(Request $request, $uuid)
    {
        return $this->invitationService->qrcode($uuid);
    }

}
