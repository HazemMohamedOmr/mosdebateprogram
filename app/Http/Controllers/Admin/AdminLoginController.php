<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Admin\AdminLoginService;
use App\Http\Service\Admin\AdminService;
use App\Http\Service\Admin\AdminTeamService;
use App\Http\Service\Admin\AdminVisitorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    private $adminService;

    public function __construct(AdminLoginService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return $this->adminService->index();
    }

}
