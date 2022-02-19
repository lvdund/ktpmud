<?php

namespace App\Services;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class UserLoginService extends BaseService
{
    private $admin;

    function __construct()
    {
        parent::__construct();
        $this->tbenhnhan = new UserModel();
        $this->tbenhnhan->protect(false);
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
        $tbenhnhan =$this->tbenhnhan->where('tkBenhNhan', $param['tkBenhNhan'])->first();
        if(!$tbenhnhan){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>[
                    'notExist' => 'email không tồn tại'
                ]
            ];  
        }
        if(!password_verify($param['mkBenhNhan'],$tbenhnhan['mkBenhNhan'])){
            return [
                'status'=>ResultUtils::STATUS_CODE_ERR,
                'messageCode'=>ResultUtils::MESSAGE_CODE_ERR,
                'message'=>[
                    'wrongPass' => 'Mật khẩu không đúng'
                ]
            ];
        }
        $session = session();
        unset($tbenhnhan['mkBenhNhan']);
        $session->set('tbenhnhan',$tbenhnhan);
        return [
            'status'=>ResultUtils::STATUS_CODE_OK,
            'messageCode'=>ResultUtils::MESSAGE_CODE_OK,
            'message'=>null
            ];
    }
    private function validateLogin($reqData){
        $rule=[
            'tkBenhNhan'=>'valid_email',
            'mkBenhNhan'=>'max_length[30]|min_length[3]',
        ];
        $message=[
            'tkBenhNhan'=>[
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
}