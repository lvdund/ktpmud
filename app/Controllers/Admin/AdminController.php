<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\AdminLoginService;
use CodeIgniter\HTTP\Request;
use App\common\ResultUtils;

class AdminController extends BaseController
{
    // Tạo biến lưu Servce
    private $service;
    public function __construct()
    {
        $this->service = new AdminLoginService();
    }

    public function index()
    {
        if (session()->has('admin')) {
            return view('superadmin');
        }
        return view('Admin/login');
    }

    public function login()
    {
        $result = $this->service->hasLoginInfo($this->request);
        if($result['status'] === ResultUtils::STATUS_CODE_OK){
            return view('superadmin');
        }
        if($result['status'] === ResultUtils::STATUS_CODE_ERR ){
            return redirect('admin/login')->with($result['messageCode'], $result['message']);
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('Admin/login');
    }
}