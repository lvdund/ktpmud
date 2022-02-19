<?php

namespace App\Controllers\Admin\User;
use App\Controllers\BaseController;
use App\Models\UserModel;
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
        // if($this->request->getGet('tenBenhNhan')){
        //     $tenBenhNhan = $this->request->getGet('tenBenhNhan');
        //     $model = new UserModel();
        //     $data['admin'] = $model->like('tenBenhNhan', $tenBenhNhan)->findAll();
        //     return view('BenhNhan/admin-list',$data);
        // }
        // $data['admin']=$this->service->getAllBenhNhan();
        // // dd($data);
        // return view('BenhNhan/admin-list',$data);

        if($this->request->getGet('tenbenhnhan')||$this->request->getGet('sdtbenhnhan')){
            $sdtbenhnhan = $this->request->getGet('sdtbenhnhan');
            $tenbenhnhan = $this->request->getGet('tenbenhnhan');
            $model = new UserModel();
            $data['tbenhnhan'] = $model->like('tenBenhNhan', $tenbenhnhan)->orLike('sdtBenhNhan', $sdtbenhnhan)->findAll();
            return view('User/member-list',$data);
        }

        $data['tbenhnhan']=$this->service->getAllBenhNhan();
        return view('User/member-list',$data);
    }
    public function add()
    {
        return view('User/member-add');
    }
    public function create()
    {
        // dd($this->request);
        $result = $this->service->addBenhNhanInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    public function edit($idBenhNhan)
    {
        $admin = $this->service->getBenhNhanByID($idBenhNhan);
        if(!$admin){
            return redirect('error/404');
        }

        $data['tbenhnhan']=$admin;
        return view('User/member-change',$data);
    }

    public function update($idBenhNhan=null)
    {
        $result = $this->service->updateBenhNhanInfo($this->request,$idBenhNhan);
        return redirect('admin/user/list')->with($result['messageCode'], $result['message']);
    }

    public function delete($idBenhNhan)
    {
        $admin = $this->service->getBenhNhanByID($idBenhNhan);
        if(!$admin){
            return redirect('error/404');
        }
        $result = $this->service->deleteBenhNhan($idBenhNhan);
        return redirect('admin/user/list')->with($result['messageCode'], $result['message']);
    }
}