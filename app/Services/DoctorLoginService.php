<?php

namespace App\Services;
use App\Models\DoctorModel;
use App\Models\AppointmentModel;
use App\Common\ResultUtils;
use Exception;

class DoctorLoginService extends BaseService
{
    private $doctor;

    function __construct()
    {
        parent::__construct();
        $this->doctor = new DoctorModel();
        $this->doctor->protect(false);
    }
    public function hasLoginInfo($reqData)
    {
        $validate = $this->validateLogin($reqData);
        if($validate->getErrors()){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>$validate->getErrors()
            ];  
        }
        $param = $reqData->getPost();
        $tbacsi =$this->doctor->where('tkBacSi', $param['tkBacSi'])->first();
        if(!$tbacsi){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>[
                    'notExist' => 'email không tồn tại'
                ]
            ];  
        }
        if(!password_verify($param['mkBacSi'],$tbacsi['mkBacSi'])){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>[
                    'wrongPass' => 'Mật khẩu không đúng'
                ]
            ];
        }
        $session = session();
        unset($tbacsi['mkBacSi']);
        $session->set('tbacsi',$tbacsi);
        return [
            'status'=>ResultUtils::STATUS_CODE_OK,
            'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
            'message'=>null,
            'tbacsi' => $tbacsi,
            ];
    }
    private function validateLogin($reqData){
        $rule=[
            'tkBacSi'=>'valid_email',
            'mkBacSi'=>'max_length[30]|min_length[3]',
        ];
        $message=[
            'tkBacSi'=>[
                'valid_email'=>'Tài khoản {field} {value} không đúng định dạng',
            ],
            'password'=>[
                'max_length'=>'Vui lòng nhập ít hơn {param} kí tự',
                'min_length'=>'Vui lòng nhập nhiều hơn {param} kí tự',
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($reqData)->run();

        return $this->validation;
    }
    // public function updatePH($idPH)
    // {
    //     $ph = new AppointmentModel();
    //     $data = $ph->where('idPH',$idPH)->first();
    //     $data['tinhTrangPH']='done';
    //     $data['idBacSi']=session()->get('tbacsi')['idBacSi'];
    //     $ph->update($idPH,$data);
    // }
}