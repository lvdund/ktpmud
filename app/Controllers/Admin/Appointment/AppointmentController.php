<?php

namespace App\Controllers\Admin\Appointment;
use App\Controllers\BaseController;
use App\Models\FullAppoinmentModel;
use App\Models\UncheckAppoinmentModel;
use App\Services\AppointmentService;
use App\common\ResultUtils;

class AppointmentController extends BaseController
{
    private $service;
    private $service1;
    public function __construct()
    {
        $this->service = new AppointmentService();
        $this->service1 = new FullAppoinmentModel();
    }
    public function list()
    {
        // $data = $this->service1->full();
        // $data['ph'] = json_decode(json_encode($data), true);

        $getappointment = new UncheckAppoinmentModel();
        $data =$getappointment->full();
        $data['ph'] = json_decode(json_encode($data), true); 
        $getappointmentchecked = new FullAppoinmentModel();
        $data1 =$getappointmentchecked->full();
        $data['ph_check'] = json_decode(json_encode($data1), true);
        
        return view('Appointment/appointment-list',$data);
    }
    public function add()
    {
        return view('Appointment/appointment-add');
    }
    public function create()
    {
        $result = $this->service->addAppointmentInfo($this->request);
        return redirect('admin/appointment/list')->with($result['messageCode'], $result['message']);        
    }
    // public function edit($idPH)
    // {
    //     $appointment = $this->service->getAppointmentByID($idPH);
    //     if(!$appointment){
    //         return redirect('error/404');
    //     }
        
    //     $data['ph']=$appointment;
    //     // dd($appointment);
    //     return view('Appointment/appointment-change',$data);
    // }

    // public function update($id=null)
    // {
    //     // dd($this->request->getPost());
    //     $result = $this->service->updateAppointmentInfo($this->request,$id);
    //     // return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    //     return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    // }

    // public function delete($idPH)
    // {
    //     // dd($idPH);
    //     $appointment = $this->service->getAppointmentByID($idPH);
    //     // dd($appointment);
    //     if(!$appointment){
    //         return redirect('error/404'); 
    //     }
    //     $result = $this->service->deleteAppointment($idPH);
    //     return redirect('admin/appointment/list')->with($result['messageCode'], $result['message']);
    // }
}