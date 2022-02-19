<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\AdminService;
use CodeIgniter\HTTP\Request;

// use CodeIgniter\Database\MySQLi\Result;
// use CodeIgniter\Database\Postgre\Result as PostgreResult;

class Home extends BaseController
{
    // Tạo biến lưu Servce
    private $service;
    public function __construct()
    {
        $this->service = new AdminService();
    }

    public function list()
    {
        $data=[];
        $dataAdmins = $this->service->getAllAdmins();
        $data = $this->loadMasterLayout($data, 'title từ controller', $dataAdmins);
        return view('list',$data);
    }
    public function add()
    {
        $data=[];
        $data = $this->loadMasterLayout($data);
        return view('Add',$data);
    }
    public function create()
    {
        // dd($this->request);
        $result = $this->service->addAdminInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    public function edit($idAdmin)
    {
        $admin = $this->service->getAdminByID($idAdmin);
        if(!$admin){
            return redirect('error/404');
        }

        $data = $this->loadMasterLayout([],[],$admin);
        return view('edit',$data);
    }

    public function update()
    {
        $result = $this->service->updateAdminInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    public function delete($idAdmin)
    {
        $admin = $this->service->getAdminByID($idAdmin);
        if(!$admin){
            return redirect('error/404');
        }
        $result = $this->service->deleteAdmin($idAdmin);
        return redirect('admin/home/list')->with($result['messageCode'], $result['message']);
    }
}