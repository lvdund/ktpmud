<?php

namespace App\Controllers\Admin\Department;
use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use App\Services\DepartmentService;
use App\common\ResultUtils;

class DepartmentController extends BaseController
{
    private $service;
    public function __construct()
    {
        $this->service = new DepartmentService();
    }
    public function list()
    {
        if($this->request->getGet('tenkhoa')){
            $tenkhoa = $this->request->getGet('tenkhoa');
            $model = new DepartmentModel();
            $data['tkhoa'] = $model->like('tenKhoa', $tenkhoa)->findAll();
            return view('Department/department-list',$data);
        }
        $data['tkhoa']=$this->service->getAllKhoa();
        return view('Department/department-list',$data);

    }
    public function add()
    {
        return view('Department/department-add');
    }
    public function create()
    {
        // dd($this->request->getPost());
        $result = $this->service->addKhoaInfo($this->request);
        return redirect('admin/department/list')->with($result['messageCode'], $result['message']);        
    }
    public function edit($tenKhoa)
    {
        $department = $this->service->getKhoaByID($tenKhoa);
        if(!$department){
            return redirect('error/404');
        }
        
        $data['tkhoa']=$department;
        // dd($department);
        return view('Department/department-change',$data);
    }

    public function update($id=null)
    {
        // dd($this->request->getPost());
        $result = $this->service->updateKhoaInfo($this->request,$id);
        // return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    public function delete($tenKhoa)
    {
        // dd($tenKhoa);
        $department = $this->service->getKhoaByID($tenKhoa);
        // dd($department);
        if(!$department){
            return redirect('error/404'); 
        }
        $result = $this->service->deleteKhoa($tenKhoa);
        return redirect('admin/department/list')->with($result['messageCode'], $result['message']);
    }
}