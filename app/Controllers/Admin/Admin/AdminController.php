<?php

namespace App\Controllers\Admin\Admin;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Services\AdminService;
use CodeIgniter\HTTP\Request;

// use CodeIgniter\Database\MySQLi\Result;
// use CodeIgniter\Database\Postgre\Result as PostgreResult;

class AdminController extends BaseController
{
    // Tạo biến lưu Servce
    private $service;
    public function __construct()
    {
        $this->service = new AdminService();
    }

    public function list()
    {
        if($this->request->getGet('tenAdmin')){
            $tenAdmin = $this->request->getGet('tenAdmin');
            $model = new AdminModel();
            $data['admin'] = $model->like('tenAdmin', $tenAdmin)->findAll();
            return view('Admin/admin-list',$data);
        }
        $data['admin']=$this->service->getAllAdmin();
        // dd($data);
        return view('Admin/admin-list',$data);
    }
    public function add()
    {
        return view('Admin/admin-add');
    }
    public function create()
    {
        // dd($this->request);
        $result = $this->service->addAdminInfo($this->request);
        return redirect('admin/admin/list')->with($result['messageCode'], $result['message']);
    }

    public function edit($idAdmin)
    {
        $admin = $this->service->getAdminByID($idAdmin);
        if(!$admin){
            return redirect('error/404');
        }

        $data['admin']=$admin;
        return view('Admin/admin-change',$data);
    }

    public function update($idAdmin=null)
    {
        $result = $this->service->updateAdminInfo($this->request,$idAdmin);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    public function delete($idAdmin)
    {
        $admin = $this->service->getAdminByID($idAdmin);
        if(!$admin){
            return redirect('error/404');
        }
        $result = $this->service->deleteAdmin($idAdmin);
        return redirect('admin/admin/list')->with($result['messageCode'], $result['message']);
    }
}