<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Admin\AdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function toggleForm(Request $request, $formType): JsonResponse
    {
        return $this->adminService->toggleForm($request, $formType);
    }

    public function eventDate(Request $request)
    {
        return $this->adminService->eventDate($request);
    }

    public function index()
    {
        return $this->adminService->index();
    }

    public function settings()
    {
        return $this->adminService->settings();
    }

}
