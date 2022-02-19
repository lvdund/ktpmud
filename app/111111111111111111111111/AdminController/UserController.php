<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\UserService;
use CodeIgniter\HTTP\Request;

// use CodeIgniter\Database\MySQLi\Result;
// use CodeIgniter\Database\Postgre\Result as PostgreResult;

class UserController extends BaseController
{
    // Tạo biến lưu Servce
    private $service;
    public function __construct()
    {
        $this->service = new UserService();
    }

    public function list()
    {
        echo 'Admin -> UserController -> main view';
        $data=[];
        $dataUsers = $this->service->getAllUsers();
        // dd($dataUsers);  //in ra màn hình
        $data = $this->loadMasterLayout($data, 'title từ controller', $dataUsers);
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
        $result = $this->service->addUserInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    public function edit($id)
    {
        $user = $this->service->getUserByID($id);
        if(!$user){
            return redirect('error/404');
        }

        $data = $this->loadMasterLayout([],[],$user);
        return view('edit',$data);
    }

    public function update()
    {
        $result = $this->service->updateUserInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    public function delete($id)
    {
        $user = $this->service->getUserByID($id);
        if(!$user){
            return redirect('error/404');
        }
        $result = $this->service->deleteUser($id);
        return redirect('admin/user/list')->with($result['messageCode'], $result['message']);
    }
}