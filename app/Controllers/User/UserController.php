<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\FullAppoinmentModel;
use App\Models\UncheckAppoinmentModel;
use App\Services\UserLoginService;
use CodeIgniter\HTTP\Request;
use App\common\ResultUtils;
use App\Models\AppointmentModel;
use App\Services\UserService;

class UserController extends BaseController
{
    // Tạo biến lưu Servce
    private $service;
    protected $servicedata;
    public function __construct()
    {
        $this->service = new UserLoginService();
        $this->servicedata = new UserService();
    }

    public function index()
    {
        // dd('lvd');
        if (session()->has('tbenhnhan')) {
            return view('User/member-show');
        }
        return view('User/login');
    }

    public function login()
    {
        $result = $this->service->hasLoginInfo($this->request);
        if($result['status'] === ResultUtils::STATUS_CODE_OK){
            return view('User/member-show',$result);
        }
        if($result['status'] === ResultUtils::STATUS_CODE_ERR ){
            return redirect('user')->with($result['messageCode'], $result['message']);
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('User/login');
    }
    public function productlist()
    {
        $pd = new ProductModel();
        $dichvu['dichvu'] = $pd->findAll();
        return view('User/product-list',$dichvu);
    }
    public function appointmentlist()
    {
        $data=[];
        $getappointment = new UncheckAppoinmentModel();
        $data2 =$getappointment->full();
        $data['ph'] = json_decode(json_encode($data2), true);
        $getappointmentchecked = new FullAppoinmentModel();
        $data1 =$getappointmentchecked->full();
        $data['ph_check'] = json_decode(json_encode($data1), true);
        // $data['ph'] = $getappointment->where('idBenhNhan',session()->get('tbenhnhan')['idBenhNhan'])->findAll();
        // $data['ph_check'] = $getappointmentchecked->where('idBenhNhan',session()->get('tbenhnhan')['idBenhNhan'])->findAll();
        // dd($data);

        return view('User/appointment-list',$data);
    }
    public function deleteAppointment($idPH)
    {
        $ph = new AppointmentModel();
        $data = $ph->where('idPH',$idPH)->delete();
        return redirect('user/appointmentlist');
    }
    public function add($maDichVu)
    {
        $data['maDichVu']=$maDichVu;
        return view('User/appointment-add',$data);
    }
    public function create($maDichVu)
    {
        // dd($this->request->getPost()['moTa']);
        // dd($maDichVu);
        $appt=new AppointmentModel();
        $dataSave=[
            'idBenhNhan'=>session()->get('tbenhnhan')['idBenhNhan'],
            'maDichVu'=>$maDichVu,
            'lichHenKham'=>$this->request->getPost()['lichHenKham'],
            'ngayLapPH'=>date("Y-m-d"),
            'moTa'=>$this->request->getPost()['moTa'],
        ];
        // dd($dataSave);
        $appt->save($dataSave);
        // dd(session()->get('tbenhnhan'));
        // $data['maDichVu']=$maDichVu;
        return redirect('user/appointmentlist');
    }



    public function edit($idBenhNhan)
    {
        $admin = $this->servicedata->getBenhNhanByID($idBenhNhan);
        if(!$admin){
            return redirect('error/404');
        }

        $data['tbenhnhan']=$admin;
        return view('User/edit',$data);
    }

    public function update($idBenhNhan=null)
    {
        $result = $this->servicedata->updateBenhNhanInfo($this->request,$idBenhNhan);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['message']);
    }
}