<?php

namespace App\Controllers\Doctor;
use App\Controllers\BaseController;
use App\Models\FullAppoinmentModel;
use App\Services\DoctorLoginService;
use CodeIgniter\HTTP\Request;
use App\common\ResultUtils;
use App\Models\AppointmentModel;
use App\Models\UncheckAppoinmentModel;

class DoctorController extends BaseController
{
    // Tạo biến lưu Servce
    private $service;
    public function __construct()
    {
        $this->service = new DoctorLoginService();
    }

    public function index()
    {
        // dd('lvd');
        // if(null !== session()->has('tbacsi')){
        // if (session()->has('tbacsi')) {
        //     return view('Doctor/doctor-show');
        // }
        return view('Doctor/login');
    }

    public function login()
    {
        // dd('lvd');
        $result = $this->service->hasLoginInfo($this->request);
        if($result['status'] === ResultUtils::STATUS_CODE_OK){
            return view('Doctor/doctor-show',$result);
        }
        if($result['status'] === ResultUtils::STATUS_CODE_ERR ){
            return redirect('doctor')->with($result['messageCode'], $result['message']);
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('Doctor/login');
    }

    public function list()
    {
        $getappointment = new UncheckAppoinmentModel();
        $data =$getappointment->full();
        $data['ph'] = json_decode(json_encode($data), true); 
        $getappointmentchecked = new FullAppoinmentModel();
        $data1 =$getappointmentchecked->full();
        $data['ph_check'] = json_decode(json_encode($data1), true);
        return view('Doctor/appointment-list',$data);
    }
    public function check($idPH)
    {
        $ph = new UncheckAppoinmentModel();
        $data = $ph->where('idPH',$idPH)->first();
        $data['tinhTrangPH']='done';
        $data['idBacSi']=session()->get('tbacsi')['idBacSi'];
        // dd($data);

        $ph->update($idPH,$data);
        return redirect('doctor/list');
    }
    public function uncheck($idPH)
    {
        $ph = new AppointmentModel();
        $data = $ph->where('idPH',$idPH)->first();
        $data['tinhTrangPH']=NULL;
        $data['idBacSi']=NULL;
        // dd($data);
        $ph->update($idPH,$data);
        return redirect('doctor/list');
    }
}