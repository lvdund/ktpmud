<?php

namespace App\Controllers\Admin\Doctor;
use App\Controllers\BaseController;
use App\Models\DoctorModel;
use App\Services\DoctorService;
use App\common\ResultUtils;

class DoctorController extends BaseController
{
    private $service;
    public function __construct()
    {
        $this->service = new DoctorService();
    }
    public function list()
    {
        // if($this->request->getGet('tenbacsi')&&$this->request->getGet('tenkhoa')==null){
        //     $tenkhoa = $this->request->getGet('tenkhoa');
        //     $model = new DoctorModel();
        //     $data['tenkhoa'] = $model->like('tenKhoa', $tenkhoa)->findAll();
        //     return view('Doctor/doctor-list',$data);
        // }
        // if($this->request->getGet('tenbacsi')==null&&$this->request->getGet('tenkhoa')){
        //     $tenbacsi = $this->request->getGet('tenbacsi');
        //     $model = new DoctorModel();
        //     $data['tbacsi'] = $model->like('tenBacSi', $tenbacsi)->findAll();
        //     return view('Doctor/doctor-list',$data);
        // }
        if($this->request->getGet('tenbacsi')||$this->request->getGet('tenkhoa')){
            $tenkhoa = $this->request->getGet('tenkhoa');
            $tenbacsi = $this->request->getGet('tenbacsi');
            $model = new DoctorModel();
            $data['tbacsi'] = $model->like('tenBacSi', $tenbacsi)->orLike('tenKhoa', $tenkhoa)->findAll();
            return view('Doctor/doctor-list',$data);
        }

        $data['tbacsi']=$this->service->getAllDoctor();
        return view('Doctor/doctor-list',$data);

    }
    public function add()
    {
        return view('Doctor/doctor-add');
    }
    public function create()
    {
        // dd($this->request->getPost());
        $result = $this->service->addDoctorInfo($this->request);
        return redirect('admin/doctor/list')->with($result['messageCode'], $result['message']);        
    }
    public function edit($idBacSi)
    {
        $doctor = $this->service->getDoctorByID($idBacSi);
        if(!$doctor){
            return redirect('error/404');
        }
        
        $data['tbacsi']=$doctor;
        // dd($doctor);
        return view('Doctor/doctor-change',$data);
    }

    public function update($id=null)
    {
        // dd($this->request->getPost());
        $result = $this->service->updateDoctorInfo($this->request,$id);
        // return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }

    public function delete($idBacSi)
    {
        // dd($idBacSi);
        $doctor = $this->service->getDoctorByID($idBacSi);
        // dd($doctor);
        if(!$doctor){
            return redirect('error/404'); 
        }
        $result = $this->service->deleteDoctor($idBacSi);
        return redirect('admin/doctor/list')->with($result['messageCode'], $result['message']);
    }
}