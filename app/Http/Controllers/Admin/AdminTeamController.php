<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Admin\AdminService;
use App\Http\Service\Admin\AdminTeamService;
use App\Http\Service\Admin\AdminVisitorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminTeamController extends Controller
{
    private $adminService;

    public function __construct(AdminTeamService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return $this->adminService->index();
    }

    public function show($id)
    {
        return $this->adminService->show($id);
    }

    public function invitation(Request $request): JsonResponse
    {
        return $this->adminService->invitation($request);
    }

}
