<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\Admin\AdminService;
use App\Http\Service\Admin\AdminVisitorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminVisitorController extends Controller
{
    private $adminService;

    public function __construct(AdminVisitorService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request)
    {
        return $this->adminService->index($request);
    }

    public function show($id)
    {
        return $this->adminService->show($id);
    }

    public function delete($id): RedirectResponse
    {
        return $this->adminService->delete($id);
    }

    public function statistics($date)
    {
        return $this->adminService->statistics($date);
    }

    public function exports()
    {
        return $this->adminService->exports();
    }

    public function invitation($id): RedirectResponse
    {
        return $this->adminService->invitation($id);
    }

}
